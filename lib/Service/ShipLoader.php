<?php

class ShipLoader
{
    private $shipStorage;

    public function __construct(AbstractShipStorage $shipStorage)
    {
        $this->shipStorage = $shipStorage;
    }

    /**
     * @return AbstractShip[]
     * @throws Exception
     */
    public function getShips()
    {
        $shipsData = $this->shipStorage->fetchAllShipsData();

        $ships = [];

        foreach ($shipsData as $shipsDatum) {
            $ships[] = $this->createShipsFromData($shipsDatum);
        }

        return $ships;
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