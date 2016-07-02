<?php

namespace Tennis;

class Match
{
    private $playerOne;
    private $playerTwo;
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
    public function getResult()
    {
        return $this->scoreMapping[$this->playerOne->getScore()] . "-" . $this->scoreMapping[$this->playerTwo->getScore()];
    }
}
