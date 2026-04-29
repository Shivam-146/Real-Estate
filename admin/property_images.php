<?php
$adminTitle = "Property Gallery";
require_once __DIR__ . '/../config/db.php';

// Ensure table exists
try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS property_images (
        id INT AUTO_INCREMENT PRIMARY KEY,
        property_id INT NOT NULL,
        image_url VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (property_id) REFERENCES properties(id) ON DELETE CASCADE
    );");
} catch (PDOException $e) {
    // Ignore error if it already exists or handle it
}

$propertyId = $_GET['id'] ?? null;
$message = "";
$error = "";

if (!$propertyId) {
    header("Location: properties.php");
    exit();
}

// Fetch property details
try {
    $stmt = $pdo->prepare("SELECT name FROM properties WHERE id = ?");
    $stmt->execute([$propertyId]);
    $property = $stmt->fetch();
    if (!$property) {
        header("Location: properties.php");
        exit();
    }
} catch (PDOException $e) {
    header("Location: properties.php");
    exit();
}

// Handle Upload / Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'upload_image') {
        $successCount = 0;
        
        if (isset($_POST['compressed_images']) && !empty($_POST['compressed_images'])) {
            $imagesData = json_decode($_POST['compressed_images'], true);
            if (is_array($imagesData)) {
                $upload_dir = __DIR__ . '/../img/properties/gallery/';
                if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
                
                foreach ($imagesData as $data) {
                    if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
                        $data = substr($data, strpos($data, ',') + 1);
                        $type = strtolower($type[1]);
                        $data = base64_decode($data);
                        
                        if ($data !== false) {
                            $new_filename = uniqid('gal_') . '.' . $type;
                            $upload_path = $upload_dir . $new_filename;
                            
                            if (file_put_contents($upload_path, $data)) {
                                $image_url = 'img/properties/gallery/' . $new_filename;
                                
                                try {
                                    $stmt = $pdo->prepare("INSERT INTO property_images (property_id, image_url) VALUES (?, ?)");
                                    $stmt->execute([$propertyId, $image_url]);
                                    $successCount++;
                                } catch (PDOException $e) {
                                    $error = "Database error: " . $e->getMessage();
                                }
                            }
                        }
                    }
                }
            }
        } elseif (isset($_FILES['images']) && is_array($_FILES['images']['error'])) {
            $upload_dir = __DIR__ . '/../img/properties/gallery/';
            if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
            
            foreach ($_FILES['images']['error'] as $key => $error_code) {
                if ($error_code === UPLOAD_ERR_OK) {
                    $file_ext = pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION);
                    $new_filename = uniqid('gal_') . '.' . $file_ext;
                    $upload_path = $upload_dir . $new_filename;

                    if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $upload_path)) {
                        $image_url = 'img/properties/gallery/' . $new_filename;
                        try {
                            $stmt = $pdo->prepare("INSERT INTO property_images (property_id, image_url) VALUES (?, ?)");
                            $stmt->execute([$propertyId, $image_url]);
                            $successCount++;
                        } catch (PDOException $e) {
                            $error = "Database error: " . $e->getMessage();
                        }
                    }
                }
            }
        } else {
            $error = "Please select at least one image.";
        }

        if ($successCount > 0) {
            $message = "$successCount image(s) added successfully!";
        } elseif (empty($error)) {
            $error = "Failed to upload images.";
        }
    } elseif ($action === 'delete_image') {
        $imageId = $_POST['image_id'] ?? null;
        if ($imageId) {
            try {
                // Get image path to delete file
                $stmt = $pdo->prepare("SELECT image_url FROM property_images WHERE id = ? AND property_id = ?");
                $stmt->execute([$imageId, $propertyId]);
                $imgData = $stmt->fetch();
                
                if ($imgData) {
                    $filePath = __DIR__ . '/../' . $imgData['image_url'];
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                    
                    $stmt = $pdo->prepare("DELETE FROM property_images WHERE id = ?");
                    $stmt->execute([$imageId]);
                    $message = "Image deleted successfully!";
                }
            } catch (PDOException $e) {
                $error = "Delete failed: " . $e->getMessage();
            }
        }
    }
}

