<?php
$adminTitle = "Dashboard";
include __DIR__ . '/../common/admin_header.php';
include __DIR__ . '/../common/admin_sidebar.php';
?>

<!-- Header Section -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 mb-16">
    <div>
        <h1 class="text-4xl lg:text-5xl font-heading font-black tracking-tighter text-brand-blue mb-2">Overview Dashboard.</h1>
        <p class="text-brand-light font-medium text-lg italic">Welcome back to your administration portal.</p>
    </div>
    
    <div class="flex gap-4">
        <a href="properties.php" class="quick-action-btn bg-brand-blue text-white hover:bg-brand-slate shadow-brand-blue/20">
            <i class="ph-bold ph-plus"></i> Add Property
        </a>
        <a href="events.php" class="quick-action-btn bg-white text-brand-blue border border-slate-100 hover:bg-slate-50 ring-1 ring-slate-100">
            <i class="ph-bold ph-calendar-plus"></i> Create Event
        </a>
    </div>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 mb-16">
    <!-- Stat 1: Properties -->
    <div class="stat-card">
        <div class="flex justify-between items-start mb-10">
            <div class="w-16 h-16 bg-brand-bg rounded-3xl flex items-center justify-center text-brand-blue text-3xl font-bold">
                <i class="ph-fill ph-buildings"></i>
            </div>
            <a href="properties.php" class="text-xs font-black uppercase text-brand-blue/30 tracking-widest hover:text-brand-blue transition-colors">View All</a>
        </div>
        <div>
            <p class="text-brand-light font-bold text-sm uppercase tracking-widest mb-2">Total Properties</p>
            <h3 class="text-5xl font-heading font-black text-brand-blue tracking-tighter">24.</h3>
        </div>
    </div>

    <!-- Stat 2: Active Leads -->
    <div class="stat-card bg-brand-blue !border-none text-white shadow-3xl shadow-brand-blue/20 relative overflow-hidden group">
        <div class="absolute -right-8 -top-8 w-48 h-48 bg-white/5 rounded-full blur-3xl transition-transform duration-700 group-hover:scale-150"></div>
        <div class="flex justify-between items-start mb-10 relative z-10">
            <div class="w-16 h-16 bg-white/10 rounded-3xl flex items-center justify-center text-brand-accent text-3xl font-bold">
                <i class="ph-fill ph-users-three"></i>
            </div>
            <span class="badge bg-brand-accent/20 text-brand-accent border-brand-accent/30">+12% New</span>
        </div>
        <div class="relative z-10">
            <p class="text-white/40 font-bold text-sm uppercase tracking-widest mb-2">Active Leads</p>
            <h3 class="text-5xl font-heading font-black text-brand-accent tracking-tighter">145.</h3>
        </div>
    </div>

    <!-- Stat 3: Events -->
    <div class="stat-card">
        <div class="flex justify-between items-start mb-10">
            <div class="w-16 h-16 bg-brand-bg rounded-3xl flex items-center justify-center text-brand-blue text-3xl font-bold">
                <i class="ph-fill ph-calendar-star"></i>
            </div>
            <span class="text-xs font-bold text-emerald-500 uppercase flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></div> Live Today</span>
        </div>
        <div>
            <p class="text-brand-light font-bold text-sm uppercase tracking-widest mb-2">Upcoming Events</p>
            <h3 class="text-5xl font-heading font-black text-brand-blue tracking-tighter">08.</h3>
        </div>
    </div>
</div>

<!-- Recent Leads Table Section -->
<div class="bg-white rounded-[3rem] p-8 lg:p-12 border border-slate-100 shadow-sm overflow-hidden text-brand-blue">
    <div class="flex justify-between items-center mb-10 px-4">
        <h2 class="text-3xl font-heading font-black tracking-tighter">Recent Business Leads.</h2>
        <a href="leads.php" class="text-sm font-black text-brand-light hover:text-brand-blue flex items-center gap-2">Full Report <i class="ph ph-caret-right"></i></a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-slate-50 text-brand-light text-[10px] font-black uppercase tracking-[3px]">
                    <th class="pb-8 px-4">Name</th>
                    <th class="pb-8 px-4">Property of Interest</th>
                    <th class="pb-8 px-4">Date Recieved</th>
                    <th class="pb-8 px-4 text-center">Status</th>
                    <th class="pb-8 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-brand-blue font-bold">
                <tr class="group hover:bg-slate-50/50 transition-colors">
                    <td class="py-10 px-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center text-xl">JD</div>
                            <div>
                                <p class="leading-none mb-1 text-slate-900">Johnathan Doe</p>
                                <p class="text-[10px] text-brand-light">john@example.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-10 px-4 text-slate-800">Skyline Luxury Villa</td>
                    <td class="py-10 px-4 text-slate-600">April 08, 2026</td>
                    <td class="py-10 px-4 text-center"><span class="badge badge-new">New Lead</span></td>
                    <td class="py-10 px-4 text-right">
                        <button class="w-10 h-10 rounded-xl hover:bg-slate-100 transition-colors"><i class="ph-bold ph-dots-three-outline text-brand-blue"></i></button>
                    </td>
                </tr>
                <!-- More rows as needed... -->
            </tbody>
        </table>
    </div>
</div>

<?php include '../common/admin_footer.php'; ?>
