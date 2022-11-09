<?php
    namespace App\Controller\Utils;

    class HashFunctions {
        private $password = null;

        public function setPasswordHash($password) {
            return password_hash($password, PASSWORD_BCRYPT);
        }

        private function getHashedPassword() {
            return $this->password;
        }

        public function comparePassword($passwordDB) {
            return password_verify($this->getHashedPassword(), $passwordDB);
        }
    }
?>