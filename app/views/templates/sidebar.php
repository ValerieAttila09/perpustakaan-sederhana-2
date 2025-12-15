<!-- Sidebar -->
<aside 
    :class="[
        sidebarOpen ? 'translate-x-0' : '-translate-x-full',
        sidebarMinimized ? 'lg:w-20' : 'lg:w-64'
    ]" 
    class="transform overflow-x-hidden lg:translate-x-0 fixed lg:static inset-y-0 left-0 z-20 bg-white border-r border-gray-100 transition-all duration-300 ease-in-out h-full overflow-y-auto hidden lg:flex flex-col">
    
    <!-- Logo -->
    <div class="w-auto h-20 flex items-center border-b border-gray-50 transition-all duration-300" :class="sidebarMinimized ? 'justify-center px-0' : 'px-8'">
        <h1 class="font-bold text-gray-900 tracking-tight transition-all duration-300" :class="sidebarMinimized ? 'text-xl' : 'text-2xl'">
            <span x-show="!sidebarMinimized" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100">Mondays</span>
            <span x-show="sidebarMinimized" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" style="display: none;">M</span>
        </h1>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 py-6 space-y-2 overflow-x-hidden">
        <p x-show="!sidebarMinimized" class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4 transition-opacity duration-300 whitespace-nowrap">Main Menu</p>
        <div x-show="sidebarMinimized" class="h-4"></div> <!-- Spacer when minimized -->
        
        <!-- Dashboard Utils -->
        <?php 
            // Helper function for active class
            function getMenuClass($active, $menu) {
                return ($active == $menu) ? 'sidebar-active' : 'sidebar-inactive';
            }
        ?>

        <a href="<?= BASEURL; ?>/dashboard" 
           class="flex items-center py-3 text-sm font-medium rounded-xl transition-all duration-200 group relative"
           :class="sidebarMinimized ? 'justify-center mx-2 px-0' : 'px-4 mx-2 <?= getMenuClass($data['active_menu'], 'dashboard'); ?>'"
           <?= $data['active_menu'] == 'dashboard' ? ':class="sidebarMinimized ? \'bg-blue-600 text-white\' : \'\'"' : ''; ?>
           >
            <svg class="w-5 h-5 transition-all duration-300" :class="sidebarMinimized ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            <span x-show="!sidebarMinimized" class="whitespace-nowrap transition-opacity duration-300">Dashboard</span>
            
            <!-- Tooltip for minimized -->
            <div x-show="sidebarMinimized" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity z-50 pointer-events-none whitespace-nowrap">Dashboard</div>
        </a>

        <a href="<?= BASEURL; ?>/book" 
           class="flex items-center py-3 text-sm font-medium rounded-xl transition-all duration-200 group relative"
           :class="sidebarMinimized ? 'justify-center mx-2 px-0' : 'px-4 mx-2 <?= getMenuClass($data['active_menu'], 'book'); ?>'"
           <?= $data['active_menu'] == 'book' ? ':class="sidebarMinimized ? \'bg-blue-600 text-white\' : \'\'"' : ''; ?>
           >
            <svg class="w-5 h-5 transition-all duration-300" :class="sidebarMinimized ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <span x-show="!sidebarMinimized" class="whitespace-nowrap transition-opacity duration-300">Projects (Books)</span>
             <div x-show="sidebarMinimized" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity z-50 pointer-events-none whitespace-nowrap">Books</div>
        </a>

        <a href="<?= BASEURL; ?>/member" 
           class="flex items-center py-3 text-sm font-medium rounded-xl transition-all duration-200 group relative"
           :class="sidebarMinimized ? 'justify-center mx-2 px-0' : 'px-4 mx-2 <?= getMenuClass($data['active_menu'], 'member'); ?>'"
           <?= $data['active_menu'] == 'member' ? ':class="sidebarMinimized ? \'bg-blue-600 text-white\' : \'\'"' : ''; ?>
           >
            <svg class="w-5 h-5 transition-all duration-300" :class="sidebarMinimized ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            <span x-show="!sidebarMinimized" class="whitespace-nowrap transition-opacity duration-300">Members</span>
             <div x-show="sidebarMinimized" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity z-50 pointer-events-none whitespace-nowrap">Members</div>
        </a>

        <a href="<?= BASEURL; ?>/loan" 
           class="flex items-center py-3 text-sm font-medium rounded-xl transition-all duration-200 group relative"
           :class="sidebarMinimized ? 'justify-center mx-2 px-0' : 'px-4 mx-2 <?= getMenuClass($data['active_menu'], 'loan'); ?>'"
           <?= $data['active_menu'] == 'loan' ? ':class="sidebarMinimized ? \'bg-blue-600 text-white\' : \'\'"' : ''; ?>
           >
             <svg class="w-5 h-5 transition-all duration-300" :class="sidebarMinimized ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            <span x-show="!sidebarMinimized" class="whitespace-nowrap transition-opacity duration-300">Loans</span>
             <div x-show="sidebarMinimized" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity z-50 pointer-events-none whitespace-nowrap">Loans</div>
        </a>

        <a href="<?= BASEURL; ?>/calendar" 
           class="flex items-center py-3 text-sm font-medium rounded-xl transition-all duration-200 group relative"
            :class="sidebarMinimized ? 'justify-center mx-2 px-0' : 'px-4 mx-2 <?= getMenuClass($data['active_menu'], 'calendar'); ?>'"
            <?= $data['active_menu'] == 'calendar' ? ':class="sidebarMinimized ? \'bg-blue-600 text-white\' : \'\'"' : ''; ?>
           >
            <svg class="w-5 h-5 transition-all duration-300" :class="sidebarMinimized ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <span x-show="!sidebarMinimized" class="whitespace-nowrap transition-opacity duration-300">Calendar</span>
             <div x-show="sidebarMinimized" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity z-50 pointer-events-none whitespace-nowrap">Calendar</div>
        </a>
    </nav>
    
    <!-- Collpase Toggle -->
    <div class="px-4 py-2 border-t border-gray-50 flex" :class="sidebarMinimized ? 'justify-center' : 'justify-end'">
        <button @click="sidebarMinimized = !sidebarMinimized" class="p-2 rounded-lg bg-gray-50 text-gray-500 hover:text-blue-600 hover:bg-blue-50 transition-colors focus:outline-none">
            <svg class="w-5 h-5 transition-transform duration-300" :class="sidebarMinimized ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/></svg>
        </button>
    </div>

    <!-- Bottom Actions -->
    <div class="px-6 py-4 border-t border-gray-50" :class="sidebarMinimized ? 'px-2 flex justify-center' : 'px-6'">
        <a href="<?= BASEURL; ?>/auth/logout" class="flex items-center text-sm font-medium text-gray-500 hover:text-red-500 transition-colors group relative">
            <svg class="w-5 h-5 transition-all duration-300" :class="sidebarMinimized ? 'mr-0' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            <span x-show="!sidebarMinimized" class="whitespace-nowrap transition-opacity duration-300">Log Out</span>
            <div x-show="sidebarMinimized" class="absolute left-full ml-2 px-2 py-1 bg-gray-900 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity z-50 pointer-events-none whitespace-nowrap">Log Out</div>
        </a>
    </div>
