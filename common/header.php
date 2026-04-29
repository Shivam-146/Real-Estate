<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Real Estate | Premium Real Estate Portal'; ?></title>
    <!-- SEO -->
    <meta name="description"
        content="<?php echo isset($pageDescription) ? $pageDescription : 'Discover premium real estate listings in Mumbai. Luxury villas, smart apartments, and commercial projects.'; ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;600;800&display=swap"
        rel="stylesheet">

    <!-- Animate On Scroll (AOS) -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- GSAP (GreenSock Animation Platform) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            lime: '#CBFF54',
                            teal: '#063231',
                            'teal-dark': '#032524',
                            'teal-light': '#495b55',
                        },
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                    boxShadow: {
                        'premium': '0 20px 50px rgba(6, 50, 49, 0.1)',
                        'lime': '0 10px 40px rgba(203, 255, 84, 0.2)',
                    }
                }
            }
        }
    </script>

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <style type="text/tailwindcss">
        @layer components {
            .btn { @apply inline-flex items-center justify-center font-bold transition-all duration-500 rounded focus:outline-none uppercase tracking-widest text-sm relative overflow-hidden; }
            .btn::after { @apply content-[''] absolute inset-0 bg-white/20 translate-x-[-100%] transition-transform duration-500; }
            .btn:hover::after { @apply translate-x-0; }
            
            .btn-primary { @apply bg-brand-lime text-brand-teal hover:bg-[#b4f625] px-10 py-5; }
            .btn-dark { @apply bg-brand-teal text-white hover:bg-brand-teal-dark px-10 py-5; }
            
            .nav-link { @apply font-semibold text-white/90 hover:text-brand-lime transition-colors relative; }
            .nav-link::after { @apply content-[''] absolute bottom-[-4px] left-0 w-0 h-[2px] bg-brand-lime transition-all duration-300; }
            .nav-link:hover::after { @apply w-full; }
            
            .search-input { @apply bg-white/10 border border-white/10 rounded p-3 text-white placeholder-white/50 focus:border-brand-lime outline-none font-semibold w-full; }
            .search-label { @apply block text-[10px] font-bold text-brand-lime uppercase mb-1; }
            
            .card { @apply bg-white rounded-[2rem] overflow-hidden shadow-premium flex flex-col h-full border border-gray-100/50 hover:shadow-2xl hover:-translate-y-4 transition-transform duration-500; }
            .btn-card { @apply !px-6 !py-3 !text-xs !font-black !rounded-xl; }
            
            .footer-link { @apply block text-white/45 hover:text-brand-lime transition-all mb-4 font-bold text-sm; }
            .social-icon { @apply w-12 h-12 border border-white/10 rounded-2xl flex items-center justify-center hover:bg-brand-lime hover:text-brand-teal transition-all text-xl; }
            
            .floating-blob { @apply absolute rounded-full blur-[100px] opacity-[0.05] animate-pulse pointer-events-none; }

            .hero-curve {
                clip-path: ellipse(150% 100% at 50% 0%);
            }
            .form-input { @apply w-full px-6 py-4 rounded-xl border border-gray-100 bg-gray-50/50 outline-none focus:border-brand-teal focus:ring-2 focus:ring-brand-teal/10 transition-all; }
            
            /* Projects page specific components */
            .filter-tab { @apply px-10 py-4 rounded-full text-base font-bold transition-all duration-300 cursor-pointer text-brand-teal whitespace-nowrap; }
            .filter-tab.active { @apply bg-brand-teal text-white shadow-xl shadow-brand-teal/20; }
            .filter-tab:not(.active) { @apply bg-white border border-gray-100 hover:bg-gray-50; }
            
            .project-card { @apply bg-[#f6f8f8] rounded-[3rem] overflow-hidden transition-all duration-500 flex flex-col h-full border border-gray-100/50 hover:shadow-2xl hover:-translate-y-2; }
            
            .card-img-container {
                position: relative;
                height: 400px;
                overflow: hidden;
                clip-path: ellipse(110% 75% at 50% 0%);
            }
            
            .highlight-item { @apply flex items-center gap-3 text-brand-teal font-extrabold text-[15px]; }
            .highlight-item i { @apply text-brand-teal text-lg; }
            
            .pagination-btn { @apply w-12 h-12 flex items-center justify-center rounded-full border border-gray-200 text-brand-teal font-bold hover:bg-brand-teal hover:text-white transition-all; }
            .pagination-btn.active { @apply bg-brand-teal text-white border-brand-teal; }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
    </style>
</head>

<body class="font-sans antialiased bg-white text-brand-teal-light overflow-x-hidden">

    <!-- Navigation -->
    <nav id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 px-6 py-6 lg:px-20">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="index.php" class="flex items-center gap-2 group ml-4 w-48 md:w-64 shrink-0">
                <img src="img/logo.png" alt="Swastik Construction Logo" class="h-16 md:h-20 w-auto origin-left scale-[2.5] group-hover:scale-[2.6] transition-transform duration-300">
            </a>

            <ul class="hidden lg:flex items-center gap-12 text-white">
                <li><a href="index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'text-brand-lime' : ''; ?>">Home</a></li>
                <li><a href="about.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'text-brand-lime' : ''; ?>">About Us</a></li>
                <li><a href="services.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'text-brand-lime' : ''; ?>">Services</a></li>
                <li><a href="projects.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'projects.php' ? 'text-brand-lime' : ''; ?>">Project</a></li>
                <li><a href="events.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'events.php' ? 'text-brand-lime' : ''; ?>">Events</a></li>
                <li><a href="contact.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'text-brand-lime' : ''; ?>">Contact</a></li>
            </ul>

            <a href="contact.php" class="btn btn-primary hidden lg:flex !py-3">Enquiry Now</a>

            <!-- Mobile Hamburger Button -->
            <button id="menuBtn" class="lg:hidden bg-brand-lime text-brand-teal text-3xl p-2 rounded-xl transition-all shadow-lg relative z-50">
                <i class="ph-bold ph-list"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu Components -->
    <!-- Backdrop -->
    <div id="menuBackdrop" class="fixed inset-0 bg-black/20 backdrop-blur-sm z-[60] opacity-0 pointer-events-none transition-all duration-500"></div>

    <!-- Sidebar Drawer -->
    <div id="mobileMenu" class="fixed top-0 right-0 h-full w-[300px] bg-brand-teal z-[70] translate-x-full transition-transform duration-500 flex flex-col p-10 shadow-[-20px_0_50px_rgba(0,0,0,0.3)]">
        <button id="closeBtn" class="self-end text-brand-lime text-4xl hover:rotate-90 transition-all mb-12">
            <i class="ph-bold ph-x"></i>
        </button>
        <ul class="flex flex-col gap-6 text-xl font-bold text-white uppercase tracking-wider mb-auto">
            <li><a href="index.php" class="mobile-link">Home</a></li>
            <li><a href="about.php" class="mobile-link">About Us</a></li>
            <li><a href="services.php" class="mobile-link">Services</a></li>
            <li><a href="projects.php" class="mobile-link">Project</a></li>
            <li><a href="events.php" class="mobile-link">Events</a></li>
            <li><a href="contact.php" class="mobile-link text-brand-lime">Contact</a></li>
        </ul>
        <div class="mt-10">
            <a href="contact.php" class="btn btn-primary w-full py-4 rounded-xl text-xs">Enquiry Now</a>
        </div>
    </div>

    <script>
        // Desktop Navbar Scroll Logic
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-brand-teal/90', 'backdrop-blur-xl', 'shadow-xl', 'py-4');
                navbar.classList.remove('py-6');
            } else {
                navbar.classList.remove('bg-brand-teal/90', 'backdrop-blur-xl', 'shadow-xl', 'py-4');
                navbar.classList.add('py-6');
            }
        });

        // Mobile Menu Toggle Logic
        const menuBtn = document.getElementById('menuBtn');
        const closeBtn = document.getElementById('closeBtn');
        const backdrop = document.getElementById('menuBackdrop');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        function openMenu() {
            mobileMenu.classList.remove('translate-x-full');
            backdrop.classList.remove('opacity-0', 'pointer-events-none');
            document.body.classList.add('overflow-hidden');
        }

        function closeMenu() {
            mobileMenu.classList.add('translate-x-full');
            backdrop.classList.add('opacity-0', 'pointer-events-none');
            document.body.classList.remove('overflow-hidden');
        }

        menuBtn.addEventListener('click', openMenu);
        closeBtn.addEventListener('click', closeMenu);
        backdrop.addEventListener('click', closeMenu);

        // Close menu when a link is clicked
        mobileLinks.forEach(link => {
            link.addEventListener('click', closeMenu);
        });
    </script>

    <style>
        .mobile-link { @apply hover:text-brand-lime transition-all duration-300 active:scale-90 inline-block; }
    </style>
