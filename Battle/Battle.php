<?php

namespace Battle;
require_once "PokemonMain/Pokemon.php";

class Battle
{
    /**
     * @return \Pokemon
     */
    public function getAttacker(): \Pokemon
    {
        return $this->attacker;
    }

    /**
     * @return \Pokemon
     */
    public function getDeffender(): \Pokemon
    {
        return $this->deffender;
    }
    /**
     * @return \Pokemon
     */
    public function getPlayer(): \Pokemon
    {
        return $this->player;
    }

    /**
     * @return \Pokemon
     */
    public function getEnemy(): \Pokemon
    {
        return $this->enemy;
    }
    private $chosenAttackType;

    private \Pokemon $attacker;
    private \Pokemon $deffender;

    private \Pokemon $player;
    private \Pokemon $enemy;

    public $playerWon;
    public $enemyWon;

    public function __construct($playerPokemon, $enemyPokemon)
    {
        $this->player = $playerPokemon;
        $this->enemy = $enemyPokemon;

        $playerPokemon->restoreState();
        $this->attacker = $playerPokemon;
        $enemyPokemon->restoreState();
        $this->deffender = $enemyPokemon;

        #$this->battle();
    }

    public function battle()
    {
        #while (true)
        #{
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
            else {

                if ($this->attacker == $this->player)
                {
                    $attackParam = 1;
                }
                else
                {
                    $attackParam = rand(1,3);
                }
                switch ($attackParam)
                {
                    case 1:
                        $this->attacker->Attack($this->deffender, \AttackType::BaseAttack);
                        break;
                    case 2:
                        if ($this->attacker->Attack($this->deffender, \AttackType::Confuse))
                        {
                            // works if confused
                            $this->deffender->confuse();
                        }
                        break;
                    case 3:
                        if ($this->attacker->Attack($this->deffender, \AttackType::Paralyse))
                        {
                            // works if paralysed
                            $this->deffender->paralyse();
                        }
                        break;
                }
            }

        if ($this->deffender->getCurrentHp() <= 0)
        {
            $this->lose($this->deffender);
        }

            // swaps enemy and attacker
            $this->swap();
        #}
    }

    private function swap()
    {
        $temp = $this->attacker;
        $this->attacker = $this->deffender;
        $this->deffender = $temp;
    }
    private function lose($loser)
    {
        if ($loser == $this->player)
        {
            $this->playerWon = false;
            $this->enemyWon = true;
            //YOU LOST
        }
        else if ($loser == $this->enemy)
        {
            $this->playerWon = true;
            $this->enemyWon = false;
            // ENEMY LOST
        }
        #$this->player->restoreHp();

    }
}