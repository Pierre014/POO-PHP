<?php

    class Connect {
        public $dbname;
        public $pass;
        public $pseudo;

        function __construct($dbname,$pass,$pseudo){
            $this->dbname = $dbname;
            $this ->pass = $pass;
            $this ->pseudo = $pseudo;
        }

        function ConnectPDO(){
            return new PDO("mysql:host=localhost;dbname=$this->dbname;charset=utf8",$this->pseudo,
                    $this->pass);
        }

        function countTable($expression,$pdo){
            $stmt = $pdo -> prepare($expression);
            $stmt -> execute();
            return $stmt -> fetchALL(PDO::FETCH_ASSOC);
        }
    }