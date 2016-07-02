<?php

namespace Tennis;
/**
 * Class Match
 * @package Tennis
 */
class Match
{
    const DEUCE = 'Deuce';
    const GAME_WON_BY = 'Game won by ';
    const ADVANTAGE_FOR = 'Advantage for ';
    const ALL = "-all";
    /**
     * @var Player
     */
    private $playerOne;
    /**
     * @var Player
     */
    private $playerTwo;
    /**
     * @var array
     */
    private $scoreMapping = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

    /**
     * Match constructor.
     * @param Player $playerOne
     * @param Player $playerTwo
     */
    public function __construct(Player $playerOne, Player $playerTwo)
    {

        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    /**
     * @return string
     */
    public function getResult()
    {
        if ($this->gameIsInDeuce())
        {
            return self::DEUCE;
        }
        if ($this->thereIsAWinner())
        {
            $winner = $this->getWinner();
            return self::GAME_WON_BY . $winner->getName();
        }
        if ($this->playersAboveFortyPoints())
        {
            $winningPlayer = $this->getWinner();
            return self::ADVANTAGE_FOR . $winningPlayer->getName();
        }
        if ($this->isTide())
        {
            return $this->scoreMapping[$this->playerOne->getScore()] . self::ALL;
        }

        return $this->currentMatchResult();
    }

    /**
     * @return bool
     */
    private function isTide()
    {
        return $this->playerOne->getScore() == $this->playerTwo->getScore();
    }

    /**
     * @return Player
     */
    private function getWinner()
    {
        return $this->playerOne->getScore() > $this->playerTwo->getScore() ? $this->playerOne: $this->playerTwo;
    }

    /**
     * @return bool
     */
    private function thereIsAWinner()
    {
        return ($this->playerOne->getScore() > 3 || $this->playerTwo->getScore() > 3) &&
        (abs($this->playerOne->getScore() - $this->playerTwo->getScore()) > 1);
    }
    /**
     * @return bool
     */
    private function gameIsInDeuce()
    {
        return $this->playersAboveFortyPoints() && $this->isTide();
    }

    /**
     * @return string
     */
    private function currentMatchResult()
    {
        return $this->scoreMapping[$this->playerOne->getScore()] . "-" . $this->scoreMapping[$this->playerTwo->getScore()];
    }

    /**
     * @return bool
     */
    private function playersAboveFortyPoints()
    {
        return $this->playerOne->getScore() >= 3 && $this->playerTwo->getScore() >= 3;
    }
}
