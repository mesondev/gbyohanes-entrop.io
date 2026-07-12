<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gereja Baptis Yohanes Entrop - Jayapura, Papua')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js CDN (Deferred for performance) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Tailwind Custom Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'sans-serif'],
                        display: ['Space Grotesk', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    }
                }
            }
        }
    </script>

    <!-- Custom Global Styles (Exact matching background and selection) -->
    <style>
        [x-cloak] { display: none !important; }
        
        ::selection {
            background-color: #1e3a8a; /* bg-blue-900 */
            color: #ffffff;
        }
        
        body {
            background-color: #f8fafc; /* slate-50 */
            font-family: 'Inter', sans-serif;
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
    
    @yield('styles')
</head>
<body class="min-h-screen bg-slate-50 flex flex-col justify-between" x-data="{ mobileMenuOpen: false }">

    <div>
        <!-- Navigation Header -->
        @include('partials.navbar')

        <!-- Main Content Area -->
        <main class="relative overflow-hidden min-h-[60vh]">
            @yield('content')
        </main>
    </div>

    <!-- Footer Area -->
    @include('partials.footer')

    <!-- Initialize Lucide Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
        });
    </script>
    
    @yield('scripts')
</body>
</html>
