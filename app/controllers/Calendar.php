<?php
class Calendar extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }

    public function index($month = null, $year = null) {
        $data['title'] = 'Loan Calendar';
        
        // Default to current month/year if not provided
        if (!$month) $month = date('m');
        if (!$year) $year = date('Y');

        // Validation (basic)
        if ($month < 1 || $month > 12) $month = date('m');
        if ($year < 2000 || $year > 3000) $year = date('Y');

        $data['month'] = $month;
        $data['year'] = $year;

        // Fetch all events (filtering could be done here if needed)
        $data['events'] = $this->model('LoanModel')->getAllLoans();
        
        $this->view('admin/calendar/index', $data);
    }
}
