<?php
require_once 'config/db.php';

// Filtering and Pagination settings
$itemsPerPage = 4;
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($currentPage < 1) $currentPage = 1;
$offset = ($currentPage - 1) * $itemsPerPage;

$currentCat = isset($_GET['cat']) ? $_GET['cat'] : 'all';
$validCats = ['all', 'Recent', 'Completed'];
if (!in_array($currentCat, $validCats)) $currentCat = 'all';

// Build SQL WHERE clause
$whereClause = "";
$params = [];
if ($currentCat !== 'all') {
    $whereClause = "WHERE category = :category";
    $params[':category'] = $currentCat;
}

// Fetch total count for pagination (with filter)
try {
    $countSql = "SELECT COUNT(*) FROM properties $whereClause";
    $totalStmt = $pdo->prepare($countSql);
    $totalStmt->execute($params);
    $totalRecords = $totalStmt->fetchColumn();
    $totalPages = ceil($totalRecords / $itemsPerPage);
} catch (PDOException $e) {
    $totalRecords = 0;
    $totalPages = 0;
}

// Fetch projects/properties with limit/offset (with filter)
try {
    $fetchSql = "SELECT * FROM properties $whereClause ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($fetchSql);
    foreach ($params as $key => $val) {
        $stmt->bindValue($key, $val);
    }
    $stmt->bindValue(':limit', $itemsPerPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $projects = $stmt->fetchAll();
} catch (PDOException $e) {
    $projects = [];
}

$pageTitle = "Our Projects | Real Estate Portfolio";
include 'common/header.php';
?>

    <!-- Project Hero -->
    <section class="relative pt-48 pb-32 px-6 overflow-hidden min-h-[50vh] flex items-center">
        <!-- Background -->
        <div class="absolute inset-0 z-0">
            <img src="hero.png" alt="Projects" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-brand-teal/80 z-[1]"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10 text-center">
            <span class="inline-block text-xs font-black tracking-[0.4em] text-brand-lime uppercase mb-6" data-aos="fade-up">Portfolio</span>
            <h1 class="font-heading text-6xl md:text-9xl text-white font-black tracking-tighter leading-none" data-aos="fade-up" data-aos-delay="100">
                Our Iconic <br> <span class="italic text-brand-lime">Structures.</span>
            </h1>
        </div>
    </section>

    <!-- Filters Section (New Location) -->
    <section class="bg-white border-b border-gray-100 sticky top-[72px] lg:top-[88px] z-40">
        <div class="max-w-7xl mx-auto px-6 py-6 overflow-x-auto no-scrollbar">
            <div class="flex items-center justify-center gap-3 md:gap-6 min-w-max md:min-w-0">
                <a href="projects.php?cat=all" class="filter-tab <?php echo $currentCat == 'all' ? 'active' : ''; ?> !px-6 md:!px-10">All</a>
                <a href="projects.php?cat=Recent" class="filter-tab <?php echo $currentCat == 'Recent' ? 'active' : ''; ?> !px-6 md:!px-10">Recent</a>
                <a href="projects.php?cat=Completed" class="filter-tab <?php echo $currentCat == 'Completed' ? 'active' : ''; ?> !px-6 md:!px-10">Completed</a>
            </div>
        </div>
    </section>

    <!-- Project Grid -->
    <section class="py-32 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            <?php if (empty($projects)): ?>
                <div class="col-span-2 py-20 text-center">
                    <p class="text-2xl font-heading font-black text-brand-teal/20 italic">More masterpieces coming soon...</p>
                </div>
            <?php else: ?>
                <?php foreach ($projects as $project): ?>
                <div class="project-card bg-white rounded-[4rem] overflow-hidden border border-gray-100 shadow-xl flex flex-col h-full group" data-category="<?php echo htmlspecialchars($project['category']); ?>" data-aos="fade-up">
                    <div class="relative h-80 overflow-hidden">
                        <img src="<?php echo htmlspecialchars($project['image_url'] ? $project['image_url'] : 'hero.png'); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-8 left-8">
                            <span class="bg-brand-teal text-brand-lime text-[10px] font-black uppercase px-6 py-2 rounded-full shadow-lg"><?php echo htmlspecialchars($project['category']); ?></span>
                        </div>
                        <!-- Show Overview Button -->
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-brand-teal/40 backdrop-blur-[2px]">
                            <button onclick="openImageModal('<?php echo htmlspecialchars($project['image_url'] ? $project['image_url'] : 'hero.png'); ?>')" class="flex items-center gap-2 bg-white/20 hover:bg-white/30 backdrop-blur-md border border-white/30 text-white px-6 py-3 rounded-xl font-bold uppercase text-[10px] tracking-widest transition-all hover:scale-105 active:scale-95 shadow-2xl">
                                <i class="ph-bold ph-eye text-lg"></i> Show Overview
                            </button>
                        </div>
                    </div>
                    <div class="p-10 flex flex-col flex-grow">
                        <div class="mb-10">
                            <h3 class="text-3xl font-heading font-black text-brand-teal tracking-tighter mb-4"><?php echo htmlspecialchars($project['name']); ?></h3>
                            <p class="text-brand-teal-light font-medium line-clamp-3 mb-10">
                                <?php echo htmlspecialchars($project['description']); ?>
                            </p>
                        </div>
                        
                        <div class="mt-auto">
                            <a href="property-detail.php?id=<?php echo $project['id']; ?>" class="w-full inline-flex items-center justify-center gap-3 px-8 py-5 bg-brand-teal text-brand-lime rounded-2xl font-black uppercase tracking-[3px] text-[10px] hover:bg-brand-teal/90 transition-all shadow-xl shadow-brand-teal/10">
                                View Full Details <i class="ph-bold ph-arrow-right"></i>
                            </a>
                        </div>

                        <div class="mt-8 pt-8 border-t border-gray-200/60 flex items-center justify-between">
                            <span class="text-xs font-black uppercase tracking-widest text-brand-teal opacity-40">
                                Location: <?php echo htmlspecialchars($project['location']); ?>
                            </span>
                            <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-[2px] <?php echo $project['status'] == 'Available' ? 'bg-brand-lime text-brand-teal' : 'bg-red-50 text-red-500'; ?>">
                                <?php echo htmlspecialchars($project['status']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </section>

    <!-- Pagination -->
    <?php if ($totalPages > 1): ?>
    <div class="max-w-7xl mx-auto flex items-center justify-center gap-3 pb-32">
        <?php for($i = 1; $i <= $totalPages; $i++): ?>
            <a href="projects.php?cat=<?php echo $currentCat; ?>&page=<?php echo $i; ?>" class="pagination-btn <?php echo $currentPage == $i ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
        
        <?php if ($currentPage < $totalPages): ?>
            <a href="projects.php?cat=<?php echo $currentCat; ?>&page=<?php echo $currentPage + 1; ?>" class="pagination-btn"><i class="ph-bold ph-caret-right"></i></a>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <!-- Ready to start? CTA -->
    <section class="bg-brand-teal py-32 px-6 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('hero.png')] opacity-10 bg-center bg-cover"></div>
        <div class="max-w-5xl mx-auto text-center relative z-10">
            <h2 class="text-5xl md:text-8xl font-heading font-black text-white tracking-tighter italic mb-10">Ready to find <br> <span class="text-brand-lime font-black">your space?</span></h2>
            <p class="text-white/60 text-xl font-medium mb-12 max-w-2xl mx-auto underline italic">Our advisors are available 24/7 to guide you through the property selection process.</p>
            <a href="contact.php" class="inline-flex items-center gap-4 bg-brand-lime text-brand-teal px-12 py-6 rounded-2xl font-black uppercase tracking-widest hover:scale-105 transition-transform shadow-2xl shadow-black/20">
                Contact Agent Now <i class="ph-bold ph-arrow-up-right text-xl"></i>
            </a>
        </div>
    </section>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        document.addEventListener('DOMContentLoaded', () => {
            const filterTabs = document.querySelectorAll('.filter-btn');
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
        });
    </script>

<?php include 'common/footer.php'; ?>