<?php   
    class Form{
        
        private $data;
        public $surround = 'p';

        public function __constructor($data= array()){
            $this->data = $data;
        }

        private function surround($html){
            return "<$this->surround>$html</$this->surround>";
        }


        public function input($type,$name){

            return $this->surround("<input type = $type name=$name>");
        }

        public function submit(){
            
            return $this->surround("<button type=submit>send</button>");
        }
    }