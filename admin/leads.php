<?php
$adminTitle = "Leads";
require_once __DIR__ . '/../config/db.php';

// Handle Actions (Delete / Status Update)
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'delete_lead') {
        $id = $_POST['id'] ?? null;
        try {
            $stmt = $pdo->prepare("DELETE FROM leads WHERE id = ?");
            $stmt->execute([$id]);
            $message = "Lead deleted successfully.";
        } catch (PDOException $e) {
            $message = "Error matching lead: " . $e->getMessage();
        }
    }
}

// Fetch Leads
try {
    $stmt = $pdo->query("SELECT * FROM leads ORDER BY created_at DESC");
    $leads = $stmt->fetchAll();
} catch (PDOException $e) {
    $leads = [];
}

include __DIR__ . '/../common/admin_header.php';
include __DIR__ . '/../common/admin_sidebar.php';
?>

<!-- Header Section -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 mb-16">
    <div>
        <h1 class="text-4xl lg:text-5xl font-heading font-black tracking-tighter text-gradient mb-2">Lead Generation.</h1>
        <p class="text-brand-light font-medium text-lg italic">Monitor and manage property enquiries and business leads.</p>
    </div>
</div>

<?php if ($message): ?>
    <div class="mb-8 p-6 bg-brand-accent text-brand-blue font-bold rounded-2xl flex items-center gap-4">
        <i class="ph-bold ph-check-circle text-2xl"></i>
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<!-- Leads Table Section -->
<div class="bg-white rounded-[3rem] p-8 lg:p-12 border border-slate-100 shadow-sm overflow-hidden text-brand-blue">
    <div class="flex justify-between items-center mb-10 px-4">
        <h2 class="text-2xl font-heading font-black tracking-tighter">Business Inbox.</h2>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-slate-50 text-brand-light text-[10px] font-black uppercase tracking-[3px]">
                    <th class="pb-8 px-4">Enquirer</th>
                    <th class="pb-8 px-4">Interest</th>
                    <th class="pb-8 px-4">Received On</th>
                    <th class="pb-8 px-4 text-center">Status</th>
                    <th class="pb-8 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-brand-blue font-bold">
                <?php if (empty($leads)): ?>
                    <tr><td colspan="5" class="py-10 text-center text-brand-light italic">No leads found.</td></tr>
                <?php else: ?>
                    <?php foreach ($leads as $lead): ?>
                    <tr class="group hover:bg-slate-50/50 transition-colors">
                        <td class="py-10 px-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-sm font-black text-brand-blue uppercase">
                                    <?php echo substr($lead['full_name'], 0, 2); ?>
                                </div>
                                <div>
                                    <p class="leading-none text-brand-blue"><?php echo htmlspecialchars($lead['full_name']); ?></p>
                                    <p class="text-[10px] text-brand-light font-medium mt-1"><?php echo htmlspecialchars($lead['email']); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="py-10 px-4 text-brand-blue">
                            <span class="text-xs font-black uppercase tracking-widest bg-brand-accent/30 px-3 py-1 rounded-full">
                                <?php echo htmlspecialchars($lead['property_name'] ? $lead['property_name'] : 'General Enquiry'); ?>
                            </span>
                            <?php if ($lead['message']): ?>
                                <p class="mt-3 text-[11px] font-medium text-brand-light leading-relaxed max-w-[200px] italic" title="<?php echo htmlspecialchars($lead['message']); ?>">
                                    "<?php echo htmlspecialchars($lead['message']); ?>"
                                </p>
                            <?php endif; ?>
                        </td>
                        <td class="py-10 px-4 text-brand-light text-sm"><?php echo date('M d, Y', strtotime($lead['created_at'])); ?></td>
                        <td class="py-10 px-4 text-center"><span class="badge badge-new"><?php echo ucfirst($lead['status']); ?></span></td>
                        <td class="py-10 px-4 text-right">
                            <form action="leads.php" method="POST" onsubmit="return confirm('Delete this lead?');">
                                <input type="hidden" name="action" value="delete_lead">
                                <input type="hidden" name="id" value="<?php echo $lead['id']; ?>">
                                <button type="submit" class="w-10 h-10 rounded-xl hover:bg-red-50 text-red-500 transition-colors">
                                    <i class="ph ph-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../common/admin_footer.php'; ?>
