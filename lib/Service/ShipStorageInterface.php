<?php

interface ShipStorageInterface
{
    /**
     * Return an array of ship arrays, with keys is, name, weaponPower, defense.
     *
     * @return array
     */
    public function fetchAllShipsData();

    /**
     * @param $id
     * @return array
     */
    public function fetchSingleShipData($id);
}