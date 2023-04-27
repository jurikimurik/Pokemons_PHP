<?php


function narysujPokemonaZTablicy($tablica) {
    $str = "<table>
    <tr>
        <th>Nazwa</th>
        <th>Zywiol</th>
        <th>Liczba HP</th>
        <th>Aktualna Liczba HP</th>
    </tr>
    <tr>
        <td>"."$tablica[0]"."</td>
        <td>"."$tablica[1]"."</td>
        <td>"."$tablica[2]"."</td>
        <td>"."$tablica[3]"."</td>
</tr>
</table>";



    return <<<HTML
    <html>
    <body><h1>{$str}</h1>
    </body>
    </html>
HTML;
}


function narysujPokemona(Pokemon $pokemon) {
    $name = $pokemon->getName();
    $type = $pokemon->getPokemonTypeName();
    $maxHp = $pokemon->getMaxHp();
    $hp = $pokemon->getCurrentHp();
    $str = "<table>
    <tr>
        <th>Nazwa</th>
        <th>Zywiol</th>
        <th>Liczba HP</th>
        <th>Aktualna Liczba HP</th>
    </tr>
    <tr>
        <td>"."$name"."</td>
        <td>"."$type"."</td>
        <td>"."$maxHp"."</td>
        <td>"."$hp"."</td>
</tr>
</table>";



    return <<<HTML
    <html>
    <body><h1>{$str}</h1>
    </body>
    </html>
HTML;
}
