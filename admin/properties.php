<?php
$adminTitle = "Properties";
include __DIR__ . '/../common/admin_header.php';
include __DIR__ . '/../common/admin_sidebar.php';
?>

<!-- Header Section -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 mb-16">
    <div>
        <h1 class="text-4xl lg:text-5xl font-heading font-black tracking-tighter text-brand-blue mb-2">Properties Portfolio.</h1>
        <p class="text-brand-light font-medium text-lg italic">Manage your real-time real estate listings.</p>
    </div>
    
    <div class="flex gap-4">
        <button class="quick-action-btn bg-brand-blue text-white hover:bg-brand-slate shadow-brand-blue/20">
            <i class="ph-bold ph-plus"></i> Add New Property
        </button>
    </div>
</div>

<!-- Properties Table Section -->
<div class="bg-white rounded-[3rem] p-8 lg:p-12 border border-slate-100 shadow-sm overflow-hidden text-brand-blue">
    <div class="flex justify-between items-center mb-10 px-4">
        <h2 class="text-2xl font-heading font-black tracking-tighter">All Active Listings.</h2>
        <div class="flex gap-4">
            <input type="text" placeholder="Search properties..." class="px-6 py-3 rounded-xl border border-slate-100 bg-slate-50 outline-none focus:border-brand-blue w-64 text-sm font-semibold">
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-slate-50 text-brand-light text-[10px] font-black uppercase tracking-[3px]">
                    <th class="pb-8 px-4">Property Name</th>
                    <th class="pb-8 px-4">Location</th>
                    <th class="pb-8 px-4">Specs & Type</th>
                    <th class="pb-8 px-4">Investment</th>
                    <th class="pb-8 px-4 text-center">Status</th>
                    <th class="pb-8 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="text-brand-blue font-bold">
                <tr class="group hover:bg-slate-50/50 transition-colors">
                    <td class="py-10 px-4">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-slate-100 rounded-2xl overflow-hidden shadow-sm">
                                <img src="../hero.png" class="w-full h-full object-cover" alt="Property">
                            </div>
                            <p class="leading-none text-brand-blue">Skyline Luxury Villa</p>
                        </div>
                    </td>
                    <td class="py-10 px-4 text-brand-light">Downtown Mumbai</td>
                    <td class="py-10 px-4">4 BHK • Villa</td>
                    <td class="py-10 px-4 text-brand-blue">₹1.25 Cr</td>
                    <td class="py-10 px-4 text-center"><span class="badge badge-closed">Available</span></td>
                    <td class="py-10 px-4 text-right">
                        <div class="flex justify-end gap-2">
                            <button class="w-10 h-10 rounded-xl hover:bg-slate-100 transition-colors"><i class="ph ph-pencil-simple text-brand-blue"></i></button>
                            <button class="w-10 h-10 rounded-xl hover:bg-red-50 text-red-500 transition-colors"><i class="ph ph-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <!-- More property rows... -->
            </tbody>
        </table>
    </div>
</div>

<?php include '../common/admin_footer.php'; ?>
