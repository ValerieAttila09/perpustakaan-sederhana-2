<?php
class Auth extends Controller {
    public function index() {
        $this->login();
    }

    public function login() {
        // If already logged in, redirect to dashboard
        if(isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }

        $data['title'] = 'Login';
        $this->view('auth/login', $data);
    }

    public function authenticate() {
        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = $this->model('User');
            $user = $userModel->getUserByUsername($username);

            if($user) {
                if(password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_role'] = $user['role'];
                    
                    header('Location: ' . BASEURL . '/dashboard');
                    exit;
                } else {
                    // Flash Message could be implemented here
                    echo "<script>alert('Password salah!'); window.token = 'invalid';</script>";
                     $this->login();
                }
            } else {
                 echo "<script>alert('Username tidak ditemukan!');</script>";
                 $this->login();
            }
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASEURL . '/auth/login');
        exit;
    }
}
