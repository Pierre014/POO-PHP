<?php

    class User{

        private $data;
        public function __construct($data){
            $this->data = $data;
        }

        function setUser($submit,$pdo){
            if(isset($this->data[$submit]) && ($this->data['password']== $this->data['confirmPass'])){

                $stmt = $pdo->prepare('INSERT INTO users(username,email,password,connected)
                                        VALUES(:username,:email,:password,:connected)');

                $stmt->execute(array(
                    ":username"=>$this->data['username'],
                    ":email"=>$this->data['email'],
                    ":password"=> password_hash($this->data['password'],PASSWORD_DEFAULT),
                    ":connected"=>"no"

                ));

            }
        }

    }