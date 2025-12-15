<?php
// Define active menu for sidebar
$data['active_menu'] = 'dashboard';
require_once '../app/views/templates/header.php';
require_once '../app/views/templates/sidebar.php';
?>

<div class="flex-1 flex flex-col overflow-hidden bg-gray-50">
    <!-- Topbar -->
    <header class="flex justify-between items-center py-5 px-8 bg-white border-b border-gray-100">
        <div class="flex items-center w-full max-w-xl">
             <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden mr-4">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <div class="relative w-full">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </span>
                <input class="w-full bg-gray-100 text-gray-700 border-0 rounded-lg py-2.5 pl-10 pr-4 focus:ring-0 focus:bg-white focus:shadow-sm transition-all text-sm placeholder-gray-400 font-medium" type="text" placeholder="Search or type a command (Ctrl + F)">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <span class="text-gray-400 text-xs font-bold border border-gray-300 rounded px-1.5 py-0.5">⌘ F</span>
                </div>
            </div>
        </div>
        
        <div class="flex items-center space-x-4">
             <button class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow-sm flex items-center transition-colors">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                New Project
             </button>
             <div class="h-9 w-9 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 font-bold overflow-hidden border border-gray-200">
                 <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['user_name']); ?>&background=random" alt="Avatar" class="w-full h-full object-cover">
             </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1"><?= date('l, d F'); ?></p>
                <h2 class="text-3xl font-bold text-gray-800">Good Evening! <?= explode(' ', $_SESSION['user_name'])[0]; ?>,</h2>
            </div>
            <div class="flex space-x-3 mt-4 md:mt-0">
                 <button class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-lg text-sm font-medium shadow-sm transition-colors flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                    Share
                 </button>
                 <button class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-lg text-sm font-medium shadow-sm transition-colors flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                    Add Task
                 </button>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-2 flex flex-col md:flex-row divide-y md:divide-y-0 md:divide-x divide-gray-100 mb-10">
            <div class="flex-1 p-6 flex items-center">
                <div class="p-3 bg-gray-50 rounded-full text-gray-600 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                     <p class="text-3xl font-bold text-gray-900">12<span class="text-lg text-gray-400 font-normal">hrs</span></p>
                     <p class="text-xs text-gray-400 font-semibold tracking-wide uppercase mt-1">Time Saved</p>
                </div>
            </div>
            <div class="flex-1 p-6 flex items-center">
                <div class="p-3 bg-gray-50 rounded-full text-gray-600 mr-4">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                     <p class="text-3xl font-bold text-gray-900">24</p>
                     <p class="text-xs text-gray-400 font-semibold tracking-wide uppercase mt-1">Projects Completed</p>
                </div>
            </div>
            <div class="flex-1 p-6 flex items-center">
                <div class="p-3 bg-gray-50 rounded-full text-gray-600 mr-4">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                </div>
                <div>
                     <p class="text-3xl font-bold text-gray-900">7</p>
                     <p class="text-xs text-gray-400 font-semibold tracking-wide uppercase mt-1">Projects In-Progress</p>
                </div>
            </div>
        </div>

        <!-- Content Split -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left: Main List -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center space-x-4">
                        <h3 class="text-lg font-bold text-gray-800">My Projects</h3>
                        <div class="relative">
                            <button class="flex items-center text-xs font-semibold text-gray-500 bg-gray-50 px-3 py-1.5 rounded-lg hover:bg-gray-100 transition">
                                This Week <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                        </div>
                    </div>
                    <button class="text-sm font-semibold text-gray-500 hover:text-gray-800 bg-gray-50 px-4 py-2 rounded-lg transition">See All</button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-xs uppercase tracking-wide text-gray-400 border-b border-gray-100">
                                <th class="pb-3 font-semibold pl-2">Task Name</th>
                                <th class="pb-3 font-semibold">Assign</th>
                                <th class="pb-3 font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody class="align-top">
                            <!-- Dummy Item 1 -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 pl-2">
                                    <p class="font-semibold text-gray-800 text-sm">Help DStudio get more customers</p>
                                    <div class="flex items-center space-x-3 mt-1 text-xs text-gray-400">
                                        <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> 07</span>
                                        <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg> 2</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                     <div class="flex items-center">
                                        <div class="w-6 h-6 rounded-full bg-indigo-100 flex items-center justify-center text-xs text-indigo-600 font-bold mr-2">PW</div>
                                        <span class="text-sm font-medium text-gray-700">Phoenix Winters</span>
                                     </div>
                                </td>
                                <td class="py-4">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-600">In Progress</span>
                                </td>
                            </tr>
                            <!-- Dummy Item 2 -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 pl-2">
                                    <p class="font-semibold text-gray-800 text-sm">Plan a trip</p>
                                    <div class="flex items-center space-x-3 mt-1 text-xs text-gray-400">
                                        <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> 10</span>
                                        <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg> 3</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                     <div class="flex items-center">
                                        <div class="w-6 h-6 rounded-full bg-purple-100 flex items-center justify-center text-xs text-purple-600 font-bold mr-2">CM</div>
                                        <span class="text-sm font-medium text-gray-700">Cohen Merritt</span>
                                     </div>
                                </td>
                                <td class="py-4">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-600">Pending</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Right: Schedule/Notes -->
            <div class="space-y-8">
                 <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                     <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center"><svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg> Schedule</h3>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/></svg>
                     </div>
                     <!-- Micro Calendar -->
                     <div class="flex justify-between mb-6 text-center">
                         <?php for($i=0; $i<5; $i++): $d = date('Y-m-d', strtotime("+$i days")); $day = date('D', strtotime($d)); $num = date('d', strtotime($d)); $active=$i==2; ?>
                            <div class="flex flex-col items-center cursor-pointer">
                                <span class="text-xs text-gray-500 font-medium mb-1"><?= substr($day, 0, 2); ?></span>
                                <span class="<?= $active ? 'bg-purple-500 text-white shadow-lg' : 'text-gray-800 hover:bg-gray-100'; ?> w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold transition"><?= $num; ?></span>
                            </div>
                         <?php endfor; ?>
                     </div>
                 </div>

                 <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                      <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center"><svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg> Notes</h3>
                     </div>
                     <div class="space-y-4">
                         <div class="flex items-start">
                             <div class="w-4 h-4 rounded-full border-2 border-gray-300 mt-1 mr-3"></div>
                             <div>
                                 <p class="text-sm font-bold text-gray-800">Landing Page For Website</p>
                                 <p class="text-xs text-gray-500 mt-1 leading-relaxed">To get started on a landing page, could you...</p>
                             </div>
                         </div>
                     </div>
                 </div>
            </div>
        </div>

    </main>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
