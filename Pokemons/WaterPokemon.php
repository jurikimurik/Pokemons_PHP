<?php

namespace Pokemons;
require "../PokemonMain/Pokemon.php";

use Pokemon;
class WaterPokemon extends Pokemon
{
    public function __construct($newName, $newMaxHp)
    {
        parent::__construct($newName, $newMaxHp, array(50, -50, -50));
    }
}