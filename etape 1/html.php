<?php

    class Html{



        public function headerData($tag,$content=""){
            return "<$tag $content>";
        }

        public function doubleTag($tag,$content){
            return "<$tag> $content </$tag>";
        }
    }