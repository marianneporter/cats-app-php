<?php 
    class DB_Auth {
        
        public function emailExists($db, $email) {  

            $sql = "SELECT COUNT(*) FROM `users` WHERE email = :email"; 
            $stmt = $db->prepare($sql);
            $stmt->bindparam(':email', $email);
            $stmt->execute();
            $count= $stmt->fetchColumn();
            return $count >0;
        }  

        public function getUserForEmail($db, $email) {
            try {
                $sql = "SELECT * FROM `users` "; 
                $sql .= " WHERE email = :email";
                $stmt = $db->prepare($sql);
                $stmt->bindparam(':email', $email);          
                $stmt->execute();         
                $user = $stmt->fetchObject(); 
                $error = $user == null ? "noEmailError" : "";              
                return (object) [
                    "user" => $user,
                    "error" => $error
                ];                   
            }
            catch(PDOException $e) {
                return (object) [
                    "user" => null,
                    "error" => "dbError"
                ];  
            }   
        }

        public function registerUser($db, $user) { {}
            if ($this->emailExists($db, $user->email)) {
                return "emailError";
            }

            try {
                $password= password_hash($user->password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users ( email,
                                            first_name,
                                            last_name,
                                            `password`)
                            VALUES (:email, :firstName,  :lastName, :pass )";
             
                $stmt = $db->prepare($sql);
                $stmt->bindparam(':email', $user->email);
                $stmt->bindparam(':firstName', $user->firstName);
                $stmt->bindparam(':lastName', $user->lastName);
                $stmt->bindparam(':pass', $password);
    
                $stmt->execute();
                return "success";
            } catch (Exception $e) {    
                return "dbError";            
            }                
        }

        public function loginUser($db, $loginCreds) {

            $userData = $this->getUserForEmail($db, $loginCreds->email);

            if ($userData->error != "") {
                return $userData->error;
            }
            
            if (password_verify($loginCreds->password, $userData->user->password)) {
                $_SESSION['firstName'] = $userData->user->first_name;
                $_SESSION['lastName']  = $userDate->user->last_name;
                return "loginSuccess";
            } else {
                return "wrongPasswordError";
            }

        }
    }
?>