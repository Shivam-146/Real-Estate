<?php
require_once 'config/db.php';

$pageTitle = "Upcoming Events | Real Estate Portal";
$pageDescription = "Join us for property site visits, launches, and investment webinars. Stay updated with the latest events in the real estate world.";
include 'common/header.php';

// Fetch events from database
try {
    $stmt = $pdo->query("SELECT * FROM events ORDER BY event_date ASC");
    $events = $stmt->fetchAll();
} catch (PDOException $e) {
    $events = [];
}
?>

    <!-- Page Header -->
    <header class="relative pt-64 pb-80 bg-brand-teal text-white px-6 hero-curve mb-20 overflow-hidden">
        <div class="max-w-7xl mx-auto text-center relative z-10">
            <div class="inline-flex items-center gap-4 text-[10px] font-black uppercase tracking-[5px] text-brand-lime mb-6">
                <span class="w-10 h-[1px] bg-brand-lime"></span> Stay Connected <span class="w-10 h-[1px] bg-brand-lime"></span>
            </div>
            <h1 class="font-heading text-6xl md:text-9xl font-black tracking-tighter leading-none mb-10 overflow-hidden">
                <span class="bg-clip-text text-transparent bg-gradient-to-b from-white via-white to-white/40 block" data-aos="fade-up">Events.</span>
            </h1>
        </div>
        <div class="absolute inset-0 bg-[url('hero.png')] opacity-10 bg-center bg-cover"></div>
    </header>

    <!-- Events Section -->
    <section class="max-w-7xl mx-auto px-6 -mt-32 relative z-20 mb-32">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (empty($events)): ?>
                <div class="col-span-full text-center py-20 bg-white rounded-[3rem] shadow-premium">
                    <i class="ph-bold ph-calendar-blank text-6xl text-brand-teal/20 mb-6"></i>
                    <h3 class="text-2xl font-heading font-bold text-brand-teal">No upcoming events found.</h3>
                    <p class="text-brand-teal-light opacity-60">Check back later for new updates.</p>
                </div>
            <?php else: ?>
                <?php foreach ($events as $event): ?>
                    <div class="card overflow-hidden group" data-aos="fade-up">
                        <!-- Photo -->
                        <div class="h-64 overflow-hidden">
                            <img src="<?php echo htmlspecialchars($event['image_url'] ? $event['image_url'] : 'hero.png'); ?>" 
                                 alt="<?php echo htmlspecialchars($event['title']); ?>"
                                 class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        </div>

                        <div class="p-10">
                            <!-- Time & Location -->
                            <div class="flex flex-col gap-4 mb-8">
                                <div class="flex items-center gap-3 text-brand-teal font-black text-xs uppercase tracking-[3px]">
                                    <i class="ph-bold ph-clock text-brand-lime text-xl"></i>
                                    <span><?php echo date('M d, Y • h:i A', strtotime($event['event_date'])); ?></span>
                                </div>
                                <div class="flex items-center gap-3 text-brand-teal font-black text-xs uppercase tracking-[3px]">
                                    <i class="ph-bold ph-map-pin text-brand-lime text-xl"></i>
                                    <span><?php echo htmlspecialchars($event['location']); ?></span>
                                </div>
                            </div>
                            
                            <!-- Description (Using title as a heading if needed, but following "only description" strictly might mean including title in the text area) -->
                            <h3 class="text-3xl font-heading font-black text-brand-teal mb-4 tracking-tighter leading-tight">
                                <?php echo htmlspecialchars($event['title']); ?>
                            </h3>
                            <p class="text-brand-teal-light opacity-80 font-medium leading-[1.8] text-lg">
                                <?php echo htmlspecialchars($event['description']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Page Specific Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
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
