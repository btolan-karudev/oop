<?php

namespace Service;

use Model\AbstractShip;
use Model\BountyHunterShip;
use Model\RebelShip;
use Model\Ship;
use Model\ShipCollection;


class ShipLoader
{
    private $shipStorage;

    public function __construct(ShipStorageInterface $shipStorage)
    {
        $this->shipStorage = $shipStorage;
    }

    /**
     * @return ShipCollection
     */
    public function getShips()
    {
        try {
            $shipsData = $this->shipStorage->fetchAllShipsData();
        } catch (\PDOException $e) {
            var_dump($e);
            trigger_error('Database Exception! ' . $e->getMessage());
            $shipsData = [];
        }


        $ships = [];

        foreach ($shipsData as $shipsDatum) {
            $ships[] = $this->createShipsFromData($shipsDatum);
        }

        //Boba Fet s ship
        $ships[] = new BountyHunterShip('Slave I');


        return new ShipCollection($ships);
    }

    /**
     * @param $id
     * @return AbstractShip|null
     * @throws Exception
     */
    public function findOneById($id)
    {
        $shipArray = $this->shipStorage->fetchSingleShipData($id);

        return $this->createShipsFromData($shipArray);
    }

    /**
     * @param array $shipsDatum
     * @return AbstractShip
     * @throws Exception
     */
    private function createShipsFromData(array $shipsDatum)
    {
        if ($shipsDatum['team'] == 'rebel') {
            $ship = new RebelShip($shipsDatum['name']);
        } else {
            $ship = new Ship($shipsDatum['name']);
            $ship->setJediFactor($shipsDatum['jedi_factor']);
        }

        $ship->setId($shipsDatum['id']);
        $ship->setWeaponPower($shipsDatum['weapon_power']);
        $ship->setStrength($shipsDatum['strength']);


        return $ship;
    }

}