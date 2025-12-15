<?php
$data['active_menu'] = 'book';
require_once '../app/views/templates/header.php';
require_once '../app/views/templates/sidebar.php';
?>

<div class="flex-1 flex flex-col overflow-hidden bg-gray-50">
    <!-- Topbar (Duplicate for now, ideally componentized further if logic complexity grows) -->
     <header class="flex justify-between items-center py-5 px-8 bg-white border-b border-gray-100">
        <div class="flex items-center">
             <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden mr-4">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-800">Book Management</h2>
        </div>
        <div class="flex items-center space-x-4">
             <a href="<?= BASEURL; ?>/book/create" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-6 rounded-lg shadow-sm flex items-center transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add New Book
             </a>
        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-xs uppercase tracking-wide text-gray-400 border-b border-gray-100 bg-gray-50">
                            <th class="py-4 pl-6 font-semibold">Cover</th>
                            <th class="py-4 font-semibold">Book Info</th>
                            <th class="py-4 font-semibold">Year</th>
                            <th class="py-4 font-semibold">Stock</th>
                            <th class="py-4 font-semibold text-right pr-6">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php foreach($data['books'] as $book): ?>
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                            <td class="py-4 pl-6 w-20">
                                <div class="w-12 h-16 rounded overflow-hidden shadow-sm bg-gray-200">
                                    <?php if($book['cover_image'] && $book['cover_image'] != 'default.jpg'): ?>
                                        <img class="w-full h-full object-cover" src="<?= BASEURL; ?>/uploads/<?= $book['cover_image']; ?>" alt="">
                                    <?php else: ?>
                                        <div class="flex items-center justify-center h-full text-xs text-gray-400">N/A</div>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-4">
                                <p class="font-bold text-gray-900 text-sm"><?= $book['title']; ?></p>
                                <p class="text-xs text-gray-500 mt-0.5 font-medium"><?= $book['author']; ?></p>
                                <span class="text-[10px] text-gray-400 uppercase tracking-wider"><?= $book['publisher']; ?></span>
                            </td>
                            <td class="py-4 text-sm text-gray-600 font-medium">
                                <?= $book['year']; ?>
                            </td>
                             <td class="py-4">
                                <?php if($book['stock'] > 0): ?>
                                    <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-green-50 text-green-600 border border-green-100">
                                        <?= $book['stock']; ?> In Stock
                                    </span>
                                <?php else: ?>
                                     <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-red-50 text-red-600 border border-red-100">
                                        Out of Stock
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 pr-6 text-right space-x-2">
                                <a href="<?= BASEURL; ?>/book/edit/<?= $book['id']; ?>" class="text-gray-400 hover:text-blue-600 transition-colors">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <a href="<?= BASEURL; ?>/book/delete/<?= $book['id']; ?>" onclick="return confirm('Are you sure?');" class="text-gray-400 hover:text-red-600 transition-colors">
                                     <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if(empty($data['books'])): ?>
                    <div class="p-10 text-center">
                        <div class="inline-block p-4 rounded-full bg-gray-50 mb-4 text-gray-300">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">No books found</h3>
                        <p class="text-gray-500 mt-1 mb-6">Get started by creating a new book entry.</p>
                        <a href="<?= BASEURL; ?>/book/create" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            Add Book
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
