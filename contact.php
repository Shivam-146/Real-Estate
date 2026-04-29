<?php
require_once 'config/db.php';

// Handle Lead Submission
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_contact_lead') {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $property_name = $_POST['property_name'] ?? '';
    $message_content = $_POST['message'] ?? '';
    
    try {
        $stmt = $pdo->prepare("INSERT INTO leads (full_name, email, property_name, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$full_name, $email, $property_name, $message_content]);
        $message = "Your enquiry has been submitted successfully! We will contact you soon.";
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}

// Fetch properties for dropdown
try {
    $stmt = $pdo->query("SELECT name FROM properties ORDER BY name ASC");
    $properties = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    $properties = [];
}

$pageTitle = "Contact Us | Real Estate Portal";
$pageDescription = "Get in touch with Swastik Construction for project enquiries, site visits, and commercial investment guidance in Bishnupur.";
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
                        <div class="min-w-0 flex-1"><h4 class="text-xs font-black text-brand-teal/40 uppercase tracking-[4px] mb-2">Call Us</h4><p class="text-lg md:text-2xl font-bold text-brand-teal break-words">8637 818 655 / 832 700 6565</p></div>
                    </div>
                    <div class="flex items-start gap-6">
                        <div class="w-16 h-16 bg-brand-teal rounded-2xl flex items-center justify-center text-brand-lime text-3xl flex-shrink-0 shadow-lg shadow-brand-teal/20"><i class="ph-bold ph-envelope-simple"></i></div>
                        <div class="min-w-0 flex-1"><h4 class="text-xs font-black text-brand-teal/40 uppercase tracking-[4px] mb-2">Email Us</h4><p class="text-lg md:text-2xl font-bold text-brand-teal break-words">swastikconstruction@gmail.com</p></div>
                    </div>
                    <div class="flex items-start gap-6">
                        <div class="w-16 h-16 bg-brand-teal rounded-2xl flex items-center justify-center text-brand-lime text-3xl flex-shrink-0 shadow-lg shadow-brand-teal/20"><i class="ph-bold ph-map-pin"></i></div>
                        <div class="min-w-0 flex-1"><h4 class="text-xs font-black text-brand-teal/40 uppercase tracking-[4px] mb-2">Visit Office</h4><p class="text-sm md:text-xl font-bold text-brand-teal uppercase break-words">Hriddhi Tower, Ground Floor, S-10,<br>Thanagora :: Kurbantola :: Bishnupur</p></div>
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
                    <h3 class="text-3xl font-heading font-black text-brand-teal mb-4 tracking-tighter">Project Enquiry Form.</h3>
                    <?php if ($message): ?>
                        <div class="mb-6 p-4 bg-brand-teal text-brand-lime font-bold rounded-xl text-center">
                            <i class="ph-bold ph-check-circle mr-2"></i> <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                    <form action="contact.php" method="POST" class="space-y-6 flex-grow flex flex-col">
                        <input type="hidden" name="action" value="save_contact_lead">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div><label class="text-[10px] font-black uppercase text-brand-teal/40 tracking-[4px] mb-3 block">Full Name</label><input type="text" name="full_name" required placeholder="John Doe" class="form-input font-bold"></div>
                            <div><label class="text-[10px] font-black uppercase text-brand-teal/40 tracking-[4px] mb-3 block">Email ID</label><input type="email" name="email" required placeholder="john@example.com" class="form-input font-bold"></div>
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
                            <select name="property_name" required class="form-input appearance-none font-bold">
                                <option value="">Select a Project</option>
                                <?php foreach ($properties as $propName): ?>
                                    <option value="<?php echo htmlspecialchars($propName); ?>"><?php echo htmlspecialchars($propName); ?></option>
                                <?php endforeach; ?>
                                <option value="General Investment">General Investment</option>
                            </select>
                        </div>
                        <div class="flex-grow">
                            <label class="text-[10px] font-black uppercase text-brand-teal/40 tracking-[4px] mb-3 block">Your Requirements</label>
                            <textarea name="message" placeholder="Tell us more about your ideal property..." class="form-input font-bold h-full min-h-[150px] resize-none"></textarea>
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3670.5971420004544!2d87.31560669999999!3d23.0752266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f791529ebc9ee9%3A0x7a34b884f51dc615!2sHriddhi%20Tower!5e0!3m2!1sen!2sin!4v1777037844888!5m2!1sen!2sin" class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
