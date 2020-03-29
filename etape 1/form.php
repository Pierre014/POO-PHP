<?php   
    class Form{
        private $data;
        public $surround = 'p';

        public function __construct($data = array()){
            $this->data = $data;
        }

        public function createForm($method){
            return "<form action='#' method=$method>";
        }
        public function endForm(){
            return "</form>";
        }

        private function surround($html){
            return "<$this->surround>{$html}</$this->surround>";
        }

        private function getValue($index){
            return isset($this->data[$index])? $this->data[$index] : null;
        }

        public function input($type,$name){
            return $this->surround(
                
                '<label for="'.$name.'">'.$name.'</label> '.
                '<input type="'.$type.'" name="' . $name .'" value ="' . $this->getValue($name) .'"><br>'
            );
        }

        public function submit(){
            
            return $this->surround("<button type=submit name=submit>send</button>");
        }
    }