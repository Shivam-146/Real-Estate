<?php
$pageTitle = "About Us | Real Estate Portal";
$pageDescription = "Learn about our legacy and commitment to excellence in real estate management and construction in Mumbai.";
include 'common/header.php';
?>

    <!-- Page Header -->
    <header class="relative pt-64 pb-80 bg-brand-teal text-white px-6 hero-curve mb-20 text-center overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="inline-flex items-center gap-4 text-[10px] font-black uppercase tracking-[5px] text-brand-lime mb-6 w-full justify-center" data-aos="fade-down">
                <span class="w-10 h-[1px] bg-brand-lime"></span> Our Legacy <span class="w-10 h-[1px] bg-brand-lime"></span>
            </div>
            <h1 class="font-heading text-7xl md:text-9xl font-black tracking-tighter leading-none mb-8" data-aos="fade-up">
                <span class="bg-clip-text text-transparent bg-gradient-to-b from-white via-white to-white/40">About Us.</span>
            </h1>
        </div>
        <div class="absolute inset-0 bg-[url('hero.png')] opacity-10 bg-center bg-cover"></div>
    </header>

    <!-- Content: About Section -->
    <section class="py-32 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div class="relative">
                <img src="about1.png" class="rounded-[3rem] w-full shadow-2xl" alt="Architecture Office">
                <div class="absolute -bottom-10 -right-10 w-2/3 hidden md:block" >
                    <img src="service2.png" class="rounded-[2rem] border-[1rem] border-white shadow-2xl" alt="Construction Management">
                </div>
            </div>
            <div>
                <span class="font-bold text-xs tracking-[0.4em] text-brand-teal/30 uppercase mb-6 block" data-aos="fade-up">Building Excellence</span>
                <h2 class="text-5xl md:text-7xl font-heading font-black text-brand-teal mb-10 tracking-tighter leading-[0.95]" data-aos="fade-up" data-aos-delay="100">
                    Professional <span class="text-brand-lime bg-brand-teal px-4 italic">Management</span> Excellence.
                </h2>
                <p class="text-[17px] mb-12 leading-[1.8] font-medium text-brand-teal-light opacity-80 tracking-tight" data-aos="fade-up" data-aos-delay="200">
                    Welcome to the leading real estate network. We specialize in property lifecycle tracking, detailed specifications, and seamless browsing across devices. Our objective is to generate high-quality leads for investors and buyers alike through professional construction and management excellence.
                </p>
                <div class="grid grid-cols-2 gap-10 border-t border-gray-100 pt-10 mb-10">
                    <div><h4 class="text-4xl font-black text-brand-teal mb-2 tracking-tighter">25+</h4><p class="text-xs font-bold uppercase tracking-widest text-[#CBFF54] bg-brand-teal px-3 py-1 inline-block">Years Experience</p></div>
                    <div><h4 class="text-4xl font-black text-brand-teal mb-2 tracking-tighter">500+</h4><p class="text-xs font-bold uppercase tracking-widest text-[#CBFF54] bg-brand-teal px-3 py-1 inline-block">Units Completed</p></div>
                </div>
                <a href="projects.php" class="btn btn-dark bg-brand-teal text-white !py-4 !px-12 hover:text-brand-lime transition-all">Explore Portfolio</a>
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
                stagger: 0.1,
                ease: "power3.out"
            });
        });
    </script>

<?php include 'common/footer.php'; ?>
