<?php

namespace Pokemons;
require_once "./PokemonMain/Pokemon.php";

use Pokemon;
class GrassPokemon extends Pokemon
{
    public function __construct($newName, $newMaxHp)
    {
        parent::__construct($newName, $newMaxHp, array(-50, 50, -50));
    }

    public function getPokemonTypeName(): string
    {
        return "Grass";
    }
}
