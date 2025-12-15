<?php
$data['active_menu'] = 'book';
require_once '../app/views/templates/header.php';
require_once '../app/views/templates/sidebar.php';
?>

<div class="flex-1 flex flex-col overflow-hidden bg-gray-50">
    <header class="flex justify-between items-center py-5 px-8 bg-white border-b border-gray-100">
         <div class="flex items-center">
             <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden mr-4">Menu</button>
             <nav class="flex" aria-label="Breadcrumb">
              <ol class="flex items-center space-x-4">
                <li>
                  <div>
                    <a href="<?= BASEURL; ?>/book" class="text-gray-400 hover:text-gray-500">
                      <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                      </svg>
                      <span class="sr-only">Home</span>
                    </a>
                  </div>
                </li>
                <li>
                  <div class="flex items-center">
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                      <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                    </svg>
                    <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Add Book</a>
                  </div>
                </li>
              </ol>
            </nav>
        </div>
    </header>

    <main class="flex-1 overflow-x-hidden overflow-y-auto p-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <div class="border-b border-gray-100 pb-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-800">New Book Entry</h2>
                    <p class="text-gray-500 text-sm mt-1">Please fill in the details of the new book.</p>
                </div>
                
                <form action="<?= BASEURL; ?>/book/store" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Book Title</label>
                                <input type="text" name="title" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4" placeholder="e.g. Harry Potter" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Author</label>
                                <input type="text" name="author" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4" placeholder="Author Name" required>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Year</label>
                                    <input type="number" name="year" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4" placeholder="2023">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
                                    <input type="number" name="stock" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4" placeholder="0" required>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">ISBN</label>
                                <input type="text" name="isbn" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4" placeholder="Optional">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Publisher</label>
                                <input type="text" name="publisher" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4" placeholder="Publisher Name">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Cover Image</label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                            <p class="text-xs text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        </div>
                                        <input id="dropzone-file" name="cover_image" type="file" class="hidden" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" rows="3" class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-500 transition-all text-sm py-2.5 px-4" placeholder="Brief description of the book..."></textarea>
                    </div>

                    <div class="flex items-center justify-end pt-6 border-t border-gray-100 space-x-4">
                        <a href="<?= BASEURL; ?>/book" class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Cancel</a>
                        <button type="submit" class="px-6 py-2.5 rounded-lg text-sm font-medium text-white bg-gray-900 hover:bg-black transition-colors shadow-lg">
                            Save Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
