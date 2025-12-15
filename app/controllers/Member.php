<?php
class Member extends Controller {
    public function __construct() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }

    public function index() {
        $data['title'] = 'Manajemen Anggota';
        $data['members'] = $this->model('MemberModel')->getAllMembers();
        $this->view('admin/member/index', $data);
    }

    public function create() {
        $data['title'] = 'Tambah Anggota';
        $this->view('admin/member/create', $data);
    }

    public function store() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nis_nip' => $_POST['nis_nip'],
                'name' => $_POST['name'],
                'class_dept' => $_POST['class_dept'],
                'phone' => $_POST['phone']
            ];

            if($this->model('MemberModel')->addMember($data) > 0) {
                 header('Location: ' . BASEURL . '/member');
                 exit;
            } else {
                 echo "<script>alert('Gagal menambahkan anggota'); window.history.back();</script>";
            }
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Anggota';
        $data['member'] = $this->model('MemberModel')->getMemberById($id);
        $this->view('admin/member/edit', $data);
    }

    public function update() {
         if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $_POST['id'],
                'nis_nip' => $_POST['nis_nip'],
                'name' => $_POST['name'],
                'class_dept' => $_POST['class_dept'],
                'phone' => $_POST['phone']
            ];

            if($this->model('MemberModel')->updateMember($data) > 0) {
                 header('Location: ' . BASEURL . '/member');
                 exit;
            } else {
                 header('Location: ' . BASEURL . '/member');
                 exit;
            }
        }
    }

    public function delete($id) {
        if($this->model('MemberModel')->deleteMember($id) > 0) {
            header('Location: ' . BASEURL . '/member');
            exit;
        }
    }
}
