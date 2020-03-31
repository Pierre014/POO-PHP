<?php

    class User{

        private $data;
        public function __construct($data){
            $this->data = $data;
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
                    echo "Welcome ".$_SESSION['pseudo']."<br>";
                    echo "<a href= disconnect.php>logout</a><br>";
                    echo "<a href= update.php>update</a><br>";
                    echo "<a href= delete.php>delete</a><br>";
                    $stmt = $pdo -> prepare("UPDATE users SET connected = :connected WHERE username = :username");
                    $stmt -> execute(array(
                        ":connected" => "yes",
                        ":username" => $info['username']
                    ));
                }else{
                    echo 'failed to start session :/';
                }
            }
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
            
        public function update($pdo,$submit){
            if(isset($this->data[$submit])){
            session_start();
            $nameOrEmail = $this->data['nameOrEmail'];
            $stmt= $pdo->prepare("UPDATE users SET $nameOrEmail = :$nameOrEmail WHERE username = :username");

            $stmt -> execute(array(
                ":$nameOrEmail" => $nameOrEmail,
                ":username" => $_SESSION['pseudo']
            ));
            header('location:index.php');
            }
        }
    }
