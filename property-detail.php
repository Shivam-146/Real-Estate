<?php
require_once 'config/db.php';

$propertyId = $_GET['id'] ?? null;
$property = null;

if ($propertyId) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM properties WHERE id = ?");
        $stmt->execute([$propertyId]);
        $property = $stmt->fetch();
        
        if ($property) {
            $stmt = $pdo->prepare("SELECT * FROM property_images WHERE property_id = ? ORDER BY created_at ASC");
            $stmt->execute([$propertyId]);
            $galleryImages = $stmt->fetchAll();
        }
    } catch (PDOException $e) {
        $property = null;
        $galleryImages = [];
    }
}

if (!$property) {
    header("Location: projects.php");
    exit();
}

$pageTitle = htmlspecialchars($property['name']) . " - Real Estate";
$pageDescription = "Detailed information for " . htmlspecialchars($property['name']) . " in " . htmlspecialchars($property['location']);
include 'common/header.php';
?>

    <!-- Page Content -->
    <div class="min-h-screen">
        <div class="hero relative h-[70vh] overflow-hidden">
            <div class="absolute inset-0 bg-[url('<?php echo htmlspecialchars($property['image_url'] ? $property['image_url'] : 'hero.png'); ?>')] bg-center bg-cover scale-105"></div>
            <!-- Overlay for Header Visibility -->
            <div class="absolute inset-0 bg-brand-teal/60 z-[1]"></div>
            
            <div class="absolute inset-0 z-10 bg-gradient-to-t from-brand-teal via-transparent to-transparent flex items-end pb-20 px-6">
                <div class="max-w-7xl mx-auto w-full flex flex-col md:flex-row justify-between items-end gap-10">
                    <div class="text-white">
                        <span class="inline-block bg-brand-lime text-brand-teal text-[10px] font-black uppercase px-4 py-1.5 rounded mb-6"><?php echo htmlspecialchars($property['category']); ?></span>
                        <h1 class="text-5xl md:text-7xl font-heading font-black tracking-tighter leading-none mb-4"><?php echo htmlspecialchars($property['name']); ?></h1>
                        <div class="flex items-center gap-2 text-white/70 font-bold text-lg">
                            <i class="ph-fill ph-map-pin text-brand-lime"></i> <?php echo htmlspecialchars($property['location']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 lg:grid-cols-3 gap-16">
            <!-- Left: Details -->
            <div class="lg:col-span-2 space-y-16">
                <!-- Description -->
                <div class="bg-white rounded-[3rem] p-12 border border-gray-100 shadow-xl">
                    <h2 class="text-3xl font-heading font-black text-brand-teal mb-10 tracking-tighter">About This Property</h2>
                    <p class="text-lg leading-relaxed text-brand-teal-light font-medium opacity-80 mb-10">
                        <?php echo nl2br(htmlspecialchars($property['description'])); ?>
                    </p>
                    <div class="flex flex-wrap gap-4 pt-10 border-t border-gray-100">
                        <div class="px-6 py-2 bg-slate-50 rounded-full text-xs font-black uppercase tracking-widest text-brand-teal">Status: <?php echo htmlspecialchars($property['status']); ?></div>
                        <div class="px-6 py-2 bg-slate-50 rounded-full text-xs font-black uppercase tracking-widest text-brand-teal">Location: <?php echo htmlspecialchars($property['location']); ?></div>
                    </div>
                </div>

                <!-- Amenities -->
                <div class="bg-white rounded-[3rem] p-12 border border-gray-100 shadow-xl">
                    <h2 class="text-3xl font-heading font-black text-brand-teal mb-10 tracking-tighter">Project Amenities</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
                        <?php 
                        $amenities = explode(',', $property['amenities']);
                        foreach ($amenities as $amenity): 
                            if (trim($amenity) == '') continue;
                        ?>
                            <div class="flex items-center gap-4 font-bold text-brand-teal">
                                <i class="ph-bold ph-check-circle bg-brand-teal text-brand-lime p-2 rounded-lg"></i> 
                                <?php echo htmlspecialchars(trim($amenity)); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Property Gallery -->
                <?php if (!empty($galleryImages)): ?>
                <div class="bg-white rounded-[3rem] p-12 border border-gray-100 shadow-xl">
                    <h2 class="text-3xl font-heading font-black text-brand-teal mb-10 tracking-tighter">Property Gallery</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach ($galleryImages as $index => $img): ?>
                            <div class="rounded-3xl overflow-hidden bg-slate-100 aspect-[4/3] shadow-sm <?php echo (count($galleryImages) % 2 !== 0 && $index === 0) ? 'md:col-span-2 aspect-[21/9]' : ''; ?>">
                                <img src="<?php echo htmlspecialchars($img['image_url']); ?>" alt="Gallery Image" class="w-full h-full object-cover hover:scale-110 transition-transform duration-700 cursor-zoom-in" onclick="openLightbox(this.src)">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Map View -->
                <div class="bg-white rounded-[3rem] p-12 border border-gray-100 shadow-xl">
                    <h2 class="text-3xl font-heading font-black text-brand-teal mb-10 tracking-tighter">Location Overview</h2>
                    <div class="w-full h-96 rounded-2xl overflow-hidden bg-gray-100 flex items-center justify-center relative">
                         <div class="absolute inset-0 bg-brand-teal/5 flex items-center justify-center flex-col text-center p-12">
                            <i class="ph ph-map-trifold text-6xl text-brand-teal opacity-20 mb-4"></i>
                            <h4 class="text-xl font-bold text-brand-teal mb-2"><?php echo htmlspecialchars($property['location']); ?></h4>
                            <p class="text-sm text-brand-teal-light max-w-xs">Detailed neighborhood layout and landmarks near <?php echo htmlspecialchars($property['name']); ?>.</p>
                         </div>
                    </div>
                </div>
            </div>

            <!-- Right: Sidebar -->
            <div class="space-y-8">
                <div class="bg-white rounded-[3rem] p-10 border border-gray-100 shadow-xl sticky top-28">
                    <h3 class="text-2xl font-heading font-black text-brand-teal mb-2 tracking-tighter">Interest Inquiry</h3>
                    <p class="text-sm font-bold text-brand-teal/40 mb-8 tracking-widest uppercase">Request info for <?php echo htmlspecialchars($property['name']); ?></p>
                    <form action="index.php#contact" method="POST" class="space-y-4">
                        <input type="hidden" name="action" value="save_lead">
                        <input type="hidden" name="property_name" value="<?php echo htmlspecialchars($property['name']); ?>">
                        <input type="text" name="full_name" required placeholder="Full Name" class="w-full px-6 py-4 rounded-xl border border-gray-100 bg-gray-50 focus:border-brand-teal outline-none transition-all">
                        <input type="email" name="email" required placeholder="Email Address" class="w-full px-6 py-4 rounded-xl border border-gray-100 bg-gray-50 focus:border-brand-teal outline-none transition-all">
                        <textarea name="message" rows="4" placeholder="Mention specific requirements for <?php echo htmlspecialchars($property['name']); ?>..." class="w-full px-6 py-4 rounded-xl border border-gray-100 bg-gray-50 focus:border-brand-teal outline-none transition-all resize-none"></textarea>
                        <button type="submit" class="btn btn-dark w-full !py-5 !rounded-xl shadow-xl shadow-brand-teal/10">Submit Lead Enquiry</button>
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

    <!-- Lightbox Modal -->
    <div id="lightboxModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4 lg:p-10 transition-opacity duration-300 opacity-0">
        <div class="absolute inset-0 bg-brand-teal-dark/95 backdrop-blur-md" onclick="closeLightbox()"></div>
        <button onclick="closeLightbox()" class="absolute top-6 right-6 z-10 w-12 h-12 flex items-center justify-center text-white/50 hover:text-white bg-white/5 hover:bg-white/10 rounded-full transition-all text-2xl">
            <i class="ph ph-x"></i>
        </button>
        <img id="lightboxImage" src="" class="relative z-10 max-w-full max-h-full rounded-2xl shadow-2xl transition-transform duration-500 transform scale-95 object-contain" alt="Preview">
    </div>

    <script>
        function openLightbox(src) {
            const modal = document.getElementById('lightboxModal');
            const img = document.getElementById('lightboxImage');
            img.src = src;
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                img.classList.remove('scale-95');
                img.classList.add('scale-100');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const modal = document.getElementById('lightboxModal');
            const img = document.getElementById('lightboxImage');
            modal.classList.add('opacity-0');
            img.classList.remove('scale-100');
            img.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }
    </script>

<?php include 'common/footer.php'; ?>

