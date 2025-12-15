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
        $this->view('admin/dashboard', $data);
    }
}
