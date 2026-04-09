<?php
$pageTitle = "Real Estate | Premium Real Estate Portal";
$pageDescription = "Discover premium real estate listings in Mumbai. Luxury villas, smart apartments, and commercial projects with full lifecycle management.";
include 'common/header.php';
?>

    <!-- Hero Section -->
    <section id="home"
        class="relative min-h-screen flex items-center justify-center text-center px-6 pt-32 pb-24 overflow-hidden">
        <!-- Background Overlay -->
        <div class="absolute inset-0 bg-brand-teal/70 z-[1]"></div>
        <div class="absolute inset-0 z-0">
            <img src="hero.png" alt="Luxury Real Estate" class="w-full h-full object-cover">
        </div>

        <div class="hero-content relative z-10 max-w-6xl mx-auto w-full">
            <span
                class="inline-block bg-white/10 backdrop-blur-md border border-white/20 text-white px-5 py-2 rounded-full text-xs font-bold tracking-[2px] uppercase mb-8">
                Mumbai's #1 Property Hub
            </span>
            <h1
                class="font-heading text-5xl md:text-7xl lg:text-9xl font-black leading-[1] mb-10 tracking-tighter text-white">
                <span class="bg-clip-text text-transparent bg-gradient-to-b from-white via-white to-white/50">Modern
                    Spaces.</span><br>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-brand-lime to-white">Simplified
                    Search.</span>
            </h1>
            <p
                class="text-white/80 text-xl md:text-2xl max-w-3xl mx-auto mb-16 font-medium leading-relaxed tracking-tight">
                From luxury downtown villas to smart apartments, discover premium listings through our high-performing
                property search platform.
            </p>

            <!-- Search Module -->
            <form action="property-detail.php"
                class="bg-brand-teal/40 backdrop-blur-3xl border border-white/10 p-8 lg:p-12 rounded-[2.5rem] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-left max-w-6xl mx-auto shadow-2xl relative overflow-hidden group">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-brand-lime/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                </div>
                <div class="relative z-10">
                    <label class="search-label">Location</label>
                    <select class="search-input [&>option]:text-brand-teal">
                        <option>Mumbai - South Metro</option>
                        <option>Mumbai - Navi West</option>
                        <option>Mumbai - BKC Hub</option>
                        <option>Pune - Tech Park</option>
                    </select>
                </div>
                <div>
                    <label class="search-label">Locality</label>
                    <input type="text" placeholder="Heights..." class="search-input">
                </div>
                <div>
                    <label class="search-label">Budget</label>
                    <select class="search-input [&>option]:text-brand-teal">
                        <option>₹300k - ₹600k</option>
                        <option>₹600k - ₹1M</option>
                        <option>₹1M+</option>
                    </select>
                </div>
                <div>
                    <label class="search-label">BHK Filter</label>
                    <select class="search-input [&>option]:text-brand-teal">
                        <option>2 BHK</option>
                        <option>3 BHK</option>
                        <option>4 BHK+</option>
                    </select>
                </div>
                <div class="lg:col-span-4 mt-2">
                    <button type="button" onclick="window.location.href='property-detail.php'"
                        class="btn btn-primary w-full shadow-lg shadow-brand-lime/20">
                        <i class="ph-bold ph-magnifying-glass mr-3"></i> Find Matching Properties
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Features -->
    <section class="relative z-20 -mt-16 px-6">
        <div
            class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 bg-white rounded-xl shadow-xl overflow-hidden divide-x divide-gray-100">
            <div class="p-10 text-center flex flex-col items-center">
                <i class="ph ph-house text-4xl text-brand-teal mb-4"></i>
                <h3 class="font-heading font-bold text-xl text-brand-teal mb-2">Residential</h3>
                <p class="text-sm">Custom-built family homes.</p>
            </div>
            <div class="p-10 text-center flex flex-col items-center">
                <i class="ph ph-buildings text-4xl text-brand-teal mb-4"></i>
                <h3 class="font-heading font-bold text-xl text-brand-teal mb-2">Commercial</h3>
                <p class="text-sm">Smart office & retail projects.</p>
            </div>
            <div class="p-10 text-center flex flex-col items-center">
                <i class="ph ph-swimming-pool text-4xl text-brand-teal mb-4"></i>
                <h3 class="font-heading font-bold text-xl text-brand-teal mb-2">Amenities</h3>
                <p class="text-sm">Clubhouse, Gym & Pool.</p>
            </div>
            <div class="p-10 text-center flex flex-col items-center">
                <i class="ph ph-shield-check text-4xl text-brand-teal mb-4"></i>
                <h3 class="font-heading font-bold text-xl text-brand-teal mb-2">Security</h3>
                <p class="text-sm">Video Surveillance systems.</p>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-32 px-6 bg-[#f6f7f7]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div class="relative">
                <img src="about1.png" alt="Luxury Property" class="rounded-2xl shadow-2xl w-full z-10 relative">
                <img src="service2.png" alt="Interior Design"
                    class="absolute -bottom-10 -right-10 w-2/3 rounded-2xl border-[12px] border-[#f6f7f7] shadow-2xl z-20 hidden md:block">
            </div>
            <div>
                <span class="font-bold text-sm tracking-[0.3em] text-brand-teal/40 uppercase mb-6 block">Project
                    Objective</span>
                <h2
                    class="font-heading text-4xl md:text-7xl text-brand-teal font-black mb-10 leading-[0.95] tracking-tighter">
                    Professional <span
                        class="bg-clip-text text-transparent bg-gradient-to-r from-brand-teal to-brand-teal-light">Management</span>
                    in Mumbai.
                </h2>
                <p class="text-lg leading-relaxed mb-10 text-brand-teal-light">
                    Welcome to Mumbai's leading real estate network. We specialize in property lifecycle tracking,
                    detailed specifications, and seamless browsing across devices. Our objective is to generate
                    high-quality leads for investors and buyers alike.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex items-center gap-3 font-bold text-brand-teal">
                        <i class="ph-fill ph-check-circle text-brand-lime text-xl"></i> 150+ Projects Complete
                    </div>
                    <div class="flex items-center gap-3 font-bold text-brand-teal">
                        <i class="ph-fill ph-check-circle text-brand-lime text-xl"></i> ISO Certified Company
                    </div>
                    <div class="flex items-center gap-3 font-bold text-brand-teal">
                        <i class="ph-fill ph-check-circle text-brand-lime text-xl"></i> Experienced Tech Team
                    </div>
                    <div class="flex items-center gap-3 font-bold text-brand-teal">
                        <i class="ph-fill ph-check-circle text-brand-lime text-xl"></i> Premium Support 24/7
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Property -->
    <section id="property" class="py-32 px-6">
        <div class="max-w-7xl mx-auto mb-28 text-center">
            <span class="inline-block font-bold text-xs tracking-[0.4em] text-brand-teal/30 uppercase mb-6">Curated
                Selection</span>
            <h2
                class="font-heading text-5xl md:text-8xl text-brand-teal font-black tracking-tighter leading-none italic">
                Featured Residential.
            </h2>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Property 1 -->
            <div class="card">
                <div class="relative h-64 overflow-hidden">
                    <span
                        class="absolute top-5 left-5 z-10 bg-brand-lime text-brand-teal text-[10px] font-black uppercase px-4 py-1.5 rounded shadow-sm">Available</span>
                    <img src="about1.png" alt="Skyline Villa"
                        class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                </div>
                <div class="p-8 flex flex-col flex-grow">
                    <div class="text-3xl font-heading font-extrabold text-brand-teal mb-2">₹12.5 Cr</div>
                    <h3 class="text-xl font-bold text-brand-teal mb-1">Skyline Luxury Villa</h3>
                    <p class="text-xs font-bold text-brand-lime bg-brand-teal px-2 py-0.5 inline-block w-fit mb-4">Vastu
                        Compliant</p>
                    <div class="flex justify-between py-5 border-t border-gray-200 mt-auto text-sm font-semibold">
                        <span class="flex items-center gap-2"><i class="ph ph-bed text-lg"></i> 4 Bed</span>
                        <span class="flex items-center gap-2"><i class="ph ph-bathtub text-lg"></i> 3 Bath</span>
                        <span class="flex items-center gap-2"><i class="ph ph-arrows-out text-lg"></i> 3.2k sqft</span>
                    </div>

                    <div class="grid grid-cols-1 gap-2 mt-6">
                        <a href="property-detail.php" class="btn btn-dark btn-card"><i
                                class="ph ph-eye text-base mr-2"></i> View Details</a>
                        <div class="grid grid-cols-2 gap-2">
                            <a href="#" class="btn btn-primary btn-card"><i class="ph ph-file-pdf text-base mr-2"></i>
                                Floor Plan</a>
                            <a href="#" class="btn btn-primary btn-card"><i class="ph ph-download text-base mr-2"></i>
                                Brochure</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Property 2 -->
            <div class="card">
                <div class="relative h-64 overflow-hidden">
                    <span
                        class="absolute top-5 left-5 z-10 bg-sky-500 text-white text-[10px] font-black uppercase px-4 py-1.5 rounded shadow-sm">Under
                        Construction</span>
                    <img src="service2.png" alt="Quantum Suite"
                        class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                </div>
                <div class="p-8 flex flex-col flex-grow">
                    <div class="text-3xl font-heading font-extrabold text-brand-teal mb-2">₹2.8 Cr</div>
                    <h3 class="text-xl font-bold text-brand-teal mb-1">Quantum Innovation Suite</h3>
                    <p class="text-xs font-bold text-brand-lime bg-brand-teal px-2 py-0.5 inline-block w-fit mb-4">East
                        Facing</p>
                    <div class="flex justify-between py-5 border-t border-gray-200 mt-auto text-sm font-semibold">
                        <span class="flex items-center gap-2"><i class="ph ph-bed text-lg"></i> 2 Bed</span>
                        <span class="flex items-center gap-2"><i class="ph ph-bathtub text-lg"></i> 2 Bath</span>
                        <span class="flex items-center gap-2"><i class="ph ph-selection-all text-lg"></i> Smart
                            Tech</span>
                    </div>

                    <div class="grid grid-cols-1 gap-2 mt-6">
                        <a href="property-detail.php" class="btn btn-dark btn-card"><i
                                class="ph ph-eye text-base mr-2"></i> View Details</a>
                        <div class="grid grid-cols-2 gap-2">
                            <a href="#" class="btn btn-primary btn-card"><i class="ph ph-file-pdf text-base mr-2"></i>
                                Floor Plan</a>
                            <a href="#" class="btn btn-primary btn-card"><i class="ph ph-download text-base mr-2"></i>
                                Brochure</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Property 3 -->
            <div class="card">
                <div class="relative h-64 overflow-hidden">
                    <span
                        class="absolute top-5 left-5 z-10 bg-red-500 text-white text-[10px] font-black uppercase px-4 py-1.5 rounded shadow-sm">Sold
                        Out</span>
                    <img src="service3.png" alt="Urban Loft"
                        class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                </div>
                <div class="p-8 flex flex-col flex-grow">
                    <div class="text-3xl font-heading font-extrabold text-brand-teal mb-2">₹85 Lakhs</div>
                    <h3 class="text-xl font-bold text-brand-teal mb-1">Urban Industrial Project</h3>
                    <p class="text-xs font-bold text-brand-lime bg-brand-teal px-2 py-0.5 inline-block w-fit mb-4">Near
                        Metro Station</p>
                    <div class="flex justify-between py-5 border-t border-gray-200 mt-auto text-sm font-semibold">
                        <span class="flex items-center gap-2"><i class="ph ph-bed text-lg"></i> 3 Bed</span>
                        <span class="flex items-center gap-2"><i class="ph ph-car text-lg"></i> 2 Park</span>
                        <span class="flex items-center gap-2"><i class="ph ph-hospital text-lg"></i> Near Links</span>
                    </div>

                    <div class="grid grid-cols-1 gap-2 mt-6">
                        <a href="property-detail.php" class="btn btn-dark btn-card"><i
                                class="ph ph-eye text-base mr-2"></i> View Details</a>
                        <div class="grid grid-cols-2 gap-2">
                            <a href="#" class="btn btn-primary btn-card"><i class="ph ph-file-pdf text-base mr-2"></i>
                                Floor Plan</a>
                            <a href="#" class="btn btn-primary btn-card"><i class="ph ph-download text-base mr-2"></i>
                                Brochure</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Section: Featured Commercial Projects -->
    <section id="commercial" class="py-32 px-6 bg-brand-teal/5">
        <div class="max-w-7xl mx-auto mb-20">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-10">
                <div class="max-w-2xl">
                    <span class="font-bold text-sm tracking-widest text-brand-teal uppercase mb-4 block">Commercial
                        Hub</span>
                    <h2
                        class="font-heading text-4xl md:text-6xl text-brand-teal font-extrabold tracking-tighter leading-tight">
                        Premium Commercial<br>Investment Projects
                    </h2>
                </div>
                <div class="mb-2">
                    <p class="text-lg text-brand-teal-light mb-6 opacity-80">Highly optimized retail and office spaces
                        for maximum ROI.</p>
                    <a href="#contact" class="btn btn-dark">Enquire for Project Payouts</a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Commercial Project 1 -->
            <div
                class="group relative bg-white rounded-2xl overflow-hidden shadow-xl flex flex-col sm:flex-row min-h-[350px]">
                <div class="sm:w-2/5 relative overflow-hidden">
                    <img src="service2.png" alt="Retail Mall"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-brand-teal/20 group-hover:bg-transparent transition-all duration-500">
                    </div>
                </div>
                <div class="sm:w-3/5 p-10 flex flex-col justify-center">
                    <span class="text-[10px] font-black text-brand-teal/40 uppercase mb-3 tracking-[3px]">New
                        Venture</span>
                    <h3 class="text-2xl font-bold text-brand-teal mb-4 group-hover:text-brand-lime transition-colors">
                        Astra Modern Retail Plaza</h3>
                    <p class="text-sm text-brand-teal-light mb-8">Located in Mumbai's fastest growing retail corridor.
                        Features smart parking and multi-level shopping zones.</p>
                    <div class="flex items-center gap-6 text-sm font-bold border-t border-gray-100 pt-6">
                        <span class="flex items-center gap-2"><i class="ph ph-office-chair text-lg"></i> 120
                            Units</span>
                        <span class="flex items-center gap-2"><i class="ph ph-map-pin text-lg"></i> 5.6 Acre</span>
                    </div>
                </div>
                <div class="absolute top-6 right-6">
                    <div
                        class="bg-brand-lime text-brand-teal w-12 h-12 flex items-center justify-center rounded-full shadow-lg cursor-pointer hover:rotate-45 transition-all">
                        <i class="ph-bold ph-arrow-up-right text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Commercial Project 2 -->
            <div
                class="group relative bg-white rounded-2xl overflow-hidden shadow-xl flex flex-col sm:flex-row min-h-[350px]">
                <div class="sm:w-2/5 relative overflow-hidden">
                    <img src="service3.png" alt="Office Hub"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-brand-teal/20 group-hover:bg-transparent transition-all duration-500">
                    </div>
                </div>
                <div class="sm:w-3/5 p-10 flex flex-col justify-center">
                    <span class="text-[10px] font-black text-brand-teal/40 uppercase mb-3 tracking-[3px]">Tech
                        District</span>
                    <h3 class="text-2xl font-bold text-brand-teal mb-4 group-hover:text-brand-lime transition-colors">
                        Nexus Corporate Hub</h3>
                    <p class="text-sm text-brand-teal-light mb-8">Grade-A office spaces designed for global tech giants.
                        Integrated with green energy and high-speed labs.</p>
                    <div class="flex items-center gap-6 text-sm font-bold border-t border-gray-100 pt-6">
                        <span class="flex items-center gap-2"><i class="ph ph-airplane-landing text-lg"></i>
                            Helipad</span>
                        <span class="flex items-center gap-2"><i class="ph ph-lightning text-lg"></i> Net Zero</span>
                    </div>
                </div>
                <div class="absolute top-6 right-6">
                    <div
                        class="bg-brand-lime text-brand-teal w-12 h-12 flex items-center justify-center rounded-full shadow-lg cursor-pointer hover:rotate-45 transition-all">
                        <i class="ph-bold ph-arrow-up-right text-xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scope / Features Panel -->
    <section class="bg-brand-teal py-32 px-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('hero.png')] bg-center bg-cover"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="mb-20" data-aos="fade-up">
                <span class="font-bold text-sm tracking-widest text-brand-lime uppercase mb-4 block">Management
                    Features</span>
                <h2 class="font-heading text-4xl md:text-6xl text-white font-extrabold tracking-tighter leading-tight">
                    Complete Property Lifecycle<br>Tracking & Management
                </h2>
            </div>

            <div id="features-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10" data-aos="fade-up">
                <div class="group">
                    <i
                        class="ph ph-list-plus text-5xl text-brand-lime mb-6 block transition-transform group-hover:-translate-y-2"></i>
                    <h4 class="font-heading text-white text-xl font-bold mb-4">Smart Lists</h4>
                    <p class="text-white/70 text-sm leading-relaxed">Add, edit, delete properties with ease via
                        dedicated admin control panel.</p>
                </div>
                <div class="group">
                    <i
                        class="ph ph-map-pin text-5xl text-brand-lime mb-6 block transition-transform group-hover:-translate-y-2"></i>
                    <h4 class="font-heading text-white text-xl font-bold mb-4">Landmarks</h4>
                    <p class="text-white/70 text-sm leading-relaxed">Details on nearby schools, hospitals, and
                        transportation hubs for every project.</p>
                </div>
                <div class="group">
                    <i
                        class="ph ph-chart-line text-5xl text-brand-lime mb-6 block transition-transform group-hover:-translate-y-2"></i>
                    <h4 class="font-heading text-white text-xl font-bold mb-4">Status Tracking</h4>
                    <p class="text-white/70 text-sm leading-relaxed">Real-time updates: Available, Sold, Rented, or
                        Under-Construction statuses.</p>
                </div>
                <div class="group">
                    <i
                        class="ph ph-whatsapp-logo text-5xl text-brand-lime mb-6 block transition-transform group-hover:-translate-y-2"></i>
                    <h4 class="font-heading text-white text-xl font-bold mb-4">Lead System</h4>
                    <p class="text-white/70 text-sm leading-relaxed">WhatsApp & Email notification integration for all
                        property inquiries and leads.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="max-w-7xl mx-auto px-6 h-[500px] mb-32">
        <div
            class="w-full h-full rounded-[3rem] overflow-hidden shadow-2xl border border-gray-100 grayscale hover:grayscale-0 transition-all duration-700">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3773.9116670878566!2d72.8228308!3d18.9388373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7d1e0f089606d%3A0x6b490f2382e2107!2sNariman%20Point%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1711929456789!5m2!1sen!2sin"
                class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <!-- Lead Form Section -->
    <section id="contact" class="bg-brand-lime py-32 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div>
                <h2
                    class="font-heading text-5xl md:text-7xl text-brand-teal font-extrabold tracking-tighter leading-none mb-8">
                    Generate New<br>Property Leads.
                </h2>
                <p class="text-xl text-brand-teal font-semibold opacity-80 leading-relaxed mb-6">
                    Fill out the inquiry form to download project brochures, view floor plans, and receive expert
                    call-backs within 15 minutes.
                </p>
                <div class="flex items-center gap-4 text-brand-teal/60 font-bold">
                    <i class="ph ph-shield-check text-2xl"></i> ISO Certified Management
                </div>
            </div>

            <div class="bg-white p-10 lg:p-14 rounded-2xl shadow-3xl">
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label
                                class="block text-[11px] font-black uppercase mb-3 text-brand-teal tracking-widest">Full
                                Name</label>
                            <input type="text" placeholder="John Doe"
                                class="w-full p-4 border border-gray-200 rounded-md focus:border-brand-teal focus:ring-1 focus:ring-brand-teal outline-none transition-all">
                        </div>
                        <div>
                            <label
                                class="block text-[11px] font-black uppercase mb-3 text-brand-teal tracking-widest">Email
                                Address</label>
                            <input type="email" placeholder="john@example.com"
                                class="w-full p-4 border border-gray-200 rounded-md focus:border-brand-teal focus:ring-1 focus:ring-brand-teal outline-none transition-all">
                        </div>
                    </div>
                    <div>
                        <label
                            class="block text-[11px] font-black uppercase mb-3 text-brand-teal tracking-widest">Interested
                            In</label>
                        <select
                            class="w-full p-4 border border-gray-200 rounded-md focus:border-brand-teal outline-none appearance-none bg-[url('https://cdn0.iconfinder.com/data/icons/user-interface-2062/24/arrow_down-512.png')] bg-[length:12px] bg-[right_1rem_center] bg-no-repeat cursor-pointer">
                            <option>Requesting Floor Plan</option>
                            <option>Property Site Visit</option>
                            <option>Project Brochure Download</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-black uppercase mb-3 text-brand-teal tracking-widest">Your
                            Message</label>
                        <textarea rows="4" placeholder="Mention project name or locality preference..."
                            class="w-full p-4 border border-gray-200 rounded-md focus:border-brand-teal focus:ring-1 focus:ring-brand-teal outline-none transition-all resize-none"></textarea>
                    </div>
                    <button
                        class="btn bg-brand-teal text-white w-full py-6 rounded shadow-xl hover:bg-brand-teal-dark active:scale-95 transition-all">Submit
                        Enquiry Now</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Page Specific Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Hero Entrance - Snappier
            gsap.from(".hero-content > *", {
                y: 60,
                opacity: 0,
                duration: 0.8,
                stagger: 0.1,
                ease: "power3.out"
            });

            // Featured Residential Section Timeline
            const propertyTL = gsap.timeline({
                scrollTrigger: {
                    trigger: "#property",
                    start: "top 90%",
                    toggleActions: "play none none none"
                }
            });

            propertyTL.from("#property .text-center > *", {
                y: 30,
                opacity: 0,
                duration: 0.5,
                stagger: 0.1,
                ease: "power2.out"
            })
                .from("#property .card", {
                    y: 40,
                    opacity: 0,
                    duration: 0.6,
                    stagger: 0.08,
                    ease: "power3.out",
                    clearProps: "all"
                }, "-=0.2");

            // Feature Icons Float
            gsap.to(".ph-list-plus, .ph-map-pin, .ph-chart-line, .ph-whatsapp-logo", {
                y: -10,
                duration: 3,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut"
            });

            // Ensure consistent positioning
            window.addEventListener('load', () => {
                ScrollTrigger.refresh();
                if (typeof AOS !== 'undefined') AOS.refresh();
            });

            // Fallback refresh for slow images
            setTimeout(() => {
                ScrollTrigger.refresh();
            }, 1000);
        });
    </script>

<?php include 'common/footer.php'; ?>