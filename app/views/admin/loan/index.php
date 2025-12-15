<?php
$data['active_menu'] = 'loan';
require_once '../app/views/templates/header.php';
require_once '../app/views/templates/sidebar.php';
?>

<div class="flex-1 flex flex-col overflow-hidden bg-gray-50">
    <header class="flex justify-between items-center py-5 px-8 bg-white border-b border-gray-100">
        <div class="flex items-center">
             <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden mr-4">Menu</button>
             <h2 class="text-2xl font-bold text-gray-800">Loans Transactions</h2>
        </div>
        <div class="flex items-center space-x-4">
             <a href="<?= BASEURL; ?>/loan/create" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-6 rounded-lg shadow-sm flex items-center transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                New Loan
             </a>
        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-xs uppercase tracking-wide text-gray-400 border-b border-gray-100 bg-gray-50">
                            <th class="py-4 pl-6 font-semibold">Member</th>
                            <th class="py-4 font-semibold">Book Title</th>
                            <th class="py-4 font-semibold">Loan Date</th>
                            <th class="py-4 font-semibold">Due Date</th>
                            <th class="py-4 font-semibold">Status</th>
                            <th class="py-4 font-semibold">Fine</th>
                            <th class="py-4 font-semibold text-right pr-6">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php foreach($data['loans'] as $loan): ?>
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                            <td class="py-4 pl-6">
                                <span class="font-bold text-gray-800 text-sm"><?= $loan['member_name']; ?></span>
                            </td>
                            <td class="py-4">
                                <div class="flex items-center">
                                    <div class="w-8 h-10 bg-gray-100 rounded mr-3 overflow-hidden shadow-sm">
                                         <?php if($loan['cover_image'] && $loan['cover_image'] != 'default.jpg'): ?>
                                            <img src="<?= BASEURL; ?>/uploads/<?= $loan['cover_image']; ?>" class="w-full h-full object-cover">
                                        <?php endif; ?>
                                    </div>
                                    <span class="text-sm font-medium text-gray-700"><?= $loan['book_title']; ?></span>
                                </div>
                            </td>
                            <td class="py-4 text-sm text-gray-500">
                                <?= date('d M Y', strtotime($loan['loan_date'])); ?>
                            </td>
                            <td class="py-4 text-sm text-gray-500">
                                <?php
                                    $due = strtotime($loan['due_date']);
                                    $now = time();
                                    $isLate = ($loan['status'] == 'borrowed' && $now > $due);
                                ?>
                                <span class="<?= $isLate ? 'text-red-500 font-bold' : ''; ?>">
                                    <?= date('d M Y', $due); ?>
                                </span>
                            </td>
                            <td class="py-4">
                                <?php if($loan['status'] == 'borrowed'): ?>
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-yellow-50 text-yellow-600 border border-yellow-100">
                                        Borrowed
                                    </span>
                                <?php else: ?>
                                     <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-green-50 text-green-600 border border-green-100">
                                        Returned
                                    </span>
                                <?php endif; ?>
                            </td>
                             <td class="py-4 text-sm font-medium">
                                <?php if($loan['fine'] > 0): ?>
                                    <span class="text-red-600">Rp <?= number_format($loan['fine'], 0, ',', '.'); ?></span>
                                <?php elseif($isLate): ?>
                                    <span class="text-red-400 text-xs italic">Late...</span>
                                <?php else: ?>
                                    <span class="text-gray-400">-</span>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 pr-6 text-right space-x-2">
                                <?php if($loan['status'] == 'borrowed'): ?>
                                    <a href="<?= BASEURL; ?>/loan/complete/<?= $loan['id']; ?>" onclick="return confirm('Mark as returned? Fine will be calculated automatically.');" class="text-blue-600 hover:text-blue-800 text-xs font-bold uppercase tracking-wide">
                                        Return
                                    </a>
                                <?php else: ?>
                                    <span class="text-gray-400 text-xs uppercase tracking-wide">Done</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                         <?php if(empty($data['loans'])): ?>
                            <tr>
                                <td colspan="7" class="py-10 text-center text-gray-500">No active transaction records found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
