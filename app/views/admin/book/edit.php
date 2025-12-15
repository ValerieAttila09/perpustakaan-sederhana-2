<?php
$data['active_menu'] = 'book';
require_once '../app/views/templates/header.php';
require_once '../app/views/templates/sidebar.php';
?>

<div class="flex-1 flex flex-col overflow-hidden bg-gray-50">
    <header class="flex justify-between items-center py-5 px-8 bg-white border-b border-gray-100">
         <div class="flex items-center">
             <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden mr-4">Menu</button>
             <h2 class="text-2xl font-bold text-gray-800">Edit Book</h2>
        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                
                <form action="<?= BASEURL; ?>/book/update" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <input type="hidden" name="id" value="<?= $data['book']['id']; ?>">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Book Title</label>
                                <input type="text" name="title" value="<?= $data['book']['title']; ?>" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Author</label>
                                <input type="text" name="author" value="<?= $data['book']['author']; ?>" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4" required>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Year</label>
                                    <input type="number" name="year" value="<?= $data['book']['year']; ?>" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
                                    <input type="number" name="stock" value="<?= $data['book']['stock']; ?>" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4" required>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">ISBN</label>
                                <input type="text" name="isbn" value="<?= $data['book']['isbn']; ?>" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Publisher</label>
                                <input type="text" name="publisher" value="<?= $data['book']['publisher']; ?>" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Cover Image</label>
                                <div class="flex items-center space-x-4">
                                     <?php if($data['book']['cover_image']): ?>
                                        <div class="w-16 h-20 rounded shadow-sm overflow-hidden flex-shrink-0">
                                            <img src="<?= BASEURL; ?>/uploads/<?= $data['book']['cover_image']; ?>" class="w-full h-full object-cover">
                                        </div>
                                     <?php endif; ?>
                                    <input type="file" name="cover_image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" rows="3" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4"><?= $data['book']['description']; ?></textarea>
                    </div>

                    <div class="flex items-center justify-end pt-6 border-t border-gray-100 space-x-4">
                        <a href="<?= BASEURL; ?>/book" class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Cancel</a>
                        <button type="submit" class="px-6 py-2.5 rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition-colors shadow-md">
                            Update Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
