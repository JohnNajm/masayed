<?php



function presentPrice($cash)
{
    $cash = number_format($cash) . " LL"; 
    return $cash;
}
function presentTotal($cash, $tax=11)
{
    $total = $cash + ($cash * $tax)/100;
    $presenter = number_format($total) . " LL";
    return $presenter;
}

function calculateTotal($cash, $tax=11){
    $total = $cash + ($cash * $tax)/100;
    return round($total);
}

?>
