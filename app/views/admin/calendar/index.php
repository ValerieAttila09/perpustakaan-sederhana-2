<?php
$data['active_menu'] = 'calendar';
require_once '../app/views/templates/header.php';
require_once '../app/views/templates/sidebar.php';

// Calendar Logic from Controller Data
$month = $data['month'];
$year = $data['year'];

// Previous Month Calculation
$prevMonth = $month - 1;
$prevYear = $year;
if ($prevMonth < 1) {
    $prevMonth = 12;
    $prevYear--;
}

// Next Month Calculation
$nextMonth = $month + 1;
$nextYear = $year;
if ($nextMonth > 12) {
    $nextMonth = 1;
    $nextYear++;
}

$firstDay = mktime(0,0,0,$month, 1, $year);
$numberDays = date('t',$firstDay);
$dateComponents = getdate($firstDay);
$monthName = $dateComponents['month'];
$dayOfWeek = $dateComponents['wday']; // 0-6 (Sun-Sat)

$daysOfWeek = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
?>

<div class="flex-1 flex flex-col overflow-hidden bg-gray-50" x-data="{ eventModalOpen: false, selectedEvent: {} }">
    <header class="flex justify-between items-center py-5 px-8 bg-white border-b border-gray-100">
        <div class="flex items-center space-x-4">
             <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden mr-4">Menu</button>
             <h2 class="text-2xl font-bold text-gray-800"><?= $monthName . ', ' . $year; ?></h2>
             
             <!-- Navigation -->
             <div class="flex items-center bg-gray-100 rounded-lg p-1">
                <a href="<?= BASEURL; ?>/calendar/index/<?= $prevMonth; ?>/<?= $prevYear; ?>" class="p-1 hover:bg-white rounded-md transition hover:shadow-sm text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
                <a href="<?= BASEURL; ?>/calendar" class="px-3 text-xs font-bold text-gray-500 hover:text-gray-800 uppercase tracking-wider">Today</a>
                <a href="<?= BASEURL; ?>/calendar/index/<?= $nextMonth; ?>/<?= $nextYear; ?>" class="p-1 hover:bg-white rounded-md transition hover:shadow-sm text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
             </div>
        </div>
        <div class="flex space-x-2">
            <button class="px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-200">Month</button>
            <button class="px-4 py-2 bg-white rounded-lg text-sm font-medium text-gray-400 hover:bg-gray-50">Week</button>
            <button class="px-4 py-2 bg-white rounded-lg text-sm font-medium text-gray-400 hover:bg-gray-50">Day</button>
        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 min-h-[600px]">
            
            <!-- Calendar Grid -->
            <div class="grid grid-cols-7 gap-4 mb-4">
                <?php foreach($daysOfWeek as $day): ?>
                    <div class="text-center text-xs font-semibold text-gray-400 tracking-wider"><?= $day; ?></div>
                <?php endforeach; ?>
            </div>

            <div class="grid grid-cols-7 gap-4 h-full">
                <!-- Empty Slots for previous month -->
                <?php for($i=0; $i<$dayOfWeek; $i++): ?>
                    <div class="h-32 border border-gray-50 rounded-xl bg-gray-50/30"></div>
                <?php endfor; ?>

                <!-- Days -->
                <?php for($k=1; $k<=$numberDays; $k++): 
                    $currentDate = sprintf('%04d-%02d-%02d', $year, $month, $k);
                    // Filter events for this day
                    $dayEvents = [];
                    foreach($data['events'] as $event) {
                        if($event['loan_date'] == $currentDate) {
                            $dayEvents[] = $event;
                        }
                    }
                ?>
                    <div class="h-32 border border-gray-100 rounded-xl p-2 hover:border-blue-200 transition relative group">
                        <span class="text-sm font-bold text-gray-700 block mb-2"><?= $k; ?></span>
                        
                        <!-- Events Stack -->
                        <div class="space-y-1 overflow-y-auto max-h-[80px] custom-scrollbar">
                            <?php foreach($dayEvents as $evt): ?>
                                <div @click="eventModalOpen = true; selectedEvent = {
                                    title: '<?= addslashes($evt['member_name']); ?>',
                                    book: '<?= addslashes($evt['book_title']); ?>',
                                    date: '<?= $evt['loan_date']; ?>',
                                    due: '<?= $evt['due_date']; ?>',
                                    status: '<?= $evt['status']; ?>'
                                }" 
                                class="bg-blue-100 text-blue-700 text-[10px] font-semibold px-2 py-1 rounded cursor-pointer hover:bg-blue-200 truncate border-l-2 border-blue-500">
                                    <?= $evt['member_name']; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Add Button (Hover) -->
                        <button class="absolute bottom-2 right-2 w-6 h-6 bg-gray-900 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition shadow-md text-xs">
                            +
                        </button>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </main>

    <!-- Event Detail Modal (Alpine.js) -->
    <div x-show="eventModalOpen" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black bg-opacity-30 backdrop-blur-sm" @click="eventModalOpen = false"></div>
        
        <!-- Modal Content -->
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-sm relative z-10 p-6 transform transition-all scale-100" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100">
            
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-xl font-bold text-gray-900" x-text="selectedEvent.title">Member Name</h3>
                <button @click="eventModalOpen = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="space-y-4">
                 <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Book Title</label>
                    <div class="flex items-center p-3 bg-gray-50 rounded-xl">
                        <span class="text-sm font-bold text-gray-700" x-text="selectedEvent.book">Book Title</span>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <div class="flex-1">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Loan Date</label>
                         <div class="flex items-center p-3 bg-gray-50 rounded-xl">
                            <span class="text-sm font-semibold text-gray-700" x-text="selectedEvent.date">2023-01-01</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Due Date</label>
                         <div class="flex items-center p-3 bg-red-50 rounded-xl border border-red-100">
                            <span class="text-sm font-semibold text-red-600" x-text="selectedEvent.due">2023-01-08</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-gray-100 flex justify-between items-center">
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700" x-text="selectedEvent.status">Status</span>
                    <button class="bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-black">Edit Loan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
