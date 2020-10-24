<?php

//Check https://en.wikipedia.org/wiki/Pairing_function for more information
function cantor($zahl1,$zahl2) {
    return 0.5 * ($zahl1 + $zahl2) * ($zahl1 + $zahl2 + 1) + $zahl2;
}
function normalize_text($string){
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '', $string);
    $string = preg_replace('/[^a-zA-Z0-9\']/', '', $string); // this was the problematic one
    return strtolower(trim($string, ''));
}