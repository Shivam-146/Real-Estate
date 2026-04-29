<?php
$adminTitle = "Properties";
require_once __DIR__ . '/../config/db.php';

// Handle Form Submissions (Add / Edit / Delete)
$message = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'save_property') {
        $id = $_POST['id'] ?? null;
        $name = $_POST['name'] ?? '';
        $location = $_POST['location'] ?? '';
        $amenities = $_POST['amenities'] ?? '';
        $status = $_POST['status'] ?? 'Available';
        $category = $_POST['category'] ?? 'Recent';
        $description = $_POST['description'] ?? '';
        $image_url = $_POST['existing_image'] ?? '';

        // Handle Image Upload (Priority to compressed image from client-side)
        if (isset($_POST['compressed_image']) && !empty($_POST['compressed_image'])) {
            $data = $_POST['compressed_image'];
            if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
                $data = substr($data, strpos($data, ',') + 1);
                $type = strtolower($type[1]); // jpg, png, etc
                $data = base64_decode($data);
                
                if ($data !== false) {
                    $upload_dir = __DIR__ . '/../img/properties/';
                    if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
                    
                    $new_filename = uniqid('prop_') . '.' . $type;
                    $upload_path = $upload_dir . $new_filename;
                    
                    if (file_put_contents($upload_path, $data)) {
                        $image_url = 'img/properties/' . $new_filename;
                    } else {
                        $error = "Failed to save compressed image.";
                    }
                } else {
                    $error = "Image decoding failed.";
                }
            }
        } elseif (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $upload_dir = __DIR__ . '/../img/properties/';
            if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
            
            $file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $new_filename = uniqid('prop_') . '.' . $file_ext;
            $upload_path = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                $image_url = 'img/properties/' . $new_filename;
            } else {
                $error = "Failed to move uploaded file.";
            }
        } elseif (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $error = "Upload error: " . $_FILES['image']['error'];
        }

        if (empty($error)) {
            try {
                if ($id) {
                    // Update
                    $stmt = $pdo->prepare("UPDATE properties SET name = ?, location = ?, amenities = ?, status = ?, category = ?, description = ?, image_url = ? WHERE id = ?");
                    $stmt->execute([$name, $location, $amenities, $status, $category, $description, $image_url, $id]);
                    $message = "Property updated successfully!";
                    $property_id = $id;
                } else {
                    // Insert
                    $stmt = $pdo->prepare("INSERT INTO properties (name, location, amenities, status, category, description, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$name, $location, $amenities, $status, $category, $description, $image_url]);
                    $message = "Property added successfully!";
                    $property_id = $pdo->lastInsertId();
                }

                // Handle Gallery Images
                if (isset($_POST['compressed_gallery_images']) && !empty($_POST['compressed_gallery_images'])) {
                    $imagesData = json_decode($_POST['compressed_gallery_images'], true);
                    if (is_array($imagesData)) {
                        $upload_dir = __DIR__ . '/../img/properties/gallery/';
                        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
                        
                        foreach ($imagesData as $data) {
                            if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
                                $data = substr($data, strpos($data, ',') + 1);
                                $type = strtolower($type[1]);
                                $data = base64_decode($data);
                                
                                if ($data !== false) {
                                    $new_filename = uniqid('gal_') . '.' . $type;
                                    $upload_path = $upload_dir . $new_filename;
                                    
                                    if (file_put_contents($upload_path, $data)) {
                                        $gallery_image_url = 'img/properties/gallery/' . $new_filename;
                                        $stmt = $pdo->prepare("INSERT INTO property_images (property_id, image_url) VALUES (?, ?)");
                                        $stmt->execute([$property_id, $gallery_image_url]);
                                    }
                                }
                            }
                        }
                    }
                } elseif (isset($_FILES['gallery_images']) && is_array($_FILES['gallery_images']['error'])) {
                    $upload_dir = __DIR__ . '/../img/properties/gallery/';
                    if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
                    
                    foreach ($_FILES['gallery_images']['error'] as $key => $error_code) {
                        if ($error_code === UPLOAD_ERR_OK) {
                            $file_ext = pathinfo($_FILES['gallery_images']['name'][$key], PATHINFO_EXTENSION);
                            $new_filename = uniqid('gal_') . '.' . $file_ext;
                            $upload_path = $upload_dir . $new_filename;

                            if (move_uploaded_file($_FILES['gallery_images']['tmp_name'][$key], $upload_path)) {
                                $gallery_image_url = 'img/properties/gallery/' . $new_filename;
                                $stmt = $pdo->prepare("INSERT INTO property_images (property_id, image_url) VALUES (?, ?)");
                                $stmt->execute([$property_id, $gallery_image_url]);
                            }
                        }
                    }
                }

                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                    echo json_encode(['success' => true, 'property_id' => $property_id]);
                    exit();
                }

            } catch (PDOException $e) {
                $error = "Database error: " . $e->getMessage();
            }
        }
    } elseif ($action === 'delete_property') {
        $id = $_POST['id'] ?? null;
        if ($id) {
            try {
                $stmt = $pdo->prepare("DELETE FROM properties WHERE id = ?");
                $stmt->execute([$id]);
                $message = "Property deleted successfully!";
            } catch (PDOException $e) {
                $error = "Delete failed: " . $e->getMessage();
            }
        }
    }
}

