<?php
session_start();
require_once '../config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_user'] = $user['username'];
            $_SESSION['admin_name'] = $user['full_name'];
            
            header('Location: index.php');
            exit;
        } else {
            $error = 'Invalid username or password.';
        }
    } else {
        $error = 'Please enter both username and password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Real Estate Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            lime: '#CBFF54',
                            teal: '#063231',
                        },
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&family=Outfit:wght@800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-heading { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-brand-teal min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full">
        <div class="text-center mb-10">
            <div class="flex items-center justify-center gap-3 mb-6">
                <i class="ph-bold ph-caret-up text-brand-lime text-5xl"></i>
                <h2 class="text-3xl font-heading tracking-tighter uppercase text-white leading-none">
                    <span class="font-light">Real</span> <span class="font-black text-brand-lime">Estate</span>
                </h2>
            </div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Admin Portal Access</h1>
            <p class="text-white/50 text-sm mt-2 font-medium">Please enter your credentials to manage properties.</p>
        </div>

        <div class="bg-white/10 backdrop-blur-3xl border border-white/10 p-10 rounded-[2.5rem] shadow-2xl">
            <?php if ($error): ?>
                <div class="bg-red-500/20 border border-red-500/50 text-red-200 text-xs font-bold p-4 rounded-xl mb-6 flex items-center gap-3">
                    <i class="ph-bold ph-warning-circle text-lg"></i>
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST" class="space-y-6">
                <div>
                    <label class="block text-[10px] font-black uppercase text-brand-lime tracking-[3px] mb-3 ml-1">Username</label>
                    <div class="relative">
                        <i class="ph ph-user absolute left-5 top-1/2 -translate-y-1/2 text-white/30 text-xl"></i>
                        <input type="text" name="username" required 
                            class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 pl-14 pr-6 text-white outline-none focus:border-brand-lime focus:ring-1 focus:ring-brand-lime transition-all"
                            placeholder="admin">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase text-brand-lime tracking-[3px] mb-3 ml-1">Password</label>
                    <div class="relative">
                        <i class="ph ph-lock-key absolute left-5 top-1/2 -translate-y-1/2 text-white/30 text-xl"></i>
                        <input type="password" name="password" required 
                            class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 pl-14 pr-6 text-white outline-none focus:border-brand-lime focus:ring-1 focus:ring-brand-lime transition-all"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                        class="w-full bg-brand-lime text-brand-teal font-black py-5 rounded-2xl shadow-xl shadow-brand-lime/20 hover:scale-[1.02] active:scale-95 transition-all uppercase tracking-widest text-sm">
                        Unlock Dashboard
                    </button>
                </div>
            </form>
        </div>

        <div class="text-center mt-8">
            <a href="../index.php" class="text-white/40 hover:text-brand-lime text-xs font-bold uppercase tracking-widest transition-all">
                <i class="ph ph-arrow-left mr-2"></i> Back to Live Site
            </a>
        </div>
    </div>
</body>
</html>
