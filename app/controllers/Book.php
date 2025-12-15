<?php
class Book extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }

    public function index() {
        $data['title'] = 'Manajemen Buku';
        $data['books'] = $this->model('BookModel')->getAllBooks();
        $this->view('admin/book/index', $data);
    }

    public function create() {
        $data['title'] = 'Tambah Buku';
        $this->view('admin/book/create', $data);
    }

    public function store() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
             // File Upload Logic
            $cover = 'default.jpg';
            if(isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === 4) {
                 $cover = 'default.jpg';
            } else {
                 // Upload Logic here
                 $fileName = $_FILES['cover_image']['name'];
                 $fileTmp = $_FILES['cover_image']['tmp_name'];
                 // Simple unique name
                 $cover = time() . '_' . $fileName;
                 move_uploaded_file($fileTmp, '../public/uploads/' . $cover);
            }

            $data = [
                'isbn' => $_POST['isbn'],
                'title' => $_POST['title'],
                'author' => $_POST['author'],
                'publisher' => $_POST['publisher'],
                'year' => $_POST['year'],
                'stock' => $_POST['stock'],
                'description' => $_POST['description'],
                'cover_image' => $cover
            ];

            if($this->model('BookModel')->addBook($data) > 0) {
                 // Flash message can be added here
                 header('Location: ' . BASEURL . '/book');
                 exit;
            } else {
                 echo "<script>alert('Gagal menambahkan buku');</script>";
            }
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Buku';
        $data['book'] = $this->model('BookModel')->getBookById($id);
        $this->view('admin/book/edit', $data);
    }

    public function update() {
         if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cover = null;
            if(isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] !== 4) {
                 $fileName = $_FILES['cover_image']['name'];
                 $fileTmp = $_FILES['cover_image']['tmp_name'];
                 $cover = time() . '_' . $fileName;
                 move_uploaded_file($fileTmp, '../public/uploads/' . $cover);
            }

            $data = [
                'id' => $_POST['id'],
                'isbn' => $_POST['isbn'],
                'title' => $_POST['title'],
                'author' => $_POST['author'],
                'publisher' => $_POST['publisher'],
                'year' => $_POST['year'],
                'stock' => $_POST['stock'],
                'description' => $_POST['description'],
                'cover_image' => $cover
            ];

            if($this->model('BookModel')->updateBook($data) > 0) {
                 header('Location: ' . BASEURL . '/book');
                 exit;
            } else {
                 // If no rows affected (e.g. no changes), just redirect
                 header('Location: ' . BASEURL . '/book');
                 exit;
            }
        }
    }

    public function delete($id) {
        if($this->model('BookModel')->deleteBook($id) > 0) {
            header('Location: ' . BASEURL . '/book');
            exit;
        }
    }
}