// Fetch properties
try {
    $stmt = $pdo->query("SELECT * FROM properties ORDER BY created_at DESC");
    $properties = $stmt->fetchAll();
} catch (PDOException $e) {
    $properties = [];
    $error = "Could not fetch properties.";
}

include __DIR__ . '/../common/admin_header.php';
include __DIR__ . '/../common/admin_sidebar.php';
?>

<!-- Header Section -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 mb-16">
    <div>
        <h1 class="text-4xl lg:text-5xl font-heading font-black tracking-tighter text-gradient mb-2">Properties Portfolio.</h1>
        <p class="text-brand-light font-medium text-lg italic">Manage your real-time real estate listings.</p>
    </div>
    
    <div class="flex gap-4">
        <button id="addPropertyBtn" class="quick-action-btn bg-brand-blue text-white hover:bg-brand-slate shadow-brand-blue/20">
            <i class="ph-bold ph-plus"></i> Add New Property
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

<!-- Properties Table Section -->
<div class="bg-white rounded-[3rem] p-8 lg:p-12 border border-slate-100 shadow-sm overflow-hidden text-brand-blue">
    <div class="flex justify-between items-center mb-10 px-4">
        <h2 class="text-2xl font-heading font-black tracking-tighter">All Active Listings.</h2>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-slate-50 text-brand-light text-[10px] font-black uppercase tracking-[3px]">
                    <th class="pb-8 px-4">Property</th>
                    <th class="pb-8 px-4">Location</th>
                    <th class="pb-8 px-4">Category</th>
                    <th class="pb-8 px-4 text-center">Status</th>
                    <th class="pb-8 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-brand-blue font-bold">
                <?php if (empty($properties)): ?>
                    <tr>
                        <td colspan="5" class="py-10 px-4 text-center text-brand-light italic">No properties found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($properties as $prop): ?>
                    <tr class="group hover:bg-slate-50/50 transition-colors">
                        <td class="py-10 px-4">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 bg-slate-100 rounded-2xl overflow-hidden shadow-sm">
                                    <img src="../<?php echo htmlspecialchars($prop['image_url'] ? $prop['image_url'] : 'hero.png'); ?>" class="w-full h-full object-cover">
                                </div>
                                <p class="leading-none text-brand-blue"><?php echo htmlspecialchars($prop['name']); ?></p>
                            </div>
                        </td>
                        <td class="py-10 px-4 text-brand-light"><?php echo htmlspecialchars($prop['location']); ?></td>
                        <td class="py-10 px-4">
                            <span class="text-[10px] font-black uppercase tracking-widest bg-slate-100 px-3 py-1 rounded-full text-brand-blue">
                                <?php echo htmlspecialchars($prop['category']); ?>
                            </span>
                        </td>
                        <td class="py-10 px-4 text-center text-xs">
                            <span class="px-3 py-1 bg-slate-50 rounded-full <?php echo $prop['status'] == 'Available' ? 'text-green-600' : 'text-red-500'; ?>">
                                <?php echo htmlspecialchars($prop['status']); ?>
                            </span>
                        </td>
                        <td class="py-10 px-4 text-right">
                            <div class="flex justify-end gap-2 text-right">
                                <a href="property_images.php?id=<?php echo $prop['id']; ?>" 
                                   class="w-10 h-10 rounded-xl hover:bg-slate-100 transition-colors text-brand-blue flex items-center justify-center"
                                   title="Manage Images">
                                    <i class="ph ph-images"></i>
                                </a>
                                <a href="../property-detail.php?id=<?php echo $prop['id']; ?>" target="_blank"
                                   class="w-10 h-10 rounded-xl hover:bg-slate-100 transition-colors text-brand-blue flex items-center justify-center"
                                   title="View Public Page">
                                    <i class="ph ph-globe"></i>
                                </a>
                                <button class="editBtn w-10 h-10 rounded-xl hover:bg-slate-100 transition-colors text-brand-blue" 
                                        data-prop='<?php echo json_encode($prop); ?>'>
                                    <i class="ph ph-pencil-simple"></i>
                                </button>
                                <button class="deleteBtn w-10 h-10 rounded-xl hover:bg-red-50 text-red-500 transition-colors" 
                                        data-id="<?php echo $prop['id']; ?>">
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