</aside>

<!-- Mobile Sidebar Overlay (optional implementation) -->
<div x-show="sidebarOpen" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden" @click="sidebarOpen = false" style="display: none;"></div>
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition-transform duration-300 transform bg-white lg:hidden">
    <!-- Same minimal content for mobile -->
    <div class="h-16 flex items-center justify-center border-b font-bold text-xl">Mondays</div>
    <nav class="mt-4 px-2 space-y-2">
        <a href="<?= BASEURL; ?>/dashboard" class="block py-2.5 px-4 rounded hover:bg-gray-100">Dashboard</a>
        <a href="<?= BASEURL; ?>/book" class="block py-2.5 px-4 rounded hover:bg-gray-100">Books</a>
        <a href="<?= BASEURL; ?>/member" class="block py-2.5 px-4 rounded hover:bg-gray-100">Members</a>
        <a href="<?= BASEURL; ?>/loan" class="block py-2.5 px-4 rounded hover:bg-gray-100">Loans</a>
        <a href="<?= BASEURL; ?>/calendar" class="block py-2.5 px-4 rounded hover:bg-gray-100">Calendar</a>
        <a href="<?= BASEURL; ?>/auth/logout" class="block py-2.5 px-4 rounded text-red-500 hover:bg-red-50">Logout</a>
    </nav>
</aside>
