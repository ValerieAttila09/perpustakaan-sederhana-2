<?php
class Dashboard extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }

    public function index() {
        $data['title'] = 'Dashboard';
        
        $data['total_books'] = $this->model('BookModel')->countAll();
        $data['total_members'] = $this->model('MemberModel')->countAll();
        $data['active_loans'] = $this->model('LoanModel')->countActive();
        $data['recent_loans'] = $this->model('LoanModel')->getRecentLoans(5);

        $this->view('admin/dashboard', $data);
    }
}
