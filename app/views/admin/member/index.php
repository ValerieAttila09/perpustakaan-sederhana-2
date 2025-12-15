<?php
$data['active_menu'] = 'member';
require_once '../app/views/templates/header.php';
require_once '../app/views/templates/sidebar.php';
?>

<div class="flex-1 flex flex-col overflow-hidden bg-gray-50">
    <header class="flex justify-between items-center py-5 px-8 bg-white border-b border-gray-100">
        <div class="flex items-center">
             <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden mr-4">Menu</button>
             <h2 class="text-2xl font-bold text-gray-800">Members</h2>
        </div>
        <div class="flex items-center space-x-4">
             <a href="<?= BASEURL; ?>/member/create" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-6 rounded-lg shadow-sm flex items-center transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add Member
             </a>
        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-xs uppercase tracking-wide text-gray-400 border-b border-gray-100 bg-gray-50">
                            <th class="py-4 pl-6 font-semibold">NIS / NIP</th>
                            <th class="py-4 font-semibold">Name</th>
                            <th class="py-4 font-semibold">Class / Dept</th>
                            <th class="py-4 font-semibold">Phone</th>
                            <th class="py-4 font-semibold text-right pr-6">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php foreach($data['members'] as $member): ?>
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                            <td class="py-4 pl-6 text-sm font-medium text-gray-900">
                                <?= $member['nis_nip']; ?>
                            </td>
                            <td class="py-4">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-xs text-indigo-600 font-bold mr-3">
                                        <?= substr($member['name'], 0, 2); ?>
                                    </div>
                                    <span class="font-bold text-gray-800 text-sm"><?= $member['name']; ?></span>
                                </div>
                            </td>
                            <td class="py-4 text-sm text-gray-600">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-blue-50 text-blue-600">
                                    <?= $member['class_dept']; ?>
                                </span>
                            </td>
                             <td class="py-4 text-sm text-gray-500">
                                <?= $member['phone']; ?>
                            </td>
                            <td class="py-4 pr-6 text-right space-x-2">
                                <a href="<?= BASEURL; ?>/member/edit/<?= $member['id']; ?>" class="text-gray-400 hover:text-blue-600 transition-colors">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <a href="<?= BASEURL; ?>/member/delete/<?= $member['id']; ?>" onclick="return confirm('Delete this member?');" class="text-gray-400 hover:text-red-600 transition-colors">
                                     <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if(empty($data['members'])): ?>
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-500">No members found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
