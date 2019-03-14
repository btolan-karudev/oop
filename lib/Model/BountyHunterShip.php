<?php
/**
 * Created by PhpStorm.
 * User: ThinkCenter
 * Date: 14/03/2019
 * Time: 09:08
 */

namespace Model;


class BountyHunterShip extends AbstractShip
{
    use SettableJediFactorTrait;

    public function isFunctional()
    {
        return true;
    }

    public function getType()
    {
        return 'Bounty Hunter';
    }
}