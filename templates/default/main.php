<?php

    $ab = array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16');

    // shuffle($ab);
    foreach ( $ab as $v ){
        include_once ("templates/default/blocks/{$v}.php");
    }
