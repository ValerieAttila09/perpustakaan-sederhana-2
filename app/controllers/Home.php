<?php
class Home extends Controller {
    public function index() {
        $data['title'] = 'Home';
        $data['books'] = $this->model('BookModel')->getLatestBooks(8);
        $this->view('landing/index', $data);
    }
}
