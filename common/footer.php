    <!-- Footer -->
    <footer class="bg-brand-teal-dark text-white py-32 px-6 border-t border-white/5">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-20">
            <div data-aos="fade-up">
                <a href="index.php" class="flex items-center gap-3 mb-10 group">
                    <i class="ph-bold ph-caret-up text-brand-lime text-4xl group-hover:scale-110 transition-transform duration-300"></i>
                    <h2 class="text-3xl font-heading tracking-tighter uppercase leading-none">
                        <span class="font-light text-white/90">Real</span> <span class="font-black text-brand-lime drop-shadow-[0_0_12px_rgba(203,255,84,0.4)]">Estate</span>
                    </h2>
                </a>
                <p class="text-white/40 text-sm leading-relaxed mb-12">
                    Redefining urban spaces with precision construction and data-driven property management solutions.
                </p>
                <div class="mb-12">
                    <h4 class="text-[11px] font-black uppercase text-brand-teal/30 tracking-[4px] mb-6">Highlights</h4>
                    <ul class="space-y-4">
                        <li class="highlight-item !text-white/70 font-medium"><i class="ph-fill ph-check-circle text-brand-lime"></i> Vastu Shastra Compliant</li>
                        <li class="highlight-item !text-white/70 font-medium"><i class="ph-fill ph-check-circle text-brand-lime"></i> Sustainable Glass Facade</li>
                        <li class="highlight-item !text-white/70 font-medium"><i class="ph-fill ph-check-circle text-brand-lime"></i> Near Mumbai Metro Hub</li>
                    </ul>
                </div>
                <div class="flex gap-4">
                    <a href="#" class="social-icon"><i class="ph-fill ph-facebook-logo"></i></a>
                    <a href="#" class="social-icon"><i class="ph-fill ph-instagram-logo"></i></a>
                    <a href="#" class="social-icon"><i class="ph-fill ph-linkedin-logo"></i></a>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="100">
                <h4 class="font-heading font-bold text-xl mb-10 text-brand-lime tracking-tighter">Navigate</h4>
                <a href="about.php" class="footer-link">About Our Legacy</a>
                <a href="services.php" class="footer-link">Management Services</a>
                <a href="projects.php" class="footer-link">Portfolio Gallery</a>
                <a href="contact.php" class="footer-link">Support Hub</a>
            </div>

            <div data-aos="fade-up" data-aos-delay="200">
                <h4 class="font-heading font-bold text-xl mb-10 text-brand-lime tracking-tighter">Legal Pages</h4>
                <a href="admin/login.php" class="footer-link">Admin Portal Login</a>
                <a href="projects.php" class="footer-link">Featured Projects</a>
                <a href="#" class="footer-link">Privacy Policy</a>
                <a href="#" class="footer-link">Terms & Services</a>
            </div>

            <div data-aos="fade-up" data-aos-delay="300">
                <h4 class="font-heading font-bold text-xl mb-10 text-brand-lime tracking-tighter">Connect With Us</h4>
                <div class="mb-10">
                    <span class="block text-[10px] font-black text-brand-lime uppercase mb-3 tracking-[4px]">Call
                        Support</span>
                    <p class="text-3xl font-black text-white">+91 98765 43210</p>
                </div>
                <div>
                    <span class="block text-[10px] font-black text-brand-lime uppercase mb-3 tracking-[4px]">Direct
                        Email</span>
                    <p class="text-xl font-bold text-white/70">info@realestate.com</p>
                </div>
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto pt-10 border-t border-white/10 text-center text-white/30 text-xs font-semibold uppercase tracking-[2px]">
            &copy; <?php echo date('Y'); ?> Real Estate Group. Mumbai, India. Designed for Performance.
        </div>
    </footer>

    <!-- WhatsApp Button -->
    <a href="https://wa.me/5125550198" target="_blank"
        class="fixed bottom-8 right-8 z-[1000] w-16 h-16 bg-[#25D366] text-white flex items-center justify-center rounded-full shadow-2xl hover:scale-110 active:scale-95 transition-all duration-300">
        <i class="ph-fill ph-whatsapp-logo text-4xl"></i>
    </a>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (navbar) {
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-brand-teal/95', 'backdrop-blur-md', 'py-4', 'shadow-2xl');
                    navbar.classList.remove('py-6');
                } else {
                    navbar.classList.remove('bg-brand-teal/95', 'backdrop-blur-md', 'py-4', 'shadow-2xl');
                    navbar.classList.add('py-6');
                }
            }
        });

        // Initialize animations on DOMContentLoaded
        document.addEventListener('DOMContentLoaded', () => {
            // AOS Init
            AOS.init({
                duration: 600,
                once: true,
                offset: 50,
                easing: 'ease-out-back'
            });

            // GSAP Init
            if (typeof gsap !== 'undefined') {
                gsap.registerPlugin(ScrollTrigger);
            }
        });
    </script>
</body>

</html>
