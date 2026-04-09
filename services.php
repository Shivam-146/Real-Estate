<?php
$pageTitle = "Our Services | Real Estate Management";
$pageDescription = "Explore our end-to-end property management lifecycle services, from residential sales to commercial leasing in Mumbai.";
include 'common/header.php';
?>

    <!-- Page Header -->
    <header class="relative pt-64 pb-80 bg-brand-teal text-white px-6 hero-curve mb-20 text-center overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="inline-flex items-center gap-4 text-[10px] font-black uppercase tracking-[5px] text-brand-lime mb-6 w-full justify-center" data-aos="fade-down">
                <span class="w-10 h-[1px] bg-brand-lime"></span> Our Expertise <span class="w-10 h-[1px] bg-brand-lime"></span>
            </div>
            <h1 class="font-heading text-7xl md:text-9xl font-black tracking-tighter leading-none mb-8" data-aos="fade-up">
                <span class="bg-clip-text text-transparent bg-gradient-to-b from-white via-white to-white/40">Services.</span>
            </h1>
        </div>
        <div class="absolute inset-0 bg-[url('hero.png')] opacity-10 bg-center bg-cover"></div>
    </header>

    <!-- Content: Services Grid -->
    <section class="py-32 px-6">
        <div class="max-w-7xl mx-auto mb-20 text-center" data-aos="fade-up">
            <span class="font-bold text-xs tracking-[0.4em] text-brand-teal/30 uppercase mb-6 block">End-To-End Management</span>
            <h2 class="text-5xl md:text-8xl font-heading font-black text-brand-teal mb-8 tracking-tighter leading-[0.95]">
                Property Management <span class="italic text-brand-lime bg-brand-teal px-4">Lifecycle.</span>
            </h2>
        </div>
        
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Service 1 -->
            <div class="service-card" data-aos="fade-up">
                <div class="w-16 h-16 bg-brand-lime rounded-full flex items-center justify-center text-3xl text-brand-teal mb-8 shadow-lime"><i class="ph-bold ph-house-line"></i></div>
                <h3 class="text-2xl font-bold text-brand-teal mb-4">Residential Sales</h3>
                <p class="text-sm opacity-70 leading-relaxed mb-8">Premium marketing and sales for luxury villas and smart apartment complexes.</p>
                <a href="projects.php" class="text-xs font-black uppercase text-brand-teal border-b-2 border-brand-lime pb-1 hover:text-brand-lime transition-all">Explore Ready Projects</a>
            </div>

            <!-- Service 2 -->
            <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-brand-lime rounded-full flex items-center justify-center text-3xl text-brand-teal mb-8 shadow-lime"><i class="ph-bold ph-buildings"></i></div>
                <h3 class="text-2xl font-bold text-brand-teal mb-4">Commercial Leasing</h3>
                <p class="text-sm opacity-70 leading-relaxed mb-8">Asset management for retail plazas and Grade-A corporate office parks.</p>
                <a href="projects.php" class="text-xs font-black uppercase text-brand-teal border-b-2 border-brand-lime pb-1 hover:text-brand-lime transition-all">Investment Specs</a>
            </div>

            <!-- Service 3 -->
            <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-brand-lime rounded-full flex items-center justify-center text-3xl text-brand-teal mb-8"><i class="ph-bold ph-briefcase"></i></div>
                <h3 class="text-2xl font-bold text-brand-teal mb-4">Lifecycle Tracking</h3>
                <p class="text-sm opacity-70 leading-relaxed mb-8">Real-time status updates from under-construction to ready-to-move assets.</p>
                <a href="admin/index.php" class="text-xs font-black uppercase text-brand-teal border-b-2 border-brand-lime pb-1 hover:text-brand-lime transition-all">Track Construction</a>
            </div>

            <!-- Service 4 -->
            <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-brand-lime rounded-full flex items-center justify-center text-3xl text-brand-teal mb-8"><i class="ph-bold ph-users-three"></i></div>
                <h3 class="text-2xl font-bold text-brand-teal mb-4">Investor Consult</h3>
                <p class="text-sm opacity-70 leading-relaxed mb-8">Specialized guidance for high-net-worth real estate portfolio expansion.</p>
                <a href="contact.php" class="text-xs font-black uppercase text-brand-teal border-b-2 border-brand-lime pb-1 hover:text-brand-lime transition-all">Start Consultation</a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us? -->
    <section class="bg-brand-teal py-32 px-6">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-20 items-center">
            <div class="lg:w-1/2">
                <h2 class="text-5xl md:text-7xl font-heading font-black text-white mb-10 tracking-tighter leading-tight">Advanced Property Dashboard.</h2>
                <p class="text-xl text-white/50 mb-12 font-medium">Manage your entire property portfolio with our integrated data-driven dashboard. Real-time insights, lead tracking, and maintenance logs all in one place.</p>
                <a href="admin/index.php" class="btn btn-primary !py-5">Access Admin Portal</a>
            </div>
            <div class="lg:w-1/2 relative bg-white/5 p-12 rounded-[4rem] border border-white/10 shadow-3xl shadow-brand-lime/10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white/10 p-10 rounded-[3rem] hover:bg-white/20 duration-300 border border-white/5"><i class="ph-bold ph-chart-line-up text-4xl text-brand-lime mb-6 block"></i><h4 class="text-xl font-bold text-white mb-2">Yield Analysis</h4><p class="text-xs text-white/40 font-bold uppercase tracking-widest">Growth Tracking</p></div>
                    <div class="bg-white/10 p-10 rounded-[3rem] hover:bg-white/20 duration-300 border border-white/5"><i class="ph-bold ph-shield-check text-4xl text-brand-lime mb-6 block"></i><h4 class="text-xl font-bold text-white mb-2">Legal Compliance</h4><p class="text-xs text-white/40 font-bold uppercase tracking-widest">Risk Management</p></div>
                    <div class="bg-white/10 p-10 rounded-[3rem] hover:bg-white/20 duration-300 border border-white/5"><i class="ph-bold ph-lightning text-4xl text-brand-lime mb-6 block"></i><h4 class="text-xl font-bold text-white mb-2">Fast Approvals</h4><p class="text-xs text-white/40 font-bold uppercase tracking-widest">Rapid 48h Response</p></div>
                    <div class="bg-white/10 p-10 rounded-[3rem] hover:bg-white/20 duration-300 border border-white/5"><i class="ph-bold ph-globe text-4xl text-brand-lime mb-6 block"></i><h4 class="text-xl font-bold text-white mb-2">Global Access</h4><p class="text-xs text-white/40 font-bold uppercase tracking-widest">Remote Tracking</p></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Specific Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Hero Entrance
            gsap.from("header > *", {
                y: 60,
                opacity: 0,
                duration: 0.8,
                stagger: 0.05,
                ease: "power3.out"
            });
        });
    </script>

<?php include 'common/footer.php'; ?>
