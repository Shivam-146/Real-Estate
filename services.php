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

    <!-- Content: Special Services Grid -->
    <section class="py-32 px-6 bg-slate-50">
        <div class="max-w-7xl mx-auto mb-16 text-center" data-aos="fade-up">
            <h2 class="text-3xl md:text-5xl font-heading font-black text-slate-800 tracking-tighter uppercase">
                Some Special <span class="font-light">Services</span>
            </h2>
        </div>
        
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8">
            <!-- Card 1 -->
            <div class="bg-white border border-gray-100 overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300 group flex flex-col" data-aos="fade-up">
                <div class="relative h-64 overflow-hidden bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Search Properties" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 w-12 h-12 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-lg p-2">
                        <img src="img/logo.png" alt="Logo" class="w-full h-auto scale-[1.5]">
                    </div>
                    <div class="absolute bottom-4 left-4 bg-black text-white text-[10px] font-bold px-4 py-1.5 rounded-full border border-yellow-500/50 shadow-lg tracking-wider">
                        Search Properties
                    </div>
                </div>
                <div class="p-8 flex items-end justify-between flex-grow">
                    <div>
                        <a href="projects.php" class="text-xl font-bold text-slate-800 leading-tight underline decoration-2 underline-offset-4 hover:text-brand-lime transition-colors inline-block">
                            Search<br>Properties
                        </a>
                    </div>
                    <div class="text-5xl font-heading text-red-600 font-light leading-none">
                        01
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white border border-gray-100 overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300 group flex flex-col" data-aos="fade-up" data-aos-delay="100">
                <div class="relative h-64 overflow-hidden bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1582407947304-fd86f028f716?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Industrial Spaces" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 w-12 h-12 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-lg p-2">
                        <img src="img/logo.png" alt="Logo" class="w-full h-auto scale-[1.5]">
                    </div>
                    <div class="absolute bottom-4 left-4 bg-black text-white text-[10px] font-bold px-4 py-1.5 rounded-full border border-yellow-500/50 shadow-lg tracking-wider">
                        Industrial Spaces
                    </div>
                </div>
                <div class="p-8 flex items-end justify-between flex-grow">
                    <div>
                        <a href="contact.php" class="text-xl font-bold text-slate-800 leading-tight underline decoration-2 underline-offset-4 hover:text-brand-lime transition-colors inline-block">
                            Industrial<br>Spaces
                        </a>
                    </div>
                    <div class="text-5xl font-heading text-red-600 font-light leading-none">
                        02
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white border border-gray-100 overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300 group flex flex-col" data-aos="fade-up" data-aos-delay="200">
                <div class="relative h-64 overflow-hidden bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1524813686514-a57563d77965?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Location Search" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 w-12 h-12 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-lg p-2">
                        <img src="img/logo.png" alt="Logo" class="w-full h-auto scale-[1.5]">
                    </div>
                    <div class="absolute bottom-4 left-4 bg-black text-white text-[10px] font-bold px-4 py-1.5 rounded-full border border-yellow-500/50 shadow-lg tracking-wider">
                        Location Search
                    </div>
                </div>
                <div class="p-8 flex items-end justify-between flex-grow">
                    <div>
                        <span class="text-xl font-bold text-slate-800 leading-tight inline-block">
                            Location<br>Search
                        </span>
                    </div>
                    <div class="text-5xl font-heading text-red-600 font-light leading-none">
                        03
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white border border-gray-100 overflow-hidden shadow-xl hover:shadow-2xl transition-shadow duration-300 group flex flex-col" data-aos="fade-up" data-aos-delay="300">
                <div class="relative h-64 overflow-hidden bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Search for Rent" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 right-4 w-12 h-12 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-lg p-2">
                        <img src="img/logo.png" alt="Logo" class="w-full h-auto scale-[1.5]">
                    </div>
                    <div class="absolute bottom-4 left-4 bg-black text-white text-[10px] font-bold px-4 py-1.5 rounded-full border border-yellow-500/50 shadow-lg tracking-wider">
                        Search for Rent
                    </div>
                </div>
                <div class="p-8 flex items-end justify-between flex-grow">
                    <div>
                        <span class="text-xl font-bold text-slate-800 leading-tight inline-block">
                            Search for<br>Rent
                        </span>
                    </div>
                    <div class="text-5xl font-heading text-red-600 font-light leading-none">
                        04
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Our Process -->
    <section class="bg-brand-teal py-32 px-6">
        <div class="max-w-7xl mx-auto flex flex-col xl:flex-row gap-20 items-center">
            <div class="xl:w-1/3">
                <h2 class="text-5xl md:text-7xl font-heading font-black text-white mb-10 tracking-tighter leading-tight">Our Simple Process.</h2>
                <p class="text-xl text-white/50 mb-12 font-medium">Finding your perfect premium property or industrial space is easy with Swastik Construction. Follow these three simple steps.</p>
                <a href="projects.php" class="btn btn-primary !py-5">Start Your Search</a>
            </div>
            <div class="xl:w-2/3 relative">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Step 1 -->
                    <div class="bg-white/5 p-10 rounded-[3rem] border border-white/10 hover:bg-white/10 duration-300 relative group">
                        <div class="absolute -top-6 -left-6 w-12 h-12 bg-brand-lime text-brand-teal rounded-full flex items-center justify-center font-black text-xl shadow-lg">1</div>
                        <i class="ph-bold ph-map-pin text-4xl text-brand-lime mb-6 block group-hover:scale-110 transition-transform"></i>
                        <h4 class="text-xl font-bold text-white mb-4">Search Location</h4>
                        <p class="text-sm text-white/60 leading-relaxed">Browse our prime locations across Bishnupur and find the perfect spot for your next home or business.</p>
                    </div>
                    <!-- Step 2 -->
                    <div class="bg-white/5 p-10 rounded-[3rem] border border-white/10 hover:bg-white/10 duration-300 relative group mt-0 md:mt-12">
                        <div class="absolute -top-6 -left-6 w-12 h-12 bg-brand-lime text-brand-teal rounded-full flex items-center justify-center font-black text-xl shadow-lg">2</div>
                        <i class="ph-bold ph-buildings text-4xl text-brand-lime mb-6 block group-hover:scale-110 transition-transform"></i>
                        <h4 class="text-xl font-bold text-white mb-4">See Projects</h4>
                        <p class="text-sm text-white/60 leading-relaxed">Explore our completed and recent premium projects, featuring high-quality construction.</p>
                    </div>
                    <!-- Step 3 -->
                    <div class="bg-white/5 p-10 rounded-[3rem] border border-white/10 hover:bg-white/10 duration-300 relative group mt-0 md:mt-24">
                        <div class="absolute -top-6 -left-6 w-12 h-12 bg-brand-lime text-brand-teal rounded-full flex items-center justify-center font-black text-xl shadow-lg">3</div>
                        <i class="ph-bold ph-paper-plane-tilt text-4xl text-brand-lime mb-6 block group-hover:scale-110 transition-transform"></i>
                        <h4 class="text-xl font-bold text-white mb-4">Send Enquiries</h4>
                        <p class="text-sm text-white/60 leading-relaxed">Contact us directly with your requirements and our team will get back to you shortly.</p>
                    </div>
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
