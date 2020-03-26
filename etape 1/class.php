<?php   
    class Form{
        
        private $data;
        public $surround = 'p';

        public function createForm($method){
            return "<form action='#' method=$method>";
        }
        public function endForm(){
            return "</form>";
        }
        public function __construct($data = array()){
            $this->data = $data;
        }

        private function surround($html){
            return "<$this->surround>{$html}</$this->surround>";
        }

        private function getValue($index){
            return isset($this->data[$index])? $this->data[$index] : null;
        }

        public function input($type,$name){
            return $this->surround(
                '<input type="'.$type.'" name="' . $name .'" value ="' . $this->getValue($name) .'">'
            );
        }

        public function submit(){
            
            return $this->surround("<button type=submit>send</button>");
        }
    }