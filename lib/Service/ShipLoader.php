<?php

class ShipLoader
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return Ship[]
     * @throws Exception
     */
    public function getShips()
    {
        $shipsData = $this->queryForShips();

        $ships = [];

        foreach ($shipsData as $shipsDatum) {
            $ships[] = $this->createShipsFromData($shipsDatum);
        }

        return $ships;
    }

    /**
     * @param $id
     * @return Ship|null
     */
    public function findOneById($id)
    {
        $pdo = $this->getPDO();

        $statement = $pdo->prepare('SELECT * FROM ship WHERE id = :id');
        $statement->execute(array('id' => $id));
        $shipArray = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$shipArray) {
            return null;
        }

        return $this->createShipsFromData($shipArray);
    }

    /**
     * @param array $shipsDatum
     * @return Ship
     * @throws Exception
     */
    private function createShipsFromData(array $shipsDatum)
    {
        if ($shipsDatum['team'] == 'rebel') {
            $ship = new RebelShip($shipsDatum['name']);
        } else {
            $ship = new Ship($shipsDatum['name']);
        }

        $ship->setId($shipsDatum['id']);
        $ship->setWeaponPower($shipsDatum['weapon_power']);
        $ship->setStrength($shipsDatum['strength']);
        $ship->setJediFactor($shipsDatum['jedi_factor']);

        return $ship;
    }

    private function queryForShips()
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM ship');
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return PDO
     */
    private function getPDO()
    {
        return $this->pdo;
    }

}