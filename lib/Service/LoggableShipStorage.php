<?php
/**
 * Created by PhpStorm.
 * User: ThinkCenter
 * Date: 14/03/2019
 * Time: 09:37
 */

namespace Service;


class LoggableShipStorage implements ShipStorageInterface
{
    private $shipStorage;

    public function __construct(ShipStorageInterface $shipStorage)
    {
        $this->shipStorage = $shipStorage;
    }

    /**
     * Return an array of ship arrays, with keys is, name, weaponPower, defense.
     *
     * @return array
     */
    public function fetchAllShipsData()
    {
        $ships = $this->shipStorage->fetchAllShipsData();

        $this->log(sprintf('Just fetched %s ships', count($ships)));

        return $ships;
    }

    /**
     * @param $id
     * @return array
     */
    public function fetchSingleShipData($id)
    {
        return $this->shipStorage->fetchSingleShipData($id);
    }

    private function log($message)
    {
        //we can do somthing more inteligent
        echo $message;
    }
}