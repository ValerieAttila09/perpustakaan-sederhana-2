<?php
class BookModel {
    private $table = 'books';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllBooks() {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    public function getLatestBooks($limit = 6) {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY created_at DESC LIMIT :limit');
        $this->db->bind('limit', $limit);
        return $this->db->resultSet();
    }

    public function getBookById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addBook($data) {
        $query = "INSERT INTO books (isbn, title, author, publisher, year, stock, description, cover_image) 
                  VALUES (:isbn, :title, :author, :publisher, :year, :stock, :description, :cover_image)";
        
        $this->db->query($query);
        $this->db->bind('isbn', $data['isbn']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('author', $data['author']);
        $this->db->bind('publisher', $data['publisher']);
        $this->db->bind('year', $data['year']);
        $this->db->bind('stock', $data['stock']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('cover_image', $data['cover_image']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateBook($data) {
        $query = "UPDATE books SET 
                    isbn = :isbn,
                    title = :title,
                    author = :author,
                    publisher = :publisher,
                    year = :year,
                    stock = :stock,
                    description = :description
                    " . ($data['cover_image'] ? ", cover_image = :cover_image" : "") . "
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('isbn', $data['isbn']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('author', $data['author']);
        $this->db->bind('publisher', $data['publisher']);
        $this->db->bind('year', $data['year']);
        $this->db->bind('stock', $data['stock']);
        $this->db->bind('description', $data['description']);
        if($data['cover_image']) {
             $this->db->bind('cover_image', $data['cover_image']);
        }
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteBook($id) {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function countAll() {
        $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
        return $this->db->single()['total'];
    }
}
