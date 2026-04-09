<?php
$pageTitle = "Our Projects | Real Estate Portfolio";
$pageDescription = "Explore our portfolio of Completed and Upcoming real estate projects. Professional construction and management services in Mumbai.";
include 'common/header.php';
?>

    <!-- Page Header (Construction Demo Style) -->
    <header class="relative pt-64 pb-80 bg-brand-teal text-white px-6 hero-curve mb-20 overflow-hidden">
        <div class="max-w-7xl mx-auto text-center relative z-10">
            <div
                class="inline-flex items-center gap-4 text-[10px] font-black uppercase tracking-[5px] text-brand-lime mb-6">
                <span class="w-10 h-[1px] bg-brand-lime"></span> Portfolio Showcase <span
                    class="w-10 h-[1px] bg-brand-lime"></span>
            </div>
            <h1
                class="font-heading text-6xl md:text-9xl font-black tracking-tighter leading-none mb-10 overflow-hidden">
                <span class="bg-clip-text text-transparent bg-gradient-to-b from-white via-white to-white/40 block"
                    data-aos="fade-up">Portfolio.</span>
            </h1>
        </div>
        <div class="absolute inset-0 bg-[url('hero.png')] opacity-10 bg-center bg-cover"></div>
    </header>

    <!-- Project Count & Filter Tab Section -->
    <section class="max-w-7xl mx-auto px-6 -mt-32 relative z-20 mb-24">
        <div class="flex flex-col lg:flex-row lg:items-center justify-center gap-8">
            <div class="flex flex-wrap items-center justify-center gap-4">
                <div data-filter="all" class="filter-tab active">All (4)</div>
                <div data-filter="completed" class="filter-tab">Completed Projects (2)</div>
                <div data-filter="upcoming" class="filter-tab">Upcoming Projects (2)</div>
            </div>
        </div>
    </section>

    <!-- Construction Project Grid (2-Column Large Cards) -->
    <section class="pb-32 px-6">
        <div id="project-container" class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16">

            <!-- ProjectCard: Modern Home -->
            <div class="project-card" data-category="completed" data-aos="fade-up">
                <div class="card-img-container">
                    <img src="about1.png" alt="Modern Home"
                        class="w-full h-full object-cover transition-transform duration-1000 hover:scale-110">
                </div>
                <div class="px-12 py-16 -mt-20 relative z-10 flex flex-col flex-grow">
                    <h2 class="text-5xl font-heading font-black text-brand-teal mb-8 tracking-tighter leading-tight">
                        Modern Home.</h2>
                    <p
                        class="text-[17px] text-brand-teal-light mb-12 opacity-80 leading-[1.8] font-medium tracking-tight">
                        Focusing on structural integrity and spacious design. This completed residential project
                        features premium sustainable glass and high-grade materials.
                    </p>
                    <div class="mb-12">
                        <h4 class="text-[11px] font-black uppercase text-brand-teal/30 tracking-[4px] mb-6">Highlights
                        </h4>
                        <ul class="space-y-4">
                            <li class="highlight-item"><i class="ph-fill ph-check-circle"></i> Sustainable Glass Facade
                            </li>
                            <li class="highlight-item"><i class="ph-fill ph-check-circle"></i> Open Floor Smart Living
                            </li>
                            <li class="highlight-item"><i class="ph-fill ph-check-circle"></i> Premium Landscape Design
                            </li>
                        </ul>
                    </div>
                    <div class="mt-auto pt-10 border-t border-gray-200/60 flex items-center justify-between">
                        <span class="text-xs font-black uppercase tracking-widest text-brand-teal opacity-40">Type:
                            Residential</span>
                        <a href="#" class="text-brand-teal hover:text-brand-lime transition-all"><i
                                class="ph-bold ph-arrow-up-right text-2xl"></i></a>
                    </div>
                </div>
            </div>

            <!-- ProjectCard: Vista Heights -->
            <div class="project-card" data-category="upcoming" data-aos="fade-up" data-aos-delay="200">
                <div class="card-img-container">
                    <img src="service2.png" alt="Vista Heights"
                        class="w-full h-full object-cover transition-transform duration-1000 hover:scale-110">
                </div>
                <div class="px-12 py-16 -mt-20 relative z-10 flex flex-col flex-grow">
                    <h2 class="text-5xl font-heading font-extrabold text-brand-teal mb-8">Vista Heights</h2>
                    <p class="text-[17px] text-brand-teal-light mb-12 opacity-80 leading-[1.8] font-medium">
                        Redefining the skyline with commercial excellence. This upcoming landmark features Net Zero
                        energy architecture and sky-garden hubs.
                    </p>
                    <div class="mb-12">
                        <h4 class="text-[11px] font-black uppercase text-brand-teal/30 tracking-[4px] mb-6">Highlights
                        </h4>
                        <ul class="space-y-4">
                            <li class="highlight-item"><i class="ph-fill ph-check-circle"></i> Net Zero Energy Usage
                            </li>
                            <li class="highlight-item"><i class="ph-fill ph-check-circle"></i> Automated Concierge</li>
                            <li class="highlight-item"><i class="ph-fill ph-check-circle"></i> Collaborative Work Hubs
                            </li>
                        </ul>
                    </div>
                    <div class="mt-auto pt-10 border-t border-gray-200/60 flex items-center justify-between">
                        <span class="text-xs font-black uppercase tracking-widest text-brand-teal opacity-40">Type:
                            Commercial</span>
                        <a href="#" class="text-brand-teal hover:text-brand-lime transition-all"><i
                                class="ph-bold ph-arrow-up-right text-2xl"></i></a>
                    </div>
                </div>
            </div>

            <!-- ProjectCard: Urban Oasis -->
            <div class="project-card" data-category="completed" data-aos="fade-up">
                <div class="card-img-container">
                    <img src="service3.png" alt="Urban Oasis"
                        class="w-full h-full object-cover transition-transform duration-1000 hover:scale-110">
                </div>
                <div class="px-12 py-16 -mt-20 relative z-10 flex flex-col flex-grow">
                    <h2 class="text-5xl font-heading font-extrabold text-brand-teal mb-8">Urban Oasis</h2>
                    <p class="text-[17px] text-brand-teal-light mb-12 opacity-80 leading-[1.8] font-medium">
                        A flagship mixed-use achievement in the cultural district. Features rooftop leisure zones and
                        multi-level premium retail shopping.
                    </p>
                    <div class="mb-12">
                        <h4 class="text-[11px] font-black uppercase text-brand-teal/30 tracking-[4px] mb-6">Highlights
                        </h4>
                        <ul class="space-y-4">
                            <li class="highlight-item"><i class="ph-fill ph-check-circle"></i> Rooftop Leisure Lounge
                            </li>
                            <li class="highlight-item"><i class="ph-fill ph-check-circle"></i> Multi-level Retail Mall
                            </li>zzzx
                            <li class="highlight-item"><i class="ph-fill ph-check-circle"></i> Smart Security System
                            </li>
                        </ul>
                    </div>
                    <div class="mt-auto pt-10 border-t border-gray-200/60 flex items-center justify-between">
                        <span class="text-xs font-black uppercase tracking-widest text-brand-teal opacity-40">Type:
                            Mixed Use</span>
                        <a href="#" class="text-brand-teal hover:text-brand-lime transition-all"><i
                                class="ph-bold ph-arrow-up-right text-2xl"></i></a>
                    </div>
                </div>
            </div>

            <!-- ProjectCard: Digital Plaza -->
            <div class="project-card" data-category="upcoming" data-aos="fade-up" data-aos-delay="200">
                <div class="card-img-container">
                    <img src="hero.png" alt="Digital Plaza"
                        class="w-full h-full object-cover transition-transform duration-1000 hover:scale-110">
                </div>
                <div class="px-12 py-16 -mt-20 relative z-10 flex flex-col flex-grow">
                    <h2 class="text-5xl font-heading font-extrabold text-brand-teal mb-8">Digital Plaza</h2>
                    <p class="text-[17px] text-brand-teal-light mb-12 opacity-80 leading-[1.8] font-medium">
                        Connecting global tech districts with net-zero infrastructure. Planned construction starting in
                        late 2025.
                    </p>
                    <div class="mb-12">
                        <h4 class="text-[11px] font-black uppercase text-brand-teal/30 tracking-[4px] mb-6">Highlights
                        </h4>
                        <ul class="space-y-4">
                            <li class="highlight-item"><i class="ph-fill ph-check-circle"></i> High-Speed Data Grid Tech
                            </li>
                            <li class="highlight-item"><i class="ph-fill ph-check-circle"></i> Specialized R&D Labs</li>
                            <li class="highlight-item"><i class="ph-fill ph-check-circle"></i> Integrated Hubs</li>
                        </ul>
                    </div>
                    <div class="mt-auto pt-10 border-t border-gray-200/60 flex items-center justify-between">
                        <span class="text-xs font-black uppercase tracking-widest text-brand-teal opacity-40">Type:
                            Commercial</span>
                        <a href="#" class="text-brand-teal hover:text-brand-lime transition-all"><i
                                class="ph-bold ph-arrow-up-right text-2xl"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Pagination -->
    <div class="max-w-7xl mx-auto flex items-center justify-center gap-3 pb-32">
        <a href="#" class="pagination-btn active">1</a>
        <a href="#" class="pagination-btn">2</a>
        <a href="#" class="pagination-btn"><i class="ph-bold ph-caret-right"></i></a>
    </div>

    <!-- Ready to start? CTA -->
    <section class="bg-brand-teal py-32 px-6 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('hero.png')] opacity-10 bg-center bg-cover"></div>
        <div class="max-w-5xl mx-auto text-center relative z-10">
            <h2 class="font-heading text-4xl md:text-7xl font-black text-white mb-10 tracking-tighter leading-[0.95]">
                Have a project in mind?<br><span
                    class="bg-clip-text text-transparent bg-gradient-to-r from-brand-lime to-white">Let's build
                    something great.</span>
            </h2>
            <a href="index.php#contact" class="btn btn-primary mt-6">Start a New Project Enquiry</a>
        </div>
    </section>

    <!-- Page Specific Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Filtering Logic
            const filterTabs = document.querySelectorAll('.filter-tab');
            const projectCards = document.querySelectorAll('.project-card');

            filterTabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    filterTabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');

                    const filter = tab.getAttribute('data-filter');

                    projectCards.forEach(card => {
                        if (filter === 'all' || card.getAttribute('data-category') === filter) {
                            card.style.display = 'flex';
                            card.style.opacity = '1';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                    if (typeof AOS !== 'undefined') AOS.refresh();
                });
            });

            // Hero Entrance
            gsap.from("header span, header h1", {
                y: 60,
                opacity: 0,
                duration: 0.8,
                stagger: 0.1,
                ease: "power3.out"
            });
        });
    </script>

<?php include 'common/footer.php'; ?>