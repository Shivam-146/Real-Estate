<?php
$pageTitle = "Skyline Luxury Villa - Real Estate";
$pageDescription = "Property Details for Skyline Luxury Villa. Specs, amenities, floor plans, and nearby landmarks in Mumbai's Tech District.";
include 'common/header.php';
?>

    <!-- Page Content -->
    <div class="pt-24 min-h-screen">
        <div class="hero relative h-[60vh] overflow-hidden">
            <div class="absolute inset-0 bg-[url('hero.png')] bg-center bg-cover scale-105"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-brand-teal via-brand-teal/40 to-transparent flex items-end pb-20 px-6">
                <div class="max-w-7xl mx-auto w-full flex flex-col md:flex-row justify-between items-end gap-10">
                    <div class="text-white">
                        <span class="inline-block bg-brand-lime text-brand-teal text-[10px] font-black uppercase px-4 py-1.5 rounded mb-6">Ready-to-Move</span>
                        <h1 class="text-5xl md:text-7xl font-heading font-black tracking-tighter leading-none mb-4">Skyline Luxury Villa</h1>
                        <div class="flex items-center gap-2 text-white/70 font-bold text-lg">
                            <i class="ph-fill ph-map-pin text-brand-lime"></i> Downtown Tech District, Mumbai, India
                        </div>
                    </div>
                    <div class="text-brand-lime text-5xl font-heading font-black tracking-tighter">
                        ₹12.5 Cr
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 lg:grid-cols-3 gap-16">
            <!-- Left: Details -->
            <div class="lg:col-span-2 space-y-16">
                <!-- Specs -->
                <div class="bg-white rounded-[3rem] p-12 border border-gray-100 shadow-xl">
                    <h2 class="text-3xl font-heading font-black text-brand-teal mb-10 tracking-tighter">Property Specifications</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 pb-10 border-b border-gray-100 mb-10">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-2xl text-brand-teal"><i class="ph ph-bed"></i></div>
                            <div><h5 class="text-[10px] uppercase font-black text-brand-teal/40 tracking-widest">Beds</h5><p class="font-bold text-lg text-brand-teal">4 BHK</p></div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-2xl text-brand-teal"><i class="ph ph-bathtub"></i></div>
                            <div><h5 class="text-[10px] uppercase font-black text-brand-teal/40 tracking-widest">Baths</h5><p class="font-bold text-lg text-brand-teal">3 Baths</p></div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-2xl text-brand-teal"><i class="ph ph-arrows-out"></i></div>
                            <div><h5 class="text-[10px] uppercase font-black text-brand-teal/40 tracking-widest">Area</h5><p class="font-bold text-lg text-brand-teal">3.2k sqft</p></div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-50 rounded-xl flex items-center justify-center text-2xl text-brand-teal"><i class="ph ph-car"></i></div>
                            <div><h5 class="text-[10px] uppercase font-black text-brand-teal/40 tracking-widest">Parking</h5><p class="font-bold text-lg text-brand-teal">2 slots</p></div>
                        </div>
                    </div>
                    <p class="text-lg leading-relaxed text-brand-teal-light font-medium opacity-80">
                        Welcome to the exclusive Skyline Luxury Villa, an architectural masterpiece located in the heart of the Mumbai Tech District. Featuring panoramic city views, premium modern finishes, and smart home integration capabilities, this property is the perfect investment for luxury living.
                    </p>
                </div>

                <!-- Amenities -->
                <div class="bg-white rounded-[3rem] p-12 border border-gray-100 shadow-xl">
                    <h2 class="text-3xl font-heading font-black text-brand-teal mb-10 tracking-tighter">Project Amenities</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
                        <div class="flex items-center gap-4 font-bold text-brand-teal"><i class="ph-bold ph-swimming-pool bg-brand-teal text-brand-lime p-2 rounded-lg"></i> Infinity Pool</div>
                        <div class="flex items-center gap-4 font-bold text-brand-teal"><i class="ph-bold ph-barbell bg-brand-teal text-brand-lime p-2 rounded-lg"></i> Fitness Center</div>
                        <div class="flex items-center gap-4 font-bold text-brand-teal"><i class="ph-bold ph-shield-check bg-brand-teal text-brand-lime p-2 rounded-lg"></i> 24/7 Security</div>
                        <div class="flex items-center gap-4 font-bold text-brand-teal"><i class="ph-bold ph-tree bg-brand-teal text-brand-lime p-2 rounded-lg"></i> Central Park</div>
                        <div class="flex items-center gap-4 font-bold text-brand-teal"><i class="ph-bold ph-wifi-high bg-brand-teal text-brand-lime p-2 rounded-lg"></i> Smart Home</div>
                        <div class="flex items-center gap-4 font-bold text-brand-teal"><i class="ph-bold ph-lightning bg-brand-teal text-brand-lime p-2 rounded-lg"></i> Backup Power</div>
                    </div>
                </div>

                <!-- Map -->
                <div class="bg-white rounded-[3rem] p-12 border border-gray-100 shadow-xl">
                    <h2 class="text-3xl font-heading font-black text-brand-teal mb-10 tracking-tighter">Location Map</h2>
                    <div class="w-full h-96 rounded-2xl overflow-hidden bg-gray-100 flex items-center justify-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15086.1235372138!2d72.8228!3d18.9388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7d1e0f089606d%3A0x6b490f2382e2107!2sNariman%20Point%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1711883547844!5m2!1sen!2sin" class="w-full h-full border-0 grayscale" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

            <!-- Right: Sidebar -->
            <div class="space-y-8">
                <div class="bg-white rounded-[3rem] p-10 border border-gray-100 shadow-xl sticky top-28">
                    <h3 class="text-2xl font-heading font-black text-brand-teal mb-2 tracking-tighter">Interest Inquiry</h3>
                    <p class="text-sm font-bold text-brand-teal/40 mb-8 tracking-widest uppercase">Schedule a Visit Now</p>
                    <form class="space-y-4">
                        <input type="text" placeholder="Full Name" class="w-full px-6 py-4 rounded-xl border border-gray-100 bg-gray-50 focus:border-brand-teal outline-none transition-all">
                        <input type="email" placeholder="Email Address" class="w-full px-6 py-4 rounded-xl border border-gray-100 bg-gray-50 focus:border-brand-teal outline-none transition-all">
                        <textarea rows="4" placeholder="Message..." class="w-full px-6 py-4 rounded-xl border border-gray-100 bg-gray-50 focus:border-brand-teal outline-none transition-all resize-none"></textarea>
                        <button class="btn btn-dark w-full !py-5 !rounded-xl shadow-xl shadow-brand-teal/10">Submit Inquiry</button>
                    </form>
                    <div class="mt-10 pt-10 border-t border-gray-100 text-center">
                        <p class="text-xs font-black text-brand-teal/30 uppercase tracking-[4px] mb-4">Share This Listing</p>
                        <div class="flex justify-center gap-4">
                            <a href="#" class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center text-xl text-brand-teal hover:bg-brand-lime transition-all"><i class="ph-fill ph-facebook-logo"></i></a>
                            <a href="#" class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center text-xl text-brand-teal hover:bg-brand-lime transition-all"><i class="ph-fill ph-twitter-logo"></i></a>
                            <a href="#" class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center text-xl text-brand-teal hover:bg-brand-lime transition-all"><i class="ph-fill ph-instagram-logo"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'common/footer.php'; ?>