<!-- Property Modal -->
<div id="propertyModal" class="fixed inset-0 z-[100] hidden">
    <div class="absolute inset-0 bg-brand-blue/60 backdrop-blur-sm"></div>
    <div class="absolute inset-0 flex items-center justify-center p-6">
        <div class="bg-white rounded-[3rem] w-full max-w-2xl overflow-hidden shadow-2xl animate-in fade-in zoom-in duration-300">
            <div class="bg-brand-blue p-8 lg:p-12 text-white flex justify-between items-center">
                <h2 id="modalTitle" class="text-3xl font-heading font-black tracking-tighter">Add Property.</h2>
                <button id="closeModal" class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-2xl hover:bg-white/20 transition-all">
                    <i class="ph ph-x"></i>
                </button>
            </div>
            
            <div class="max-h-[80vh] overflow-y-auto">
                <form id="propertyForm" action="properties.php" method="POST" enctype="multipart/form-data" class="p-8 lg:p-12 space-y-6">
                <input type="hidden" name="action" value="save_property">
                <input type="hidden" name="id" id="propId">
                <input type="hidden" name="existing_image" id="existingImage">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Property Name</label>
                        <input type="text" name="name" id="name" required class="w-full px-6 py-4 rounded-xl border border-slate-100 bg-slate-50 outline-none focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/5 transition-all text-sm font-bold">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Location</label>
                        <input type="text" name="location" id="location" required class="w-full px-6 py-4 rounded-xl border border-slate-100 bg-slate-50 outline-none focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/5 transition-all text-sm font-bold">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Status</label>
                        <select name="status" id="status" class="w-full px-6 py-4 rounded-xl border border-slate-100 bg-slate-50 outline-none focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/5 transition-all text-sm font-bold">
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Category</label>
                        <select name="category" id="category" class="w-full px-6 py-4 rounded-xl border border-slate-100 bg-slate-50 outline-none focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/5 transition-all text-sm font-bold">
                            <option value="Completed">Completed Project</option>
                            <option value="Recent">Recent Project</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Amenities (Comma separated)</label>
                        <input type="text" name="amenities" id="amenities" placeholder="Pool, Gym, Parking, etc." class="w-full px-6 py-4 rounded-xl border border-slate-100 bg-slate-50 outline-none focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/5 transition-all text-sm font-bold">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Main Property Image</label>
                        <input type="file" name="image" id="image" accept="image/*" class="w-full px-6 py-3.5 rounded-xl border border-slate-100 bg-slate-50 outline-none text-xs font-bold file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-brand-blue file:text-white hover:file:bg-brand-slate transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Gallery Images (Multiple)</label>
                        <input type="file" name="gallery_images[]" id="galleryImages" multiple accept="image/*" class="w-full px-6 py-3.5 rounded-xl border border-slate-100 bg-slate-50 outline-none text-xs font-bold file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-brand-blue file:text-white hover:file:bg-brand-slate transition-all">
                    </div>
                </div>
                
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Description</label>
                    <textarea name="description" id="description" rows="3" required class="w-full px-6 py-4 rounded-xl border border-slate-100 bg-slate-50 outline-none focus:border-brand-blue focus:ring-4 focus:ring-brand-blue/5 transition-all text-sm font-bold resize-none"></textarea>
                </div>
                
                <div class="pt-6">
                    <button type="submit" id="savePropertyBtn" class="w-full py-5 bg-brand-blue text-white rounded-2xl font-black uppercase tracking-[3px] text-xs hover:bg-brand-slate shadow-xl shadow-brand-blue/20 transition-all">
                        Save Property Details.
                    </button>
                </div>

                <!-- Progress Bar Container -->
                <div id="progressContainer" class="hidden space-y-2 pt-4">
                    <div class="flex justify-between text-[10px] font-black uppercase tracking-widest text-brand-light">
                        <span id="progressStatus">Processing...</span>
                        <span id="progressPercent">0%</span>
                    </div>
                    <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden">
                        <div id="progressBar" class="h-full bg-brand-blue transition-all duration-300" style="width: 0%"></div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<!-- Deletion Confirmation Form (Hidden) -->
