<?php
$pageTitle = "Contact Us | Real Estate Portal";
$pageDescription = "Get in touch with our expert real estate team for project enquiries, site visits, and commercial investment guidance in Mumbai.";
include 'common/header.php';
?>

    <!-- Page Header -->
    <header class="relative pt-64 pb-80 bg-brand-teal text-white px-6 hero-curve mb-20 text-center overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="inline-flex items-center gap-4 text-[10px] font-black uppercase tracking-[5px] text-brand-lime mb-6 text-center w-full justify-center" data-aos="fade-down">
                <span class="w-10 h-[1px] bg-brand-lime"></span> Get In Touch <span class="w-10 h-[1px] bg-brand-lime"></span>
            </div>
            <h1 class="font-heading text-7xl md:text-9xl font-black tracking-tighter leading-none mb-8" data-aos="fade-up">
                <span class="bg-clip-text text-transparent bg-gradient-to-b from-white via-white to-white/40">Contact.</span>
            </h1>
        </div>
        <div class="absolute inset-0 bg-[url('hero.png')] opacity-10 bg-center bg-cover"></div>
    </header>

    <!-- Main Contact Section -->
    <section class="py-32 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-20 items-stretch">
            <!-- Left: Info -->
            <div data-aos="fade-right">
                <h2 class="text-5xl md:text-7xl font-heading font-black text-brand-teal mb-8 tracking-tighter leading-[0.95]">Ready to Start Your <span class="text-brand-lime bg-brand-teal px-4 italic">Journey?</span></h2>
                <p class="text-[17px] mb-12 opacity-80 leading-[1.8] max-w-lg font-medium text-brand-teal-light tracking-tight">Whether you are an investor looking for commercial yields or a family searching for a luxury villa, our team is ready to guide you.</p>
                
                <div class="space-y-8 mb-12">
                    <div class="flex items-start gap-6">
                        <div class="w-16 h-16 bg-brand-teal rounded-2xl flex items-center justify-center text-brand-lime text-3xl flex-shrink-0 shadow-lg shadow-brand-teal/20"><i class="ph-bold ph-phone-call"></i></div>
                        <div><h4 class="text-xs font-black text-brand-teal/40 uppercase tracking-[4px] mb-2">Call Us</h4><p class="text-2xl font-bold text-brand-teal">+91 98765 43210</p></div>
                    </div>
                    <div class="flex items-start gap-6">
                        <div class="w-16 h-16 bg-brand-teal rounded-2xl flex items-center justify-center text-brand-lime text-3xl flex-shrink-0 shadow-lg shadow-brand-teal/20"><i class="ph-bold ph-envelope-simple"></i></div>
                        <div><h4 class="text-xs font-black text-brand-teal/40 uppercase tracking-[4px] mb-2">Email Us</h4><p class="text-2xl font-bold text-brand-teal">info@realestate.com</p></div>
                    </div>
                    <div class="flex items-start gap-6">
                        <div class="w-16 h-16 bg-brand-teal rounded-2xl flex items-center justify-center text-brand-lime text-3xl flex-shrink-0 shadow-lg shadow-brand-teal/20"><i class="ph-bold ph-map-pin"></i></div>
                        <div><h4 class="text-xs font-black text-brand-teal/40 uppercase tracking-[4px] mb-2">Visit Office</h4><p class="text-2xl font-bold text-brand-teal">Mumbai Headquarters, India</p></div>
                    </div>
                </div>
                
                <div class="flex gap-4">
                    <a href="#" class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center text-2xl hover:bg-brand-lime hover:text-brand-teal transition-all"><i class="ph-fill ph-facebook-logo"></i></a>
                    <a href="#" class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center text-2xl hover:bg-brand-lime hover:text-brand-teal transition-all"><i class="ph-fill ph-instagram-logo"></i></a>
                    <a href="#" class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center text-2xl hover:bg-brand-lime hover:text-brand-teal transition-all"><i class="ph-fill ph-linkedin-logo"></i></a>
                </div>
            </div>

            <!-- Right: Form Card -->
            <div class="bg-white rounded-[3rem] p-12 lg:p-16 border border-gray-100 shadow-2xl relative" data-aos="fade-left">
                <div class="absolute inset-0 bg-brand-teal opacity-[0.02] rounded-[3rem]"></div>
                <div class="relative z-10 h-full flex flex-col">
                    <h3 class="text-3xl font-heading font-black text-brand-teal mb-10 tracking-tighter">Project Enquiry Form.</h3>
                    <form class="space-y-6 flex-grow flex flex-col">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div><label class="text-[10px] font-black uppercase text-brand-teal/40 tracking-[4px] mb-3 block">Full Name</label><input type="text" placeholder="John Doe" class="form-input"></div>
                            <div><label class="text-[10px] font-black uppercase text-brand-teal/40 tracking-[4px] mb-3 block">Email ID</label><input type="email" placeholder="john@example.com" class="form-input"></div>
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-brand-teal/40 tracking-[4px] mb-3 block">Interest Type</label>
                            <style>
                                select {
                                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23063231' stroke-width='3'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19.5 8.25l-7.5 7.5-7.5-7.5' /%3E%3C/svg%3E");
                                    background-position: right 1.5rem center;
                                    background-repeat: no-repeat;
                                    background-size: 1rem;
                                }
                            </style>
                            <select class="form-input appearance-none">
                                <option>Commercial Investment</option>
                                <option>Residential Villa</option>
                                <option>Property Management</option>
                            </select>
                        </div>
                        <div class="flex-grow">
                            <label class="text-[10px] font-black uppercase text-brand-teal/40 tracking-[4px] mb-3 block">Your Requirements</label>
                            <textarea placeholder="Tell us more about your ideal property..." class="form-input h-full min-h-[150px] resize-none"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark w-full !py-6 !text-lg !rounded-2xl shadow-xl shadow-brand-teal/20">Submit Detailed Enquiry</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Full Map Section -->
    <section class="h-[600px] w-full px-6 pb-32">
        <div class="w-full h-full rounded-[3rem] overflow-hidden border border-gray-100 shadow-xl grayscale contrast-125 mb-20 relative">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15086.1235372138!2d72.8228!3d18.9388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7d1e0f089606d%3A0x6b490f2382e2107!2sNariman%20Point%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1711883547844!5m2!1sen!2sin" class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