// Fetch images
try {
    $stmt = $pdo->prepare("SELECT * FROM property_images WHERE property_id = ? ORDER BY created_at DESC");
    $stmt->execute([$propertyId]);
    $images = $stmt->fetchAll();
} catch (PDOException $e) {
    $images = [];
}

include __DIR__ . '/../common/admin_header.php';
include __DIR__ . '/../common/admin_sidebar.php';
?>

<!-- Header Section -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 mb-16">
    <div>
        <a href="properties.php" class="inline-flex items-center gap-2 text-brand-light font-bold hover:text-brand-blue mb-4 transition-colors"><i class="ph-bold ph-arrow-left"></i> Back to Properties</a>
        <h1 class="text-4xl lg:text-5xl font-heading font-black tracking-tighter text-gradient mb-2">Property Gallery.</h1>
        <p class="text-brand-light font-medium text-lg italic">Manage images for "<?php echo htmlspecialchars($property['name']); ?>"</p>
    </div>
</div>

<?php if ($message): ?>
    <div class="mb-8 p-6 bg-brand-accent text-brand-blue font-bold rounded-2xl flex items-center gap-4">
        <i class="ph-bold ph-check-circle text-2xl"></i>
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<?php if ($error): ?>
    <div class="mb-8 p-6 bg-red-50 text-red-600 font-bold rounded-2xl flex items-center gap-4">
        <i class="ph-bold ph-warning-circle text-2xl"></i>
        <?php echo $error; ?>
    </div>
