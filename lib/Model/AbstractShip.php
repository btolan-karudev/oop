<?php
/**
 * Created by PhpStorm.
 * User: ThinkCenter
 * Date: 27/01/2019
 * Time: 19:09
 */

class AbstractShip
{
    private $id;

    private $name;

    private $weaponPower = 0;

    private $strength = 0;

    /**
     * AbstractShip constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function sayHello()
    {
        echo "Hello!";
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function getNameAndSpecs($useShortFormat = false)
    {
        if ($useShortFormat) {
            return sprintf(
                '%s: %s/%s/%s',
                $this->name,
                $this->weaponPower,
                $this->getJediFactor(),
                $this->strength
            );
        } else {
            return sprintf(
                '%s: w:%s, j:%s, s:%s',
                $this->name,
                $this->weaponPower,
                $this->getJediFactor(),
                $this->strength
            );
        }

    }

    public function doesGivenShipHaveMoreStrength($givenShip)
    {
        return $givenShip->strength > $this->strength;
    }

    /**
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     * @throws Exception
     */
    public function setStrength($strength)
    {
        if (!is_numeric($strength)) {
            throw new UnexpectedValueException('Invalid strength passed ' . $strength);
        }

        $this->strength = $strength;
    }

    /**
     * @return int
     */
    public function getWeaponPower()
    {
        return $this->weaponPower;
    }

    /**
     * @param int $weaponPower
     */
    public function setWeaponPower($weaponPower)
    {
        $this->weaponPower = $weaponPower;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}