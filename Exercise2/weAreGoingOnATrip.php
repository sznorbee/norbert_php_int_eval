<?php


function converter(float $amountToConvert, string $currencyOfExit){
    $exchangeRate = 1.085965;
    
    if ($currencyOfExit == 'USD'){
        $result = $amountToConvert * $exchangeRate;
        return $result;
    }else if($currencyOfExit == 'EUR'){
        $result = $amountToConvert *(1/$exchangeRate);
        return $result;
    }else{
        echo 'Not an accepted currency! EUR or USD';
    }
}


