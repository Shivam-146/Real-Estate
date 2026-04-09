<?php
$adminTitle = "Events";
require_once __DIR__ . '/../config/db.php';

// Handle Form Submissions (Add / Edit / Delete)
$message = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'save_event') {
        $id = $_POST['id'] ?? null;
        $title = $_POST['title'] ?? '';
        $location = $_POST['location'] ?? '';
        $event_date = $_POST['event_date'] ?? '';
        $description = $_POST['description'] ?? '';
        $image_url = $_POST['existing_image'] ?? '';

        // Handle Image Upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $upload_dir = __DIR__ . '/../img/events/';
            if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
            
            $file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $new_filename = uniqid('event_') . '.' . $file_ext;
            $upload_path = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                $image_url = 'img/events/' . $new_filename;
            }
        }

        try {
            if ($id) {
                // Update
                $stmt = $pdo->prepare("UPDATE events SET title = ?, location = ?, event_date = ?, description = ?, image_url = ? WHERE id = ?");
                $stmt->execute([$title, $location, $event_date, $description, $image_url, $id]);
                $message = "Event updated successfully!";
            } else {
                // Insert
                $stmt = $pdo->prepare("INSERT INTO events (title, location, event_date, description, image_url) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$title, $location, $event_date, $description, $image_url]);
                $message = "Event created successfully!";
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    } elseif ($action === 'delete_event') {
        $id = $_POST['id'] ?? null;
        if ($id) {
            try {
                $stmt = $pdo->prepare("DELETE FROM events WHERE id = ?");
                $stmt->execute([$id]);
                $message = "Event deleted successfully!";
            } catch (PDOException $e) {
                $error = "Delete failed: " . $e->getMessage();
            }
        }
    }
}

// Fetch events
try {
    $stmt = $pdo->query("SELECT * FROM events ORDER BY event_date DESC");
    $events = $stmt->fetchAll();
} catch (PDOException $e) {
    $events = [];
    $error = "Could not fetch events.";
}

include __DIR__ . '/../common/admin_header.php';
include __DIR__ . '/../common/admin_sidebar.php';
?>

<!-- Header Section -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 mb-16">
    <div>
        <h1 class="text-4xl lg:text-5xl font-heading font-black tracking-tighter text-brand-blue mb-2">Upcoming Events.</h1>
        <p class="text-brand-light font-medium text-lg italic">Manage site visits and property launch events.</p>
    </div>
    
    <div class="flex gap-4">
        <button id="addEventBtn" class="quick-action-btn bg-brand-blue text-white hover:bg-brand-slate shadow-brand-blue/20">
            <i class="ph-bold ph-calendar-plus"></i> Create New Event
        </button>
    </div>
</div>

<?php if ($message): ?>
    <div class="mb-8 p-6 bg-brand-accent text-brand-blue font-bold rounded-2xl flex items-center gap-4">
        <i class="ph-bold ph-check-circle text-2xl"></i>
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<?php if ($error): ?>
    <div class="mb-8 p-6 bg-red-50 text-red-600 font-bold rounded-2xl flex items-center gap-4">
        <i class="ph-bold ph-warning-circle text-2xl"></i>
        <?php echo $error; ?>
    </div>
<?php endif; ?>

<!-- Events Table Section -->
<div class="bg-white rounded-[3rem] p-8 lg:p-12 border border-slate-100 shadow-sm overflow-hidden text-brand-blue">
    <div class="flex justify-between items-center mb-10 px-4">
        <h2 class="text-2xl font-heading font-black tracking-tighter">Event Schedule.</h2>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-slate-50 text-brand-light text-[10px] font-black uppercase tracking-[3px]">
                    <th class="pb-8 px-4">Image</th>
                    <th class="pb-8 px-4">Event Details</th>
                    <th class="pb-8 px-4">Location</th>
                    <th class="pb-8 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-brand-blue font-bold">
                <?php if (empty($events)): ?>
                    <tr>
                        <td colspan="4" class="py-10 px-4 text-center text-brand-light italic">No events found in the database.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($events as $event): ?>
                    <tr class="group hover:bg-slate-50/50 transition-colors">
                        <td class="py-10 px-4">
                            <div class="w-20 h-14 rounded-xl overflow-hidden shadow-sm">
                                <img src="../<?php echo htmlspecialchars($event['image_url'] ? $event['image_url'] : 'hero.png'); ?>" 
                                     class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="py-10 px-4">
                            <p class="leading-none text-brand-blue mb-2"><?php echo htmlspecialchars($event['title']); ?></p>
                            <p class="text-[10px] text-brand-light font-medium uppercase tracking-wider">
                                <?php echo date('M d, Y • h:i A', strtotime($event['event_date'])); ?>
                            </p>
                        </td>
                        <td class="py-10 px-4 text-brand-light font-medium"><?php echo htmlspecialchars($event['location']); ?></td>
                        <td class="py-10 px-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="editBtn w-10 h-10 rounded-xl hover:bg-slate-100 transition-colors text-brand-blue" 
                                        data-event='<?php echo json_encode($event); ?>'>
                                    <i class="ph ph-pencil-simple"></i>
                                </button>
                                <button class="deleteBtn w-10 h-10 rounded-xl hover:bg-red-50 text-red-500 transition-colors" 
                                        data-id="<?php echo $event['id']; ?>">
                                    <i class="ph ph-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../common/admin_footer.php'; ?>

<!-- Event Modal -->
<div id="eventModal" class="fixed inset-0 z-[100] hidden">
    <div class="absolute inset-0 bg-brand-blue/60 backdrop-blur-sm"></div>
    <div class="absolute inset-0 flex items-center justify-center p-6">
        <div class="bg-white rounded-[3rem] w-full max-w-2xl overflow-hidden shadow-2xl animate-in fade-in zoom-in duration-300">
            <div class="bg-brand-blue p-8 lg:p-12 text-white flex justify-between items-center">
                <h2 id="modalTitle" class="text-3xl font-heading font-black tracking-tighter">Add New Event.</h2>
                <button id="closeModal" class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-2xl hover:bg-white/20 transition-all">
                    <i class="ph ph-x"></i>
                </button>
            </div>
            
            <form id="eventForm" action="events.php" method="POST" enctype="multipart/form-data" class="p-8 lg:p-12 space-y-6">
                <input type="hidden" name="action" value="save_event">
                <input type="hidden" name="id" id="eventId">
                <input type="hidden" name="existing_image" id="existingImage">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Event Title</label>
                        <input type="text" name="title" id="title" required class="w-full px-6 py-4 rounded-xl border border-slate-100 bg-slate-50 outline-none focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/5 transition-all text-sm font-bold">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Location</label>
                        <input type="text" name="location" id="location" required class="w-full px-6 py-4 rounded-xl border border-slate-100 bg-slate-50 outline-none focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/5 transition-all text-sm font-bold">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Date & Time</label>
                        <input type="datetime-local" name="event_date" id="event_date" required class="w-full px-6 py-4 rounded-xl border border-slate-100 bg-slate-50 outline-none focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/5 transition-all text-sm font-bold">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Event Image</label>
                        <input type="file" name="image" id="image" class="w-full px-6 py-3.5 rounded-xl border border-slate-100 bg-slate-50 outline-none text-xs font-bold file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-brand-blue file:text-white hover:file:bg-brand-slate transition-all">
                    </div>
                </div>
                
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Description</label>
                    <textarea name="description" id="description" rows="4" required class="w-full px-6 py-4 rounded-xl border border-slate-100 bg-slate-50 outline-none focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/5 transition-all text-sm font-bold resize-none"></textarea>
                </div>
                
                <div class="pt-6">
                    <button type="submit" class="w-full py-5 bg-brand-blue text-white rounded-2xl font-black uppercase tracking-[3px] text-xs hover:bg-brand-slate shadow-xl shadow-brand-blue/20 transition-all">
                        Save Event Information.
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Deletion Confirmation Form (Hidden) -->
<form id="deleteForm" action="events.php" method="POST" style="display:none;">
    <input type="hidden" name="action" value="delete_event">
    <input type="hidden" name="id" id="deleteId">
</form>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('eventModal');
    const form = document.getElementById('eventForm');
    const addBtn = document.getElementById('addEventBtn');
    const closeModal = document.getElementById('closeModal');
    const modalTitle = document.getElementById('modalTitle');
    
    // Modal Open/Close Logic
    const toggleModal = (show = true) => {
        if (show) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
            form.reset();
            document.getElementById('eventId').value = '';
            document.getElementById('existingImage').value = '';
        }
    };

    if (addBtn) {
        addBtn.addEventListener('click', () => {
            modalTitle.textContent = "Add New Event.";
            toggleModal(true);
        });
    }

    if (closeModal) {
        closeModal.addEventListener('click', () => toggleModal(false));
    }
    
    // Edit Logic
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', () => {
            const data = JSON.parse(btn.getAttribute('data-event'));
            modalTitle.textContent = "Edit Event Details.";
            
            document.getElementById('eventId').value = data.id;
            document.getElementById('title').value = data.title;
            document.getElementById('location').value = data.location;
            document.getElementById('description').value = data.description;
            document.getElementById('existingImage').value = data.image_url;
            
            // Format date for datetime-local input
            if (data.event_date) {
                const date = new Date(data.event_date);
                const localDate = new Date(date.getTime() - date.getTimezoneOffset() * 60000).toISOString().slice(0, 16);
                document.getElementById('event_date').value = localDate;
            }
            
            toggleModal(true);
        });
    });
    
    // Delete Logic
    document.querySelectorAll('.deleteBtn').forEach(btn => {
        btn.addEventListener('click', () => {
            if (confirm('Are you sure you want to delete this event? This action cannot be undone.')) {
                document.getElementById('deleteId').value = btn.getAttribute('data-id');
                document.getElementById('deleteForm').submit();
            }
        });
    });
});
</script>
