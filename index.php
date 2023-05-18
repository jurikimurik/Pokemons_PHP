<?php
require "visualScript.php";


include "Pokemons/FirePokemon.php";
include "Pokemons/GrassPokemon.php";
include "Pokemons/WaterPokemon.php";

include "fight.php";

?>

<html>
<style>
    table, th, td {
        border:1px solid black;
    }
</style>
<FORM action="fight.php" method = "POST">
    <table>
        <TR>
            <TD>
                <label for="pokemon1">Pokemon 1:</label>
                <select name="pokemon1" id="pokemon1">
                    <option value="">--- Wybierz ---</option>
                    <option value="fire">Ogien</option>
                    <option value="grass">Trawa</option>
                    <option value="water">Woda</option>
                </select>
            </TD>
        </TR>
        <TR>
            <TD>
                <label for="pokemon2">Pokemon 2:</label>
                <select name="pokemon2" id="pokemon2">
                    <option value="">--- Wybierz ---</option>
                    <option value="fire">Ogien</option>
                    <option value="grass">Trawa</option>
                    <option value="water">Woda</option>
                </select>
            </TD>
        </TR>
        <TR>
            <TD>
                <INPUT TYPE = SUBMIT>
            </TD>
        </TR>
    </table>
</FORM>
<body>

<?php

?>






