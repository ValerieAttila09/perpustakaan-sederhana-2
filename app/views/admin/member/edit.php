<?php
$data['active_menu'] = 'member';
require_once '../app/views/templates/header.php';
require_once '../app/views/templates/sidebar.php';
?>

<div class="flex-1 flex flex-col overflow-hidden bg-gray-50">
    <header class="flex justify-between items-center py-5 px-8 bg-white border-b border-gray-100">
         <div class="flex items-center">
             <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden mr-4">Menu</button>
             <h2 class="text-2xl font-bold text-gray-800">Edit Member</h2>
        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                
                <form action="<?= BASEURL; ?>/member/update" method="POST" class="space-y-6">
                    <input type="hidden" name="id" value="<?= $data['member']['id']; ?>">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">NIS / NIP</label>
                        <input type="text" name="nis_nip" value="<?= $data['member']['nis_nip']; ?>" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="name" value="<?= $data['member']['name']; ?>" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                         <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Class / Dept</label>
                            <input type="text" name="class_dept" value="<?= $data['member']['class_dept']; ?>" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                            <input type="text" name="phone" value="<?= $data['member']['phone']; ?>" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4">
                        </div>
                    </div>

                    <div class="flex items-center justify-end pt-6 border-t border-gray-100 space-x-4">
                        <a href="<?= BASEURL; ?>/member" class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Cancel</a>
                        <button type="submit" class="px-6 py-2.5 rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition-colors shadow-md">
                            Update Member
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
