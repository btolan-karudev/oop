<?php

require_once __DIR__ . '/lib/Ship.php';

/**
 * @param Ship $someShip
 */
function printShipSummary($someShip)
{
    echo 'Ship name : ' . $someShip->getName();
    echo '<hr/>';
    $someShip->sayHello();
    echo '<hr/>';
    echo $someShip->getName();
    echo '<hr/>';
    echo $someShip->getNameAndSpecs(false);
    echo '<hr/>';
    echo $someShip->getNameAndSpecs(true);
}


//$myShip = new Ship();
//$myShip->getName() = 'Jedi Starship';
//$myShip->weaponPower = 10;
////$myShip->strength = 100;
//
//$otherShip = new Ship();
//$otherShip->name = 'Imperial Shuttle';
//$otherShip->weaponPower = 5;
//$otherShip->strength = 50;

printShipSummary($myShip);
echo '<hr/>';
echo '<hr/>';
printShipSummary($otherShip);

echo '<hr/>';
if ($myShip->doesGivenShipHaveMoreStrength($otherShip)) {
    echo $otherShip->name . ' has more strength';
} else {
    echo $myShip->name . ' has more strength';
}
