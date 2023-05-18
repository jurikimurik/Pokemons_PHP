<?php
require_once "Battle/Battle.php";
require_once "Pokemons/FirePokemon.php";
require_once "Pokemons/GrassPokemon.php";
require_once "Pokemons/WaterPokemon.php";
require_once "visualScript.php";

// Start the session
session_start();


if(!isset($_SESSION['FIRST'])  | !isset($_SESSION['ANOTHER'])) {
    header("Location: index.php");
}
//Example obejcts

$pokemon1 = unserialize($_SESSION['FIRST']);
$pokemon2 = unserialize($_SESSION['ANOTHER']);

echo narysujPokemona($pokemon1);
echo narysujPokemona($pokemon2);

if(!isset($_SESSION['BATTLE']))
{
    $_SESSION['BATTLE'] = true;
} else {
    $Battle = new \Battle\Battle($pokemon1, $pokemon2);
    $Battle->battle();

    $_SESSION['FIRST'] = serialize($Battle->getAttacker());
    $_SESSION['ANOTHER'] = serialize($Battle->getDeffender());

    var_dump($_SESSION['FIRST']);
    var_dump($_SESSION['ANOTHER']);
}




?>

<html>
<style>
    table, th, td {
        border:1px solid black;
    }
</style>
<FORM action="fight.php" >
    <table>
        <TR>
            <TD>
                <INPUT TYPE = SUBMIT value = "NASTEPNY RUCH">
            </TD>
        </TR>
    </table>
</FORM>
<body>
