<?php 
    namespace App\Controller\Login;

    include_once("../scripts/alertDialog.php");
    require_once("../../model/authLogin.php");

    class ControllerLogin {
        private $login;
        private $id_admin;

        public function __construct()
        {
            $this->login = new \Model\Login\AuthLogin();
        }
     
        public function authLogin() {
            $this->login->setUser(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
            $this->login->setPassword(md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS)));

            $result = $this->login->validarLogin();

            if (!is_null($result)) {
                foreach ($result as $value) {
                    $this->id_admin = $value['id_admin'];
                }

                $this->initSession($this->id_admin);
            } else {
                echo "<script>errorDialog('E-mail ou senha inválidos!', '../../index.php'); </script>";
                
                header("HTTP/1.0 401 Unauthorized");           
            }
        }

        private function initSession($id_admin) {
            $this->protectedSession();

            session_regenerate_id();
            
            $_SESSION['authlogin'] = $id_admin;

            $this->login->setLastLogin($id_admin); // seta o útimo horário de login

            header("location: ../../admin/admin_dashboard.php");
        }
            
        private function protectedSession() {
            header("X-XSS-Protection: 1; mode=block");
            header('X-Content-Type-Options: nosniff');
            header('X-Frame-Options: DENY');
            
            ini_set('session.use_trans_sid', false);
            ini_set('session.cookie_httponly', 1);
            ini_set('session.use_only_cookies', true);
            ini_set('session.cookie_lifetime', 86400);

            session_start();
        }
    }

    $handle = new ControllerLogin();

    if (isset($_POST['signin'])) {
        $handle->authLogin();
    } 
?>