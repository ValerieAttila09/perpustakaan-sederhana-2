<?php
class LoanModel {
    private $table = 'loans';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllLoans() {
        $query = "SELECT loans.*, members.name as member_name, books.title as book_title, books.cover_image 
                  FROM " . $this->table . "
                  JOIN members ON loans.member_id = members.id
                  JOIN books ON loans.book_id = books.id
                  ORDER BY loans.created_at DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function addLoan($data) {
        $query = "INSERT INTO loans (user_id, member_id, book_id, loan_date, due_date, status) 
                  VALUES (:user_id, :member_id, :book_id, :loan_date, :due_date, 'borrowed')";
        
        $this->db->query($query);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('member_id', $data['member_id']);
        $this->db->bind('book_id', $data['book_id']);
        $this->db->bind('loan_date', $data['loan_date']);
        $this->db->bind('due_date', $data['due_date']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getLoanById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function returnLoan($id, $return_date, $fine) {
        $query = "UPDATE loans SET status = 'returned', return_date = :return_date, fine = :fine WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('return_date', $return_date);
        $this->db->bind('fine', $fine);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function countActive() {
        $this->db->query("SELECT COUNT(*) as total FROM " . $this->table . " WHERE status = 'borrowed'");
        return $this->db->single()['total'];
    }

    public function countReturned() {
        $this->db->query("SELECT COUNT(*) as total FROM " . $this->table . " WHERE status = 'returned'");
        return $this->db->single()['total'];
    }

    public function getRecentLoans($limit = 5) {
         $query = "SELECT loans.*, members.name as member_name, books.title as book_title, books.cover_image 
                  FROM " . $this->table . "
                  JOIN members ON loans.member_id = members.id
                  JOIN books ON loans.book_id = books.id
                  ORDER BY loans.created_at DESC LIMIT :limit";
        $this->db->query($query);
        $this->db->bind('limit', $limit);
        return $this->db->resultSet();
    }

    public function deleteLoan($id) {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
