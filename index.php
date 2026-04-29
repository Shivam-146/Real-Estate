<?php
require_once 'config/db.php';

// Handle Lead Submission
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_lead') {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $property_name = $_POST['property_name'] ?? '';
    $message_content = $_POST['message'] ?? '';
    
    try {
        $stmt = $pdo->prepare("INSERT INTO leads (full_name, email, property_name, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$full_name, $email, $property_name, $message_content]);
        $message = "Your enquiry has been submitted successfully!";
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}

// Fetch unique locations for search dropdown
try {
    $stmt = $pdo->query("SELECT DISTINCT location FROM properties ORDER BY location ASC");
    $locations = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    $locations = [];
}

// Fetch properties for dropdown
try {
    $stmt = $pdo->query("SELECT name FROM properties ORDER BY name ASC");
    $properties = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    $properties = [];
}

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
                Bishnupur's #1 Property Hub
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
                class="bg-brand-teal/40 backdrop-blur-3xl border border-white/10 p-8 lg:p-12 rounded-[2.5rem] grid grid-cols-1 md:grid-cols-2 gap-8 text-left max-w-4xl mx-auto shadow-2xl relative overflow-hidden group">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-brand-lime/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                </div>
                <div class="relative z-10">
                    <label class="search-label">Location</label>
                    <select class="search-input [&>option]:text-brand-teal">
                        <option value="">All Locations</option>
                        <?php foreach ($locations as $loc): ?>
                            <option value="<?php echo htmlspecialchars($loc); ?>"><?php echo htmlspecialchars($loc); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="search-label">Locality</label>
                    <input type="text" placeholder="Heights..." class="search-input">
                </div>
                <div class="md:col-span-2 mt-2">
                    <button type="button" onclick="window.location.href='projects.php'"
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
                <img src="image.png" alt="Luxury Property" class="rounded-2xl shadow-2xl w-full z-10 relative">
                <img src="img.png" alt="Interior Design"
                    class="absolute -bottom-10 -right-10 w-2/3 rounded-2xl border-[12px] border-[#f6f7f7] shadow-2xl z-20 hidden md:block">
            </div>
            <div>
                <span class="font-bold text-sm tracking-[0.3em] text-brand-teal/40 uppercase mb-6 block">Project
                    Objective</span>
                <h2
                    class="font-heading text-4xl md:text-7xl text-brand-teal font-black mb-10 leading-[0.95] tracking-tighter">
                    Professional <span
                        class="bg-clip-text text-transparent bg-gradient-to-r from-brand-teal to-brand-teal-light">Management</span>
                    in Bishnupur.
                </h2>
                <p class="text-lg leading-relaxed mb-10 text-brand-teal-light">
                    Welcome to Bishnupur's leading real estate network,Swastik Contruction. We specialize in property lifecycle tracking,
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
        <div class="max-w-7xl mx-auto mb-20 flex flex-col md:flex-row md:items-end justify-between gap-10">
            <div class="text-left">
                <span class="inline-block font-bold text-xs tracking-[0.4em] text-brand-teal/30 uppercase mb-6">Curated Selection</span>
                <h2 class="font-heading text-5xl md:text-8xl text-brand-teal font-black tracking-tighter leading-none italic">
                    Featured Residential.
                </h2>
            </div>
            <div class="mb-4">
                <a href="projects.php" class="btn btn-dark !py-4 !px-8 !rounded-xl">Show All Projects</a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto relative group/slider">
            <!-- Side Navigation Buttons -->
            <button id="prevProp" class="absolute -left-8 top-1/2 -translate-y-1/2 z-30 w-16 h-16 rounded-full border border-gray-100 flex items-center justify-center text-brand-teal bg-white shadow-2xl hover:bg-brand-teal hover:text-white transition-all active:scale-90 opacity-0 group-hover/slider:opacity-100 hidden md:flex">
                <i class="ph-bold ph-caret-left text-2xl"></i>
            </button>
            <button id="nextProp" class="absolute -right-8 top-1/2 -translate-y-1/2 z-30 w-16 h-16 rounded-full border border-gray-100 flex items-center justify-center text-brand-teal bg-white shadow-2xl hover:bg-brand-teal hover:text-white transition-all active:scale-90 opacity-0 group-hover/slider:opacity-100 hidden md:flex">
                <i class="ph-bold ph-caret-right text-2xl"></i>
            </button>

            <div id="propertySlider" class="flex gap-8 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-12 scrollbar-hide px-4 -mx-4">
            <?php
            try {
                $stmt = $pdo->query("SELECT * FROM properties WHERE status = 'Available' ORDER BY created_at DESC LIMIT 12");
                $featuredProps = $stmt->fetchAll();
            } catch (PDOException $e) {
                $featuredProps = [];
            }

            if (empty($featuredProps)):
            ?>
                <div class="col-span-3 text-center py-20">
                    <p class="text-brand-teal/30 font-bold italic text-lg">New luxury listings arriving soon...</p>
                </div>
            <?php else: ?>
                <?php foreach ($featuredProps as $prop): ?>
                <div class="min-w-[85%] md:min-w-[450px] lg:min-w-[400px] snap-start">
                    <div class="card group h-full flex flex-col">
                        <div class="relative h-72 overflow-hidden">
                            <span class="absolute top-5 left-5 z-10 bg-brand-lime text-brand-teal text-[10px] font-black uppercase px-4 py-1.5 rounded shadow-sm">
                                <?php echo htmlspecialchars($prop['category']); ?>
                            </span>
                            <img src="<?php echo htmlspecialchars($prop['image_url'] ? $prop['image_url'] : 'hero.png'); ?>" 
                                 alt="<?php echo htmlspecialchars($prop['name']); ?>"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <!-- Show Overview Button -->
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-brand-teal/40 backdrop-blur-[2px]">
                                <button onclick="openImageModal('<?php echo htmlspecialchars($prop['image_url'] ? $prop['image_url'] : 'hero.png'); ?>')" class="flex items-center gap-2 bg-white/20 hover:bg-white/30 backdrop-blur-md border border-white/30 text-white px-6 py-3 rounded-xl font-bold uppercase text-[10px] tracking-widest transition-all hover:scale-105 active:scale-95 shadow-2xl">
                                    <i class="ph-bold ph-eye text-lg"></i> Show Overview
                                </button>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h3 class="text-2xl font-heading font-black text-brand-teal mb-2"><?php echo htmlspecialchars($prop['name']); ?></h3>
                            <div class="flex items-center gap-2 text-brand-teal/40 font-bold text-xs mb-6">
                                <i class="ph-fill ph-map-pin text-brand-lime"></i> <?php echo htmlspecialchars($prop['location']); ?>
                            </div>
                            
                            <p class="text-sm font-medium text-brand-teal-light line-clamp-2 mb-8">
                                <?php echo htmlspecialchars($prop['description']); ?>
                            </p>
    
                            <div class="mt-auto pt-6 border-t border-gray-100">
                                <a href="property-detail.php?id=<?php echo $prop['id']; ?>" class="btn btn-dark w-full !py-4 !rounded-xl flex items-center justify-center gap-2 group-hover:bg-brand-teal/90 transition-all">
                                    <i class="ph ph-eye text-base"></i> View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
        </div>
        
        <!-- Mobile Show All Button -->
        <div class="mt-10 md:hidden text-center px-4">
            <a href="projects.php" class="btn btn-dark w-full !py-5 !rounded-2xl">Show All Projects</a>
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

        <div class="max-w-7xl mx-auto">
            <!-- Commercial Project: Swastik Industries -->
            <div
                class="group relative bg-white rounded-[3rem] overflow-hidden shadow-2xl flex flex-col lg:flex-row min-h-[500px]">
                <div class="lg:w-1/2 relative overflow-hidden">
                    <img src="img/commercial_hub.jpg" alt="Swastik Industries"
                        class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-brand-teal/10 group-hover:bg-transparent transition-all duration-700">
                    </div>
                </div>
                <div class="lg:w-1/2 p-12 lg:p-20 flex flex-col justify-center">
                    <span class="text-[11px] font-black text-brand-teal/40 uppercase mb-4 tracking-[5px]">Industrial & Plywood Hub</span>
                    <h3 class="text-4xl md:text-5xl font-heading font-black text-brand-teal mb-6 group-hover:text-brand-lime transition-colors leading-tight">
                        Swastik Industries</h3>
                    <p class="text-lg text-brand-teal-light mb-10 leading-relaxed opacity-80 font-medium">
                        A premium quality industrial facility specializing in plywood manufacturing and industrial space management. Strategically located to serve the growing needs of Bishnupur.
                    </p>
                    <div class="flex flex-wrap items-center gap-8 text-sm font-black border-t border-gray-100 pt-10 uppercase tracking-widest text-brand-teal/60">
                        <span class="flex items-center gap-3"><i class="ph-fill ph-factory text-2xl text-brand-lime"></i> Industrial Units</span>
                        <span class="flex items-center gap-3"><i class="ph-fill ph-tree text-2xl text-brand-lime"></i> Plywood Quality</span>
                    </div>
                </div>
                <div class="absolute top-10 right-10">
                    <a href="#contact"
                        class="bg-brand-teal text-brand-lime w-16 h-16 flex items-center justify-center rounded-2xl shadow-2xl cursor-pointer hover:rotate-45 transition-all duration-500">
                        <i class="ph-bold ph-arrow-up-right text-2xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Scope / Features Panel -->
    <section class="bg-brand-teal py-32 px-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('hero.png')] bg-center bg-cover"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="mb-20" data-aos="fade-up">
                <span class="font-bold text-sm tracking-widest text-brand-lime uppercase mb-4 block">Swastik Construction</span>
                <h2 class="font-heading text-4xl md:text-6xl text-white font-extrabold tracking-tighter leading-tight">
                    Complete Property<br>Management
                </h2>
            </div>

            <div id="features-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10" data-aos="fade-up">
                <a href="projects.php" class="group block cursor-pointer">
                    <i
                        class="ph ph-list-plus text-5xl text-brand-lime mb-6 block transition-transform group-hover:-translate-y-2"></i>
                    <h4 class="font-heading text-white text-xl font-bold mb-4 group-hover:text-brand-lime transition-colors">Visit Our Premium Property</h4>
                    <p class="text-white/70 text-sm leading-relaxed">Explore our exclusive portfolio of premium residential and commercial real estate tailored to your lifestyle.</p>
                </a>
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
                    <h4 class="font-heading text-white text-xl font-bold mb-4">Services</h4>
                    <p class="text-white/70 text-sm leading-relaxed">Real-time updates: Available, Sold, Rented, or
                        Under-Construction statuses.</p>
                </div>
                <div class="group">
                    <i
                        class="ph ph-whatsapp-logo text-5xl text-brand-lime mb-6 block transition-transform group-hover:-translate-y-2"></i>
                    <h4 class="font-heading text-white text-xl font-bold mb-4">Contact Us</h4>
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
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3670.5971420004544!2d87.31560669999999!3d23.0752266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f791529ebc9ee9%3A0x7a34b884f51dc615!2sHriddhi%20Tower!5e0!3m2!1sen!2sin!4v1777037844888!5m2!1sen!2sin"
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
                <?php if ($message): ?>
                    <div class="mt-8 p-4 bg-brand-teal text-brand-lime font-bold rounded-xl animate-in fade-in slide-in-from-bottom-4 duration-500">
                        <i class="ph-bold ph-check-circle mr-2"></i> <?php echo $message; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="bg-white p-10 lg:p-14 rounded-2xl shadow-3xl">
                <form action="index.php#contact" method="POST" class="space-y-6">
                    <input type="hidden" name="action" value="save_lead">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label
                                class="block text-[11px] font-black uppercase mb-3 text-brand-teal tracking-widest">Full
                                Name</label>
                            <input type="text" name="full_name" required placeholder="John Doe"
                                class="w-full p-4 border border-gray-200 rounded-md focus:border-brand-teal focus:ring-1 focus:ring-brand-teal outline-none transition-all">
                        </div>
                        <div>
                            <label
                                class="block text-[11px] font-black uppercase mb-3 text-brand-teal tracking-widest">Email
                                Address</label>
                            <input type="email" name="email" required placeholder="john@example.com"
                                class="w-full p-4 border border-gray-200 rounded-md focus:border-brand-teal focus:ring-1 focus:ring-brand-teal outline-none transition-all">
                        </div>
                    </div>
                    <div>
                        <label
                            class="block text-[11px] font-black uppercase mb-3 text-brand-teal tracking-widest">Interested
                            In</label>
                        <select name="property_name" required
                            class="w-full p-4 border border-gray-200 rounded-md focus:border-brand-teal outline-none appearance-none bg-[url('https://cdn0.iconfinder.com/data/icons/user-interface-2062/24/arrow_down-512.png')] bg-[length:12px] bg-[right_1rem_center] bg-no-repeat cursor-pointer">
                            <option value="">Select a Property</option>
                            <?php foreach ($properties as $propName): ?>
                                <option value="<?php echo htmlspecialchars($propName); ?>"><?php echo htmlspecialchars($propName); ?></option>
                            <?php endforeach; ?>
                            <option value="General Inquiry">General Inquiry</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-black uppercase mb-3 text-brand-teal tracking-widest">Your
                            Message</label>
                        <textarea name="message" rows="4" placeholder="Mention project name or locality preference..."
                            class="w-full p-4 border border-gray-200 rounded-md focus:border-brand-teal focus:ring-1 focus:ring-brand-teal outline-none transition-all resize-none"></textarea>
                    </div>
                    <button type="submit"
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
            // Property Slider Logic
            const slider = document.getElementById('propertySlider');
            const prevBtn = document.getElementById('prevProp');
            const nextBtn = document.getElementById('nextProp');

            if (slider && prevBtn && nextBtn) {
                nextBtn.addEventListener('click', () => {
                    slider.scrollBy({ left: slider.offsetWidth, behavior: 'smooth' });
                });

                prevBtn.addEventListener('click', () => {
                    slider.scrollBy({ left: -slider.offsetWidth, behavior: 'smooth' });
                });

                // Update button states (optional enhancement)
                slider.addEventListener('scroll', () => {
                    const isAtStart = slider.scrollLeft === 0;
                    const isAtEnd = slider.scrollLeft + slider.offsetWidth >= slider.scrollWidth - 5;
                    
                    prevBtn.style.opacity = isAtStart ? '0.5' : '1';
                    prevBtn.style.pointerEvents = isAtStart ? 'none' : 'auto';
                    
                    nextBtn.style.opacity = isAtEnd ? '0.5' : '1';
                    nextBtn.style.pointerEvents = isAtEnd ? 'none' : 'auto';
                });
                
                // Initial check
                prevBtn.style.opacity = '0.5';
                prevBtn.style.pointerEvents = 'none';
            }
        });
    </script>

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

<?php include 'common/footer.php'; ?>