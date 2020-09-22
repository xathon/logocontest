<?php

//Check https://en.wikipedia.org/wiki/Pairing_function for more information
function cantor($zahl1,$zahl2) {
    return 0.5 * ($zahl1 + $zahl2) * ($zahl1 + $zahl2 + 1) + $zahl2;
}
