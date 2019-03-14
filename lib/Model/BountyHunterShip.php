<?php

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