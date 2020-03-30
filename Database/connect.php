<?php
    class Connect{

        static public function bdd(){
            return new pdo("mysql:host=localhost;dbname=becode;charset=utf8",'pierre','Feuille014');
        }
    }