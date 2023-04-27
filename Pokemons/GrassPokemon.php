<?php

namespace Pokemons;

use Pokemon;
class GrassPokemon extends Pokemon
{
    public function __construct($newName, $newMaxHp)
    {
        parent::__construct($newName, $newMaxHp, array(-50, 50, -50));
    }
}
