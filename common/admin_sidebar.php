<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!-- Mobile Navigation (hidden on desktop) -->
<div class="lg:hidden flex items-center justify-between p-6 bg-brand-blue text-white sticky top-0 z-50">
    <div class="flex items-center gap-2">
        <i class="ph-bold ph-caret-up text-brand-accent text-3xl"></i>
        <span class="font-heading font-black text-xl uppercase tracking-tighter">Estate.</span>
    </div>
    <button onclick="toggleSidebar()" class="text-3xl"><i class="ph ph-list"></i></button>
</div>

<div class="flex">
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-80 bg-brand-blue text-white p-8 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 flex flex-col">
        <div class="flex items-center gap-3 mb-16 ml-2">
            <i class="ph-bold ph-caret-up text-brand-accent text-5xl"></i>
            <h2 class="text-3xl font-heading tracking-tighter uppercase leading-none">
                <span class="font-light opacity-60">Real</span> <span class="font-black text-brand-accent">Estate</span>
            </h2>
        </div>
        
        <nav class="space-y-3 flex-grow">
            <p class="text-[10px] font-black uppercase tracking-[4px] text-white/20 mb-6 ml-4">Main Menu</p>
            <a href="index.php" class="sidebar-link <?php echo $currentPage == 'index.php' ? 'active' : ''; ?>"><i class="ph ph-squares-four-fill"></i> Dashboard</a>
            <a href="properties.php" class="sidebar-link <?php echo $currentPage == 'properties.php' ? 'active' : ''; ?>"><i class="ph ph-buildings"></i> Properties</a>
            <a href="events.php" class="sidebar-link <?php echo $currentPage == 'events.php' ? 'active' : ''; ?>"><i class="ph ph-calendar-star"></i> Events</a>
            <a href="leads.php" class="sidebar-link <?php echo $currentPage == 'leads.php' ? 'active' : ''; ?>"><i class="ph ph-users-three"></i> Leads</a>
        </nav>

        <div class="mt-auto space-y-3 border-t border-white/5 pt-8">
            <div class="flex items-center gap-4 px-4 py-6 bg-white/5 rounded-[2rem] border border-white/5 mb-6">
                <div class="w-12 h-12 bg-brand-accent rounded-full flex items-center justify-center text-brand-blue font-black uppercase">
                    <?php echo isset($_SESSION['admin_user']) ? substr($_SESSION['admin_user'], 0, 2) : 'A'; ?>
                </div>
                <div>
                    <p class="font-bold text-sm text-white"><?php echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Admin'; ?></p>
                    <p class="text-xs font-medium text-white/40 uppercase tracking-widest">Administrator</p>
                </div>
            </div>
            <a href="../index.php" class="sidebar-link !px-4 hover:!bg-transparent"><i class="ph ph-arrow-square-out"></i> Live Website</a>
            <a href="logout.php" class="sidebar-link !px-4 text-red-400 hover:text-red-300 hover:!bg-transparent"><i class="ph ph-sign-out"></i> Logout</a>
        </div>
    </aside>

    <!-- Content Wrap Start -->
    <main class="flex-grow lg:ml-80 min-h-screen p-6 lg:p-16">
