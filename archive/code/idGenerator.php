<?php

function getRandomID(){
    $alphabetLw = 'abcdefghijklmnopqrstuvwxyz';
    $alphabetUp = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';

    $symbols = [$alphabetLw, $alphabetUp, $numbers];

    $id = '';
    for($i = 0; $i < 12; $i++){
        $symbolSelected = $symbols[rand(0, 2)];

        $id .= $symbolSelected[rand(0, strlen($symbolSelected) - 1)];
    }

    return $id;
}

