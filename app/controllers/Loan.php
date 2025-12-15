<?php
class Loan extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }

    public function index() {
        $data['title'] = 'Daftar Peminjaman';
        $data['loans'] = $this->model('LoanModel')->getAllLoans();
        $this->view('admin/loan/index', $data);
    }

    public function create() {
        $data['title'] = 'Catat Peminjaman';
        $data['members'] = $this->model('MemberModel')->getAllMembers();
        $data['books'] = $this->model('BookModel')->getAllBooks(); // Should ideally filter available books
        $this->view('admin/loan/create', $data);
    }

    public function store() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'member_id' => $_POST['member_id'],
                'book_id' => $_POST['book_id'],
                'loan_date' => $_POST['loan_date'],
                'due_date' => $_POST['due_date']
            ];

            // Logic to decrease book stock could be added here

            if($this->model('LoanModel')->addLoan($data) > 0) {
                 header('Location: ' . BASEURL . '/loan');
                 exit;
            } else {
                 echo "<script>alert('Gagal mencatat peminjaman'); window.history.back();</script>";
            }
        }
    }

    public function complete($id) {
        $loan = $this->model('LoanModel')->getLoanById($id);
        
        if($loan) {
            $return_date = date('Y-m-d');
            $due_date = $loan['due_date'];
            
            // Calculate Late Fine
            $fine = 0;
            $diff = strtotime($return_date) - strtotime($due_date);
            $days_late = floor($diff / (60 * 60 * 24));

            if ($days_late > 0) {
                $fine = $days_late * 5000;
            }

            if($this->model('LoanModel')->returnLoan($id, $return_date, $fine) > 0) {
                 header('Location: ' . BASEURL . '/loan');
                 exit;
            }
        }
    }

    public function delete($id) {
        if($this->model('LoanModel')->deleteLoan($id) > 0) {
            header('Location: ' . BASEURL . '/loan');
            exit;
        }
    }
}