<?php endif; ?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Upload Form -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-[3rem] p-8 lg:p-10 border border-slate-100 shadow-sm sticky top-28">
            <h2 class="text-2xl font-heading font-black tracking-tighter text-brand-blue mb-6">Upload Image.</h2>
            <form id="uploadForm" action="property_images.php?id=<?php echo $propertyId; ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                <input type="hidden" name="action" value="upload_image">
                
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-brand-light">Select Image(s)</label>
                    <input type="file" name="images[]" id="image" multiple required accept="image/*" class="w-full px-4 py-3 rounded-xl border border-slate-100 bg-slate-50 outline-none text-xs font-bold file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-brand-blue file:text-white hover:file:bg-brand-slate transition-all">
                </div>
                
                <button type="submit" id="submitBtn" class="w-full py-4 bg-brand-blue text-white rounded-2xl font-black uppercase tracking-[2px] text-xs hover:bg-brand-slate shadow-xl shadow-brand-blue/20 transition-all flex justify-center items-center gap-2">
                    <i class="ph-bold ph-upload-simple"></i> Upload
                </button>

                <!-- Progress Bar Container -->
                <div id="progressContainer" class="hidden space-y-2 pt-4">
                    <div class="flex justify-between text-[10px] font-black uppercase tracking-widest text-brand-light">
                        <span id="progressStatus">Processing...</span>
                        <span id="progressPercent">0%</span>
                    </div>
                    <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden">
                        <div id="progressBar" class="h-full bg-brand-blue transition-all duration-300" style="width: 0%"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Image Grid -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-[3rem] p-8 lg:p-12 border border-slate-100 shadow-sm">
            <h2 class="text-2xl font-heading font-black tracking-tighter text-brand-blue mb-10">Gallery Images.</h2>
            
            <?php if (empty($images)): ?>
                <div class="text-center py-16 bg-slate-50 rounded-3xl border border-dashed border-slate-200">
                    <i class="ph-fill ph-image text-6xl text-slate-300 mb-4"></i>
                    <p class="text-brand-light font-bold">No images added to this gallery yet.</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($images as $img): ?>
                        <div class="group relative rounded-3xl overflow-hidden bg-slate-100 shadow-sm border border-slate-100 aspect-video">
                            <img src="../<?php echo htmlspecialchars($img['image_url']); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            
                            <div class="absolute inset-0 bg-brand-blue/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-4 backdrop-blur-[2px]">
                                <button type="button" onclick="openLightbox('../<?php echo htmlspecialchars($img['image_url']); ?>')" class="w-12 h-12 bg-white text-brand-blue rounded-full flex items-center justify-center text-xl shadow-xl hover:bg-brand-accent transition-colors transform hover:scale-110">
                                    <i class="ph-bold ph-magnifying-glass-plus"></i>
                                </button>
                                <form action="property_images.php?id=<?php echo $propertyId; ?>" method="POST" onsubmit="return confirm('Delete this image?');" class="m-0">
                                    <input type="hidden" name="action" value="delete_image">
                                    <input type="hidden" name="image_id" value="<?php echo $img['id']; ?>">
                                    <button type="submit" class="w-12 h-12 bg-red-500 text-white rounded-full flex items-center justify-center text-xl shadow-xl hover:bg-red-600 transition-colors transform hover:scale-110">
                                        <i class="ph-bold ph-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const imageInput = document.getElementById('image');
    const compressedImageInput = document.getElementById('compressedImage');
    const form = document.getElementById('uploadForm');
    const submitBtn = document.getElementById('submitBtn');
    
    const progressContainer = document.getElementById('progressContainer');
    const progressBar = document.getElementById('progressBar');
    const progressStatus = document.getElementById('progressStatus');
    const progressPercent = document.getElementById('progressPercent');
    
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const files = Array.from(imageInput.files);
        if (files.length === 0) return;
        
        submitBtn.disabled = true;
        progressContainer.classList.remove('hidden');

        const compressImage = (file) => {
            return new Promise((resolve) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = (event) => {
                    const img = new Image();
                    img.src = event.target.result;
                    img.onload = () => {
                        const canvas = document.createElement('canvas');
                        const MAX_WIDTH = 1000;
                        let width = img.width;
                        let height = img.height;
                        if (width > MAX_WIDTH) {
                            height *= MAX_WIDTH / width;
                            width = MAX_WIDTH;
                        }
                        canvas.width = width;
                        canvas.height = height;
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0, width, height);
                        canvas.toBlob((b) => resolve(b), 'image/jpeg', 0.6);
                    };
                };
            });
        };
        
        try {
            for (let i = 0; i < files.length; i++) {
                progressStatus.innerText = `Compressing & Uploading ${i + 1}/${files.length}...`;
                
                const blob = await compressImage(files[i]);
                
                const formData = new FormData();
                formData.append('action', 'upload_image');
                formData.append('images[]', blob, `image_${i}.jpg`);

                await new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', form.getAttribute('action') || window.location.href, true);
                    
                    xhr.upload.onprogress = (event) => {
                        if (event.lengthComputable) {
                            const stepBase = (i / files.length) * 100;
                            const stepSize = (1 / files.length) * 100;
                            const uploadPercent = (event.loaded / event.total) * stepSize;
                            const totalPercent = Math.round(stepBase + uploadPercent);
                            progressBar.style.width = totalPercent + '%';
                            progressPercent.innerText = totalPercent + '%';
                        }
                    };

                    xhr.onload = () => {
                        if (xhr.status === 200) resolve();
                        else reject(`Server Error: ${xhr.status}`);
                    };
                    xhr.onerror = () => reject('Network Error');
                    xhr.send(formData);
                });
            }
            
            progressStatus.innerText = 'Success!';
            progressBar.style.width = '100%';
            progressPercent.innerText = '100%';
            setTimeout(() => window.location.reload(), 500);

        } catch (err) {
            alert(`Upload failed at image ${i+1}: ${err}. Try uploading fewer images at once or check your server limits.`);
            submitBtn.disabled = false;
            progressContainer.classList.add('hidden');
        }
    });
});

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

<!-- Lightbox Modal -->
<div id="lightboxModal" class="fixed inset-0 z-[200] hidden flex items-center justify-center p-4 lg:p-10 transition-opacity duration-300 opacity-0">
    <div class="absolute inset-0 bg-brand-blue/95 backdrop-blur-md" onclick="closeLightbox()"></div>
    <button onclick="closeLightbox()" class="absolute top-6 right-6 z-10 w-12 h-12 flex items-center justify-center text-white/50 hover:text-white bg-white/5 hover:bg-white/10 rounded-full transition-all text-2xl">
        <i class="ph ph-x"></i>
    </button>
    <img id="lightboxImage" src="" class="relative z-10 max-w-full max-h-full rounded-2xl shadow-2xl transition-transform duration-500 transform scale-95 object-contain" alt="Preview">
</div>

<?php include '../common/admin_footer.php'; ?>
