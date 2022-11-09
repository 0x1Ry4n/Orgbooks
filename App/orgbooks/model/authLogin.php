<?php 
    namespace Model\Login;

    require_once("database.php");

    class AuthLogin extends \Model\Database {
        
        private $email;
        private $password;

        public function setUser($email) {
            $this->email = $email;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function setLastLogin($id_admin) {
            return $this->updateLastLogin($id_admin);
        }

        private function getEmail() {
            return $this->email;
        }

        private function getPassword() {
            return $this->password;
        }

        public function validarLogin() {
            return $this->selectAdminLogin(
                $this->getEmail(), 
                $this->getPassword()
            );
        }
    } 

?>