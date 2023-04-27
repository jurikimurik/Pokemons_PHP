<?php

namespace Battle;
require "../PokemonMain/Pokemon.php";

class Battle
{
    private $chosenAttackType;

    private \Pokemon $attacker;
    private \Pokemon $deffender;
    public function __construct($playerPokemon, $enemyPokemon)
    {
        $playerPokemon->restoreState();
        $this->attacker = $playerPokemon;
        $enemyPokemon->restoreState();
        $this->deffender = $enemyPokemon;

        $this->battle();
    }

    private function battle()
    {
        while (true)
        {
            if ($this->attacker->getParalysed())
            {
                $this->attacker->restoreState();
            }
            else if ($this->attacker->getConfused())
            {
                $this->attacker->Attack($this->attacker, \AttackType::AttackSelf);
                $this->attacker->restoreState();

                if ($this->attacker->getCurrentHp() <= 0)
                {
                    $this->lose($this->attacker);
                }
            }
            else
            {
                // PARAM TO CHANGE ADD TEXT WITH ATTACKS TO CHOOSE FROM
                $testParam = 1;

                switch ($testParam)
                {
                    case 1:
                        $this->attacker->Attack($this->deffender, \AttackType::BaseAttack);
                        break;
                    case 2:
                        if ($this->attacker->Attack($this->deffender, \AttackType::Confuse))
                        {
                            $this->deffender->confuse();
                        }
                        break;
                    case 3:
                        if ($this->attacker->Attack($this->deffender, \AttackType::Paralyse))
                        {
                            $this->deffender->paralyse();
                        }
                        break;
                }
            }
        }
    }

    private function lose($loser)
    {

    }
}