<?php
require_once __DIR__ . '/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($adminTitle) ? $adminTitle : 'Admin Dashboard'; ?> | Real Estate Portal</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-blue': '#0f172a',
                        'brand-slate': '#1e293b',
                        'brand-light': '#64748b',
                        'brand-accent': '#CBFF54',
                        'brand-bg': '#f8fafc',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <style type="text/css">
        .sidebar-link { display: flex; align-items: center; gap: 1rem; padding: 1rem 1.5rem; color: #64748b; font-weight: 600; border-radius: 1rem; transition: all 0.3s; }
        .sidebar-link:hover { background-color: rgba(255,255,255,0.05); color: white; }
        .sidebar-link.active { background-color: rgba(255,255,255,0.1); color: #CBFF54; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
        
        .stat-card { background-color: white; padding: 2rem; border-radius: 2.5rem; border: 1px solid #f1f5f9; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); transition: all 0.5s; display: flex; flex-direction: column; justify-content: space-between; }
        .stat-card:hover { box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); transform: translateY(-0.5rem); }
        
        .badge { px: 1rem; padding-top: 0.375rem; padding-bottom: 0.375rem; border-radius: 9999px; font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1em; }
        .quick-action-btn { display: flex; align-items: center; gap: 0.75rem; padding: 1.25rem 2rem; border-radius: 1rem; font-weight: 900; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 2px; transition: all 0.3s; }
    </style>
</head>
<body class="bg-[#f8fafc] font-sans text-[#0f172a] min-h-screen">
