<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Marinexa Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Lato:wght@300;400&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Additional Styles -->
    <style>
        /* Ripple effect for mobile navigation */
        nav a {
            position: relative;
            overflow: hidden;
        }
        
        .ripple {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }
        
        @keyframes ripple {
            to {
                transform: scale(2.5);
                opacity: 0;
            }
        }
        
        /* Bottom Navigation Items */
        .nav-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 4px 0;
            color: white;
            text-decoration: none;
            position: relative;
        }
        
        .nav-icon {
            width: 24px;
            height: 24px;
            margin-bottom: 4px;
        }
        
        .nav-text {
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: -0.01em;
        }
        
        .active-nav-item {
            color: #9FE870; /* accent-light-green */
        }
        
        .active-nav-item::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 3px;
            background-color: #9FE870;
            border-radius: 3px;
        }
        
        /* Menu Items */
        .menu-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 12px 8px;
            border-radius: 8px;
            transition: background-color 0.2s;
        }
        
        .menu-item:hover {
            background-color: #F8FAFC; /* background-light-grey */
        }
        
        .menu-icon-container {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 8px;
        }
        
        .menu-icon {
            width: 24px;
            height: 24px;
        }
        
        .menu-label {
            font-size: 0.75rem;
            font-weight: 500;
            color: #4B5563; /* gray-600 */
        }
        
        /* Mobile app style transitions */
        .page-transition {
            animation: fadeIn 0.2s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="font-poppins antialiased bg-background-light-grey text-gray-800 flex min-h-screen">
    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 z-20 hidden w-64 overflow-y-auto bg-primary-blue md:block">
        <div class="py-4">
            <div class="px-4 mb-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                    <img src="{{ asset('images/logo-white.png') }}" alt="Marinexa Shipping" class="h-10">
                </a>
            </div>
            
            <nav class="mt-5 px-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-3 text-white rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-secondary-green' : 'hover:bg-primary-blue-light' }}">
                    <i data-lucide="layout-dashboard" class="mr-3 h-5 w-5"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="{{ route('admin.leads.index') }}" class="group flex items-center px-4 py-3 text-white rounded-md {{ request()->routeIs('admin.leads.*') ? 'bg-secondary-green' : 'hover:bg-primary-blue-light' }}">
                    <i data-lucide="users" class="mr-3 h-5 w-5"></i>
                    <span>Leads</span>
                </a>
                
                <a href="{{ route('admin.users.index') }}" class="group flex items-center px-4 py-3 text-white rounded-md {{ request()->routeIs('admin.users.*') ? 'bg-secondary-green' : 'hover:bg-primary-blue-light' }}">
                    <i data-lucide="user-cog" class="mr-3 h-5 w-5"></i>
                    <span>Users</span>
                </a>
                
                <a href="{{ route('admin.reports.leads') }}" class="group flex items-center px-4 py-3 text-white rounded-md {{ request()->routeIs('admin.reports.leads') ? 'bg-secondary-green' : 'hover:bg-primary-blue-light' }}">
                    <i data-lucide="bar-chart-2" class="mr-3 h-5 w-5"></i>
                    <span>Leads Report</span>
                </a>
                
                <a href="{{ route('admin.reports.performance') }}" class="group flex items-center px-4 py-3 text-white rounded-md {{ request()->routeIs('admin.reports.performance') ? 'bg-secondary-green' : 'hover:bg-primary-blue-light' }}">
                    <i data-lucide="activity" class="mr-3 h-5 w-5"></i>
                    <span>Performance</span>
                </a>
            </nav>
            
            <div class="px-4 mt-12">
                <div class="border-t border-primary-blue-light pt-4">
                    <a href="{{ route('home') }}" class="group flex items-center px-4 py-3 text-white rounded-md hover:bg-primary-blue-light" target="_blank">
                        <i data-lucide="external-link" class="mr-3 h-5 w-5"></i>
                        <span>View Website</span>
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left group flex items-center px-4 py-3 text-white rounded-md hover:bg-primary-blue-light">
                            <i data-lucide="log-out" class="mr-3 h-5 w-5"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    <!-- Mobile sidebar overlay -->
    <div class="fixed inset-0 z-10 hidden bg-gray-900 opacity-50" id="sidebarOverlay"></div>

    <!-- Mobile header -->
    <div class="md:hidden fixed top-0 left-0 right-0 z-30 bg-primary-blue shadow-md h-16">
        <div class="flex items-center justify-between px-4 h-full">
            <div class="flex items-center">
                <button id="sidebarToggle" class="text-white focus:outline-none mr-3">
                    <i data-lucide="menu" class="h-6 w-6"></i>
                </button>
                
                <div class="text-white text-lg font-semibold">
                    {{ request()->routeIs('admin.dashboard') ? 'Dashboard' : '' }}
                    {{ request()->routeIs('admin.leads.*') ? 'Leads' : '' }}
                    {{ request()->routeIs('admin.users.*') ? 'Users' : '' }}
                    {{ request()->routeIs('admin.reports.*') ? 'Reports' : '' }}
                </div>
            </div>
            
            <div class="relative">
                <button id="userMenuButton" class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-secondary-green">
                    <div class="h-8 w-8 rounded-full bg-secondary-green flex items-center justify-center text-white font-semibold text-sm">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </button>
                
                <!-- User dropdown menu -->
                <div id="userDropdown" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                    <div class="py-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile sidebar -->
    <aside id="mobileSidebar" class="fixed inset-y-0 left-0 z-30 w-64 bg-primary-blue transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden">
        <div class="py-4">
            <div class="px-4 mb-6 flex items-center justify-between">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                    <img src="{{ asset('images/logo-white.png') }}" alt="Marinexa Shipping" class="h-10">
                </a>
                <button id="closeSidebar" class="text-white">
                    <i data-lucide="x" class="h-6 w-6"></i>
                </button>
            </div>
            
            <nav class="mt-5 px-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-3 text-white rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-secondary-green' : 'hover:bg-primary-blue-light' }}">
                    <i data-lucide="layout-dashboard" class="mr-3 h-5 w-5"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="{{ route('admin.leads.index') }}" class="group flex items-center px-4 py-3 text-white rounded-md {{ request()->routeIs('admin.leads.*') ? 'bg-secondary-green' : 'hover:bg-primary-blue-light' }}">
                    <i data-lucide="users" class="mr-3 h-5 w-5"></i>
                    <span>Leads</span>
                </a>
                
                <a href="{{ route('admin.users.index') }}" class="group flex items-center px-4 py-3 text-white rounded-md {{ request()->routeIs('admin.users.*') ? 'bg-secondary-green' : 'hover:bg-primary-blue-light' }}">
                    <i data-lucide="user-cog" class="mr-3 h-5 w-5"></i>
                    <span>Users</span>
                </a>
                
                <a href="{{ route('admin.reports.leads') }}" class="group flex items-center px-4 py-3 text-white rounded-md {{ request()->routeIs('admin.reports.leads') ? 'bg-secondary-green' : 'hover:bg-primary-blue-light' }}">
                    <i data-lucide="bar-chart-2" class="mr-3 h-5 w-5"></i>
                    <span>Leads Report</span>
                </a>
                
                <a href="{{ route('admin.reports.performance') }}" class="group flex items-center px-4 py-3 text-white rounded-md {{ request()->routeIs('admin.reports.performance') ? 'bg-secondary-green' : 'hover:bg-primary-blue-light' }}">
                    <i data-lucide="activity" class="mr-3 h-5 w-5"></i>
                    <span>Performance</span>
                </a>
            </nav>
            
            <div class="px-4 mt-12">
                <div class="border-t border-primary-blue-light pt-4">
                    <a href="{{ route('home') }}" class="group flex items-center px-4 py-3 text-white rounded-md hover:bg-primary-blue-light" target="_blank">
                        <i data-lucide="external-link" class="mr-3 h-5 w-5"></i>
                        <span>View Website</span>
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left group flex items-center px-4 py-3 text-white rounded-md hover:bg-primary-blue-light">
                            <i data-lucide="log-out" class="mr-3 h-5 w-5"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col md:pl-64">
        <!-- Top bar -->
        <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow-sm md:block hidden">
            <div class="flex-1 px-4 flex justify-between">
                <div class="flex-1 flex items-center">
                    <h2 class="text-2xl font-bold text-primary-blue">@yield('title', 'Admin Dashboard')</h2>
                </div>
                <div class="ml-4 flex items-center md:ml-6">
                    <div class="ml-3 relative">
                        <div class="flex items-center space-x-3">
                            <span class="text-sm text-gray-700">{{ auth()->user()->name }}</span>
                            <button id="desktopUserMenuButton" class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-secondary-green">
                                <div class="h-8 w-8 rounded-full bg-primary-blue flex items-center justify-center text-white font-semibold text-sm">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                            </button>
                        </div>
                        
                        <!-- Desktop user dropdown menu -->
                        <div id="desktopUserDropdown" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content area -->
        <main class="flex-1 overflow-y-auto pt-16 pb-20 md:pb-0 md:pt-0 page-transition">
            <!-- Flash messages -->
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-secondary-green text-green-800 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            
            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-800 p-4 mb-4" role="alert">
                    <p>{{ session('error') }}</p>
                </div>
            @endif
            
            @if(session('info'))
                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-800 p-4 mb-4" role="alert">
                    <p>{{ session('info') }}</p>
                </div>
            @endif
            
            @yield('content')
        </main>
        
        <!-- Mobile Bottom Navigation Bar - Built From Scratch -->
        <div class="md:hidden fixed bottom-0 left-0 right-0 z-30 bg-primary-blue">
            <!-- Bottom Nav Shadow Overlay -->
            <div class="absolute -top-4 left-0 right-0 h-4 bg-gradient-to-t from-black/20 to-transparent"></div>
            
            <!-- Main Navigation Container -->
            <div class="flex h-16 relative">
                <!-- Dashboard Button -->
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active-nav-item' : '' }}">
                    <i data-lucide="layout-dashboard" class="nav-icon"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                
                <!-- Leads Button -->
                <a href="{{ route('admin.leads.index') }}" class="nav-item {{ request()->routeIs('admin.leads.*') ? 'active-nav-item' : '' }}">
                    <i data-lucide="users" class="nav-icon"></i>
                    <span class="nav-text">Leads</span>
                </a>
                
                <!-- Center Action Button -->
                <div class="flex-1 flex justify-center relative">
                    <button id="bottomMenuToggle" class="absolute -top-6 w-16 h-16 rounded-full bg-secondary-green flex items-center justify-center shadow-lg border-4 border-primary-blue text-dark-navy">
                        <i data-lucide="plus" class="h-8 w-8"></i>
                    </button>
                </div>
                
                <!-- Reports Button -->
                <a href="{{ route('admin.reports.performance') }}" class="nav-item {{ request()->routeIs('admin.reports.*') ? 'active-nav-item' : '' }}">
                    <i data-lucide="bar-chart-2" class="nav-icon"></i>
                    <span class="nav-text">Reports</span>
                </a>
                
                <!-- Users Button -->
                <a href="{{ route('admin.users.index') }}" class="nav-item {{ request()->routeIs('admin.users.*') ? 'active-nav-item' : '' }}">
                    <i data-lucide="user-cog" class="nav-icon"></i>
                    <span class="nav-text">Users</span>
                </a>
            </div>
        </div>
        
        <!-- Action Menu Modal - Rebuilt -->
        <div id="bottomMenuModal" class="fixed inset-0 z-40 hidden">
            <!-- Dark Overlay -->
            <div class="absolute inset-0 bg-black/70"></div>
            
            <!-- Modal Content -->
            <div class="absolute bottom-20 mx-4 bg-white rounded-xl shadow-lg border-2 border-primary-blue">
                <!-- Menu Grid -->
                <div class="grid grid-cols-3 gap-2 p-4">
                    <a href="{{ route('home') }}" class="menu-item" target="_blank">
                        <div class="menu-icon-container bg-primary-blue/10">
                            <i data-lucide="external-link" class="menu-icon text-primary-blue"></i>
                        </div>
                        <span class="menu-label">Website</span>
                    </a>
                    
                    <a href="{{ route('admin.leads.create') }}" class="menu-item">
                        <div class="menu-icon-container bg-secondary-green/10">
                            <i data-lucide="user-plus" class="menu-icon text-secondary-green"></i>
                        </div>
                        <span class="menu-label">Add Lead</span>
                    </a>
                    
                    <a href="{{ route('admin.reports.leads') }}" class="menu-item">
                        <div class="menu-icon-container bg-amber-500/10">
                            <i data-lucide="file-text" class="menu-icon text-amber-500"></i>
                        </div>
                        <span class="menu-label">Reports</span>
                    </a>
                </div>
                
                <!-- Logout Section -->
                <div class="border-t border-gray-200 p-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                            <i data-lucide="log-out" class="h-5 w-5 mr-2"></i>
                            <span class="font-medium">Logout</span>
                        </button>
                    </form>
                </div>
                
                <!-- Close Button -->
                <button id="closeBottomMenu" class="absolute -top-12 right-2 bg-primary-blue text-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg">
                    <i data-lucide="x" class="h-5 w-5"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile sidebar toggle
            const sidebarToggle = document.getElementById('sidebarToggle');
            const closeSidebar = document.getElementById('closeSidebar');
            const mobileSidebar = document.getElementById('mobileSidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    mobileSidebar.classList.toggle('-translate-x-full');
                    sidebarOverlay.classList.toggle('hidden');
                });
            }
            
            if (closeSidebar) {
                closeSidebar.addEventListener('click', function() {
                    mobileSidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                });
            }
            
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', function() {
                    mobileSidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                });
            }
            
            // User dropdown menus
            const userMenuButton = document.getElementById('userMenuButton');
            const userDropdown = document.getElementById('userDropdown');
            const desktopUserMenuButton = document.getElementById('desktopUserMenuButton');
            const desktopUserDropdown = document.getElementById('desktopUserDropdown');
            
            if (userMenuButton && userDropdown) {
                userMenuButton.addEventListener('click', function() {
                    userDropdown.classList.toggle('hidden');
                });
            }
            
            if (desktopUserMenuButton && desktopUserDropdown) {
                desktopUserMenuButton.addEventListener('click', function() {
                    desktopUserDropdown.classList.toggle('hidden');
                });
            }
            
            // Bottom navigation menu toggle
            const bottomMenuToggle = document.getElementById('bottomMenuToggle');
            const bottomMenuModal = document.getElementById('bottomMenuModal');
            const closeBottomMenu = document.getElementById('closeBottomMenu');
            
            if (bottomMenuToggle && bottomMenuModal) {
                bottomMenuToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    bottomMenuModal.classList.toggle('hidden');
                    document.body.classList.toggle('overflow-hidden'); // Prevent scrolling when modal is open
                });
            }
            
            if (closeBottomMenu) {
                closeBottomMenu.addEventListener('click', function() {
                    bottomMenuModal.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                });
            }
            
            // Close modal when clicking the overlay
            if (bottomMenuModal) {
                bottomMenuModal.addEventListener('click', function(e) {
                    if (e.target === bottomMenuModal) {
                        bottomMenuModal.classList.add('hidden');
                        document.body.classList.remove('overflow-hidden');
                    }
                });
            }
            
            // Add ripple effect to bottom nav items
            const navLinks = document.querySelectorAll('nav a');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Skip ripple effect for bottom menu toggle
                    if (this.id === 'bottomMenuToggle') return;
                    
                    const ripple = document.createElement('span');
                    const diameter = Math.max(this.clientWidth, this.clientHeight);
                    
                    ripple.style.width = ripple.style.height = `${diameter}px`;
                    ripple.style.left = `${e.clientX - this.getBoundingClientRect().left - diameter / 2}px`;
                    ripple.style.top = `${e.clientY - this.getBoundingClientRect().top - diameter / 2}px`;
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
            
            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                if (userMenuButton && !userMenuButton.contains(event.target) && userDropdown && !userDropdown.contains(event.target)) {
                    userDropdown.classList.add('hidden');
                }
                
                if (desktopUserMenuButton && !desktopUserMenuButton.contains(event.target) && desktopUserDropdown && !desktopUserDropdown.contains(event.target)) {
                    desktopUserDropdown.classList.add('hidden');
                }
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>
