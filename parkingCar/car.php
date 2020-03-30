<?php
define('COUNTRY','country');

    class Car{

        private $numberPlate;
        public $mark;
        private $model;
        private $date;
        public $kilometer;
        public $mass;
        public $reserve;

        public function __construct($mark,$kilometer,$mass,$date,$reserve,$numberPlate){
            $this->mark = $mark;
            $this->kilometer = $kilometer;
            $this->mass = $mass;
            $this->date = $date;
            $this->reserve = $reserve;
            $this->numberPlate = $numberPlate;
        }
        private function catalog(){
            $data = array(
                'mark' => $this->mark,
                'kilometer' =>$this->kilometer,
                'mass' => $this->mass,
                'date'=> $this->date,
                'reserved' => $this->reserve,
                'numberPlate'=>$this->numberPlate
            );
            $use = $this->used();
            $country = $this->country();
            $utility = $this->utility();
            return array_merge($data,$use,$country,$utility);
        }
        public function rouler(){
            return $this->kilometer +=100000;
        }

        private function used(){
            if($this->kilometer <= 100000){
                return array(
                    'used' => 'low'
                );
            }
            elseif($this->kilometer>100000 && $this->kilometer<200000){
                return array(
                    'used' => 'middle'
                );
            }else{
                return array(
                    'used' => 'high'
                );
            }
        }

        public function display(){
            $data = $this->catalog();

          
            foreach($data as $dat){
                echo "<td>$dat</td>";
            }
        

        }
        
        private function country(){
            if(strstr($this->numberPlate,'BE')){
                return array(COUNTRY=>"Belgium");
            }
            else if(strstr($this->numberPlate,'DE')){
                return array(COUNTRY=>"Deutsch");
            }
            else if(strstr($this->numberPlate,'FR')){
                return array(COUNTRY=>"France");
            }else{
                return array(COUNTRY=>"Inconnu");
            }
        }

        private function utility(){
            return $this->mass <=3.5 ? array('typework'=>'commercial') : array('typework'=>'utility');
        }
    }