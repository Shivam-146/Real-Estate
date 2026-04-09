<?php
$adminTitle = "Events";
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
        <button class="quick-action-btn bg-brand-blue text-white hover:bg-brand-slate shadow-brand-blue/20">
            <i class="ph-bold ph-calendar-plus"></i> Create New Event
        </button>
    </div>
</div>

<!-- Events Table Section -->
<div class="bg-white rounded-[3rem] p-8 lg:p-12 border border-slate-100 shadow-sm overflow-hidden text-brand-blue">
    <div class="flex justify-between items-center mb-10 px-4">
        <h2 class="text-2xl font-heading font-black tracking-tighter">Event Schedule.</h2>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-slate-50 text-brand-light text-[10px] font-black uppercase tracking-[3px]">
                    <th class="pb-8 px-4">Event Name</th>
                    <th class="pb-8 px-4">Related Property</th>
                    <th class="pb-8 px-4">Date & Time</th>
                    <th class="pb-8 px-4">Attendees</th>
                    <th class="pb-8 px-4 text-center">Status</th>
                    <th class="pb-8 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-brand-blue font-bold">
                <tr class="group hover:bg-slate-50/50 transition-colors">
                    <td class="py-10 px-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center text-2xl">
                                <i class="ph-bold ph-house-line"></i>
                            </div>
                            <p class="leading-none text-brand-blue">Luxury Villa Site Visit</p>
                        </div>
                    </td>
                    <td class="py-10 px-4">Skyline Luxury Villa</td>
                    <td class="py-10 px-4 text-brand-light">April 12, 2026 • 10:00 AM</td>
                    <td class="py-10 px-4">12 Registered</td>
                    <td class="py-10 px-4 text-center"><span class="badge badge-contacted">Confirmed</span></td>
                    <td class="py-10 px-4 text-right">
                        <div class="flex justify-end gap-2">
                            <button class="w-10 h-10 rounded-xl hover:bg-slate-100 transition-colors"><i class="ph ph-pencil-simple text-brand-blue"></i></button>
                            <button class="w-10 h-10 rounded-xl hover:bg-red-50 text-red-500 transition-colors"><i class="ph ph-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <!-- More event rows... -->
            </tbody>
        </table>
    </div>
</div>

<?php include '../common/admin_footer.php'; ?>
