<?php

    require 'form.php';
    $form = new Form(array(
        'username' => 'Pierre'
    ));
    echo $form -> createForm("post");
    echo $form -> input('text','username');
    echo $form -> input('password','pass');
    echo $form -> input('radio','gender');
    echo $form -> input('checkbox','Y');
    echo $form -> submit();
    echo $form -> endForm();