<form id="deleteForm" action="properties.php" method="POST" style="display:none;">
    <input type="hidden" name="action" value="delete_property">
    <input type="hidden" name="id" id="deleteId">
</form>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('propertyModal');
    const form = document.getElementById('propertyForm');
    const addBtn = document.getElementById('addPropertyBtn');
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
            document.getElementById('propId').value = '';
            document.getElementById('existingImage').value = '';
        }
    };

    if (addBtn) {
        addBtn.addEventListener('click', () => {
            modalTitle.textContent = "Add Property.";
            toggleModal(true);
        });
    }

    if (closeModal) {
        closeModal.addEventListener('click', () => toggleModal(false));
    }
    
    // Edit Logic
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', () => {
            const data = JSON.parse(btn.getAttribute('data-prop'));
            modalTitle.textContent = "Edit Property Details.";
            
            document.getElementById('propId').value = data.id;
            document.getElementById('name').value = data.name;
            document.getElementById('location').value = data.location;
            document.getElementById('amenities').value = data.amenities;
            document.getElementById('status').value = data.status;
            document.getElementById('category').value = data.category;
            document.getElementById('description').value = data.description;
            document.getElementById('existingImage').value = data.image_url;
            
            toggleModal(true);
        });
    });
    
    // AJAX Submission with Compression and Progress
    const progressContainer = document.getElementById('progressContainer');
    const progressBar = document.getElementById('progressBar');
    const progressStatus = document.getElementById('progressStatus');
    const progressPercent = document.getElementById('progressPercent');
    const submitBtn = document.getElementById('savePropertyBtn');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        submitBtn.disabled = true;
        progressContainer.classList.remove('hidden');
        
        const formData = new FormData(form);
        
        // Helper function for compression
        const compressImage = (file, maxWidth = 1000) => {
            return new Promise((resolve) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = (event) => {
                    const img = new Image();
                    img.src = event.target.result;
                    img.onload = () => {
                        const canvas = document.createElement('canvas');
                        let width = img.width;
                        let height = img.height;
                        if (width > maxWidth) {
                            height *= maxWidth / width;
                            width = maxWidth;
                        }
                        canvas.width = width;
                        canvas.height = height;
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0, width, height);
                        canvas.toBlob((b) => resolve(b), 'image/jpeg', 0.6);
                    };
                };
            });
        };

        try {
            // 1. Process Main Image
            const mainImageFile = document.getElementById('image').files[0];
            if (mainImageFile) {
                progressStatus.innerText = 'Compressing Main Image...';
                progressBar.style.width = '10%';
                progressPercent.innerText = '10%';
                const blob = await compressImage(mainImageFile, 1200);
                formData.set('image', blob, 'main.jpg');
            }

            // 2. Save Property and Get ID
            progressStatus.innerText = 'Saving Property Details...';
            const galleryFiles = Array.from(document.getElementById('galleryImages').files);
            formData.delete('gallery_images[]'); // We will upload these separately

            const response = await new Promise((resolve, reject) => {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', form.getAttribute('action') || window.location.href, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onload = () => {
                    if (xhr.status === 200) resolve(JSON.parse(xhr.responseText));
                    else reject(`Server Error: ${xhr.status}`);
                };
                xhr.onerror = () => reject('Network Error');
                xhr.send(formData);
            });

            const propertyId = response.property_id;

            // 3. Process Gallery Images One-by-One
            if (galleryFiles.length > 0) {
                for (let i = 0; i < galleryFiles.length; i++) {
                    progressStatus.innerText = `Gallery Image ${i+1}/${galleryFiles.length}...`;
                    const stepBase = 20 + ((i / galleryFiles.length) * 80);
                    const stepSize = (1 / galleryFiles.length) * 80;
                    
                    const blob = await compressImage(galleryFiles[i], 1200);
                    
                    const galleryFormData = new FormData();
                    galleryFormData.append('action', 'upload_image');
                    galleryFormData.append('images[]', blob, `gallery_${i}.jpg`);

                    await new Promise((resolve, reject) => {
                        const xhr = new XMLHttpRequest();
                        // Upload to property_images.php with the new property ID
                        xhr.open('POST', `property_images.php?id=${propertyId}`, true);
                        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                        
                        xhr.upload.onprogress = (event) => {
                            if (event.lengthComputable) {
                                const uploadPercent = (event.loaded / event.total) * stepSize;
                                const totalPercent = Math.round(stepBase + uploadPercent);
                                progressBar.style.width = totalPercent + '%';
                                progressPercent.innerText = totalPercent + '%';
                            }
                        };

                        xhr.onload = () => {
                            if (xhr.status === 200) resolve();
                            else reject(`Gallery Server Error: ${xhr.status}`);
                        };
                        xhr.onerror = () => reject('Gallery Network Error');
                        xhr.send(galleryFormData);
                    });
                }
            }

            progressStatus.innerText = 'All Saved Successfully!';
            progressBar.style.width = '100%';
            progressPercent.innerText = '100%';
            setTimeout(() => window.location.reload(), 500);

        } catch (err) {
            alert(`Error: ${err}`);
            submitBtn.disabled = false;
            progressContainer.classList.add('hidden');
        }
    });
    
    // Delete Logic
    document.querySelectorAll('.deleteBtn').forEach(btn => {
        btn.addEventListener('click', () => {
            if (confirm('Are you sure you want to delete this property?')) {
                document.getElementById('deleteId').value = btn.getAttribute('data-id');
                document.getElementById('deleteForm').submit();
            }
        });
    });
});
</script>

<?php include '../common/admin_footer.php'; ?>
