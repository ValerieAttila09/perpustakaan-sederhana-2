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
                <input class="w-full bg-gray-100 text-gray-700 border-0 rounded-lg py-2.5 pl-10 pr-4 focus:ring-0 focus:bg-white focus:shadow-sm transition-all text-sm placeholder-gray-400 font-medium" type="text" placeholder="Search members, books...">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <span class="text-gray-400 text-xs font-bold border border-gray-300 rounded px-1.5 py-0.5">⌘ K</span>
                </div>
            </div>
        </div>
        
        <div class="flex items-center space-x-4">
             <a href="<?= BASEURL; ?>/loan/create" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-lg shadow-sm flex items-center transition-colors">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                New Loan
             </a>
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
                <h2 class="text-3xl font-bold text-gray-800">Good Evening, <?= explode(' ', $_SESSION['user_name'])[0]; ?>!</h2>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-2 flex flex-col md:flex-row divide-y md:divide-y-0 md:divide-x divide-gray-100 mb-10">
            <div class="flex-1 p-6 flex items-center">
                <div class="p-3 bg-blue-50 rounded-full text-blue-600 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <div>
                     <p class="text-3xl font-bold text-gray-900"><?= $data['total_books']; ?></p>
                     <p class="text-xs text-gray-400 font-semibold tracking-wide uppercase mt-1">Total Books</p>
                </div>
            </div>
            <div class="flex-1 p-6 flex items-center">
                <div class="p-3 bg-purple-50 rounded-full text-purple-600 mr-4">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <div>
                     <p class="text-3xl font-bold text-gray-900"><?= $data['total_members']; ?></p>
                     <p class="text-xs text-gray-400 font-semibold tracking-wide uppercase mt-1">Active Members</p>
                </div>
            </div>
            <div class="flex-1 p-6 flex items-center">
                <div class="p-3 bg-yellow-50 rounded-full text-yellow-600 mr-4">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                     <p class="text-3xl font-bold text-gray-900"><?= $data['active_loans']; ?></p>
                     <p class="text-xs text-gray-400 font-semibold tracking-wide uppercase mt-1">Active Loans</p>
                </div>
            </div>
        </div>

        <!-- Content Split -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left: Main List -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center space-x-4">
                        <h3 class="text-lg font-bold text-gray-800">Recent Transactions</h3>
                        <div class="relative">
                            <span class="text-xs font-semibold text-gray-500 bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-100">
                                Latest 5
                            </span>
                        </div>
                    </div>
                    <a href="<?= BASEURL; ?>/loan" class="text-sm font-semibold text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-4 py-2 rounded-lg transition">View All</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-xs uppercase tracking-wide text-gray-400 border-b border-gray-100">
                                <th class="pb-3 font-semibold pl-2">Book</th>
                                <th class="pb-3 font-semibold">Member</th>
                                <th class="pb-3 font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody class="align-top">
                            <?php foreach($data['recent_loans'] as $loan): ?>
                            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="py-4 pl-2">
                                    <div class="flex items-center">
                                         <div class="w-8 h-10 bg-gray-200 rounded overflow-hidden mr-3">
                                            <?php if($loan['cover_image'] && $loan['cover_image'] != 'default.jpg'): ?>
                                                <img src="<?= BASEURL; ?>/uploads/<?= $loan['cover_image']; ?>" class="w-full h-full object-cover">
                                            <?php endif; ?>
                                         </div>
                                         <div>
                                             <p class="font-semibold text-gray-800 text-sm truncate w-40"><?= $loan['book_title']; ?></p>
                                             <p class="text-xs text-gray-400"><?= date('d M', strtotime($loan['loan_date'])); ?></p>
                                         </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                     <div class="flex items-center">
                                        <div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center text-xs text-blue-600 font-bold mr-2">
                                            <?= strtoupper(substr($loan['member_name'], 0, 2)); ?>
                                        </div>
                                        <span class="text-sm font-medium text-gray-700"><?= $loan['member_name']; ?></span>
                                     </div>
                                </td>
                                <td class="py-4">
                                    <?php if($loan['status'] == 'borrowed'): ?>
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-600">Borrowed</span>
                                    <?php else: ?>
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-600">Returned</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Right: Schedule/Notes -->
            <div class="space-y-8">
                 <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                     <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center"><svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg> Upcoming</h3>
                     </div>
                     <!-- Micro Calendar -->
                     <div class="flex justify-between mb-6 text-center">
                         <?php for($i=0; $i<5; $i++): $d = date('Y-m-d', strtotime("+$i days")); $day = date('D', strtotime($d)); $num = date('d', strtotime($d)); $active=$i==0; ?>
                            <div class="flex flex-col items-center cursor-pointer">
                                <span class="text-xs text-gray-500 font-medium mb-1"><?= substr($day, 0, 2); ?></span>
                                <span class="<?= $active ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-800 hover:bg-gray-100'; ?> w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold transition"><?= $num; ?></span>
                            </div>
                         <?php endfor; ?>
                     </div>
                     <div class="text-center">
                         <a href="<?= BASEURL; ?>/calendar" class="text-xs font-bold text-blue-600 hover:text-blue-800 uppercase">Open Full Calendar</a>
                     </div>
                 </div>

                 <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                      <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center"><svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg> Quick Notes</h3>
                     </div>
                     <div class="space-y-4">
                         <div class="flex items-start">
                             <div class="w-4 h-4 rounded-full border-2 border-yellow-400 mt-1 mr-3 bg-yellow-100"></div>
                             <div>
                                 <p class="text-sm font-bold text-gray-800">Library Stock Check</p>
                                 <p class="text-xs text-gray-500 mt-1 leading-relaxed">Schedule monthly stock check for Science section.</p>
                             </div>
                         </div>
                         <div class="flex items-start">
                             <div class="w-4 h-4 rounded-full border-2 border-green-400 mt-1 mr-3 bg-green-100"></div>
                             <div>
                                 <p class="text-sm font-bold text-gray-800">New Arrivals</p>
                                 <p class="text-xs text-gray-500 mt-1 leading-relaxed">Process new book donations from Alumni.</p>
                             </div>
                         </div>
                     </div>
                 </div>
            </div>
        </div>

    </main>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
