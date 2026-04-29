    <!-- Footer -->
    <footer class="bg-brand-teal-dark text-white py-32 px-6 border-t border-white/5">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-20">
            <div data-aos="fade-up">
                <a href="index.php" class="flex items-center gap-3 mb-10 group">
                    <i class="ph-bold ph-caret-up text-brand-lime text-4xl group-hover:scale-110 transition-transform duration-300"></i>
                    <h2 class="text-3xl font-heading tracking-tighter uppercase leading-none">
                    <span class="font-light text-white/90">Swastik</span> <span class="font-black text-brand-lime drop-shadow-[0_0_12px_rgba(203,255,84,0.4)]">Construction</span>
                    </h2>
                </a>
                <p class="text-white/40 text-sm leading-relaxed mb-12">
                    Redefining urban spaces with precision construction and data-driven property management solutions.
                </p>
                <div class="mb-12">
                    <h4 class="text-[11px] font-black uppercase text-brand-teal/30 tracking-[4px] mb-6">Highlights</h4>
                    <ul class="space-y-4">
                        <li class="highlight-item !text-white/70 font-medium"><i class="ph-fill ph-check-circle text-brand-lime"></i> Vastu Shastra Compliant</li>
                        <li class="highlight-item !text-white/70 font-medium"><i class="ph-fill ph-check-circle text-brand-lime"></i> Premium Residential Projects</li>
                        <li class="highlight-item !text-white/70 font-medium"><i class="ph-fill ph-check-circle text-brand-lime"></i> Bishnupur Hub</li>
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
                <div class="mb-10">
                    <span class="block text-[10px] font-black text-brand-lime uppercase mb-3 tracking-[4px]">City Office</span>
                    <p class="text-xl font-black text-white mb-1 uppercase">Hriddhi Tower</p>
                    <p class="text-sm text-white/60 leading-relaxed uppercase">
                        Ground Floor, S - 10<br>
                        Thanagora :: Kurbantola :: Bishnupur
                    </p>
                </div>
                <div>
                    <span class="block text-[10px] font-black text-brand-lime uppercase mb-3 tracking-[4px]">Contact Support</span>
                    <p class="text-xl font-bold text-white">8637 818 655 / 832 700 6565</p>
                    <p class="text-sm text-white/50">swastikconstruction@gmail.com</p>
                </div>
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto pt-10 border-t border-white/10 text-center text-white/30 text-xs font-semibold uppercase tracking-[2px]">
            &copy; <?php echo date('Y'); ?> Swastik Construction Group. Bishnupur, WB. Designed for Performance.
        </div>
    </footer>

    <!-- WhatsApp Button -->
    <a href="https://wa.me/918637818655" target="_blank"
        class="fixed bottom-8 right-8 z-[1000] w-16 h-16 bg-[#25D366] text-white flex items-center justify-center rounded-full shadow-2xl hover:scale-110 active:scale-95 transition-all duration-300">
        <i class="ph-fill ph-whatsapp-logo text-4xl"></i>
    </a>

    <!-- Property Image Overlay Modal -->
    <div id="imageModal" class="fixed inset-0 z-[2000] flex items-center justify-center bg-brand-teal/95 backdrop-blur-xl opacity-0 pointer-events-none transition-opacity duration-300 p-4">
        <button id="closeImageModal" class="absolute top-6 right-6 text-white text-5xl hover:text-brand-lime transition-colors z-[2010]">
            <i class="ph-bold ph-x"></i>
        </button>
        <div class="relative bg-white p-2 md:p-4 rounded-[2rem] shadow-2xl max-w-full max-h-full flex items-center justify-center overflow-hidden">
            <!-- Ensure img stays within parent box with max-h/max-w calculations -->
            <img id="modalImg" src="" alt="Property View" class="max-w-[85vw] max-h-[80vh] object-contain rounded-2xl scale-95 opacity-0 transition-all duration-500 shadow-md">
        </div>
    </div>

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

        // Modal Functions
        window.openImageModal = function(imgSrc) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImg');
            
            modalImg.src = imgSrc;
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');
            
            if (typeof gsap !== 'undefined') {
                gsap.to(modalImg, {
                    scale: 1,
                    opacity: 1,
                    duration: 0.5,
                    ease: "back.out(1.7)"
                });
            } else {
                modalImg.classList.remove('scale-95', 'opacity-0');
                modalImg.classList.add('scale-100', 'opacity-100');
            }
        };

        function closeImageModalFunc() {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImg');
            
            if (typeof gsap !== 'undefined') {
                gsap.to(modalImg, {
                    scale: 0.95,
                    opacity: 0,
                    duration: 0.3,
                    ease: "power2.in",
                    onComplete: () => {
                        modal.classList.add('opacity-0', 'pointer-events-none');
                        modal.classList.remove('opacity-100');
                    }
                });
            } else {
                modalImg.classList.add('scale-95', 'opacity-0');
                modalImg.classList.remove('scale-100', 'opacity-100');
                setTimeout(() => {
                    modal.classList.add('opacity-0', 'pointer-events-none');
                    modal.classList.remove('opacity-100');
                }, 300);
            }
        }

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

            // Modal Event Listeners
            const closeBtn = document.getElementById('closeImageModal');
            const modal = document.getElementById('imageModal');
            
            if(closeBtn) closeBtn.addEventListener('click', closeImageModalFunc);
            if(modal) modal.addEventListener('click', (e) => {
                if (e.target === modal) closeImageModalFunc();
            });
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && modal && !modal.classList.contains('opacity-0')) closeImageModalFunc();
            });
        });
    </script>
</body>

</html>
