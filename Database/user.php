<?php

    class User{

        private $data;
        public function __construct($data){
            $this->data = $data;
        }

        private function goIndex(){
            return header("location:index.php");
        }
        public function setUser($submit,$pdo){
            if(isset($this->data[$submit]) && (!in_array("",$this->data))){
                
                if($this->data['password']== $this->data['confirmPass']){
                $stmt = $pdo->prepare('INSERT INTO users(username,email,password,connected)
                                        VALUES(:username,:email,:password,:connected)');

                $stmt->execute(array(
                    ":username"=>$this->data['username'],
                    ":email"=>$this->data['email'],
                    ":password"=> password_hash($this->data['password'],PASSWORD_DEFAULT),
                    ":connected"=>"no"

                ));
                }else{
                    echo 'error';
                }
            }
        }

        public function sessionStart($pdo){
            if(isset($this->data['pseudo']) && isset($this->data['pass'])){
                $stmt = $pdo->prepare("SELECT id,username, password FROM users where username = :username");

                $stmt -> execute(array(
                    ":username" => $this->data['pseudo']
                ));

                $info = $stmt->fetch(PDO::FETCH_ASSOC);

                $isPassCorrect = password_verify($this->data['pass'],$info['password']);

            if(!$info){
                echo 'wrong pseudo or pass';
            }else{
                if($isPassCorrect){
                    session_start();
                    $_SESSION['id'] = $info['id'];
                    $_SESSION['pseudo'] = $info['username'];
                    $stmt = $pdo -> prepare("UPDATE users SET connected = :connected WHERE username = :username");
                    $stmt -> execute(array(
                        ":connected" => "yes",
                        ":username" => $info['username']
                    ));
                    $this->goIndex();
                }else{
                    echo 'failed to start session :/';
                }
            }
            }
        }
        public function update($pdo,$submit){

            if(isset($this->data[$submit])){
                session_start();
                //recupération de l'id utilisateur
                $user = $_SESSION['pseudo'];
                echo $user;
                $nameOrEmail = $this->data['choose'];
                $id = $pdo-> prepare("SELECT id FROM users WHERE username = :username");
                $id->execute(array(
                    ":username" => $user
                ));
                $userId = $id->fetch(PDO::FETCH_ASSOC);
                $stmt= $pdo->prepare("UPDATE users 
                                        SET $nameOrEmail = :$nameOrEmail WHERE id = :id");
                $stmt -> execute(array(
                    ":$nameOrEmail" => $this->data['nameOrEmail'],
                    ":id" => $userId['id']
                ));
                $_SESSION['pseudo'] = $this->data['nameOrEmail'];
                
                $this->goIndex();
            }
        }

        public function sessionEnd($pdo){
                session_start();
                $stmt = $pdo -> prepare("UPDATE users SET connected = :connected WHERE username = :username");
                    $stmt -> execute(array(
                        ":connected" => "no",
                        ":username" => $_SESSION['pseudo']
                    ));
                $_SESSION = array();
                session_destroy();
                echo 'deco';
            }
        
        public function deleteMember($submit,$pdo){
            if(isset($this->data[$submit])){
                session_start();
                if($this->data['sure'] == "yes"){
                    $stmt = $pdo -> prepare("DELETE FROM users WHERE username = :username");
                    $stmt -> execute(array(
                        ":username" => $_SESSION['pseudo']
                    ));
                }else{
                    $this->goIndex();
                }
            }
        }
    }
