<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?> - Perpustakaan</title>
    
    <!-- Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Alpine & Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #c1c1c1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #a8a8a8; }
        
        /* Active Sidebar Link Style */
        .sidebar-active {
            background-color: #2563EB; /* Blue-600 */
            color: white;
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
        }
        .sidebar-inactive {
            color: #4B5563; /* Gray-600 */
        }
        .sidebar-inactive:hover {
            background-color: #F3F4F6; /* Gray-100 */
            color: #111827;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased" x-data="{ sidebarOpen: false, sidebarMinimized: false }">
<div class="flex h-screen overflow-hidden">
