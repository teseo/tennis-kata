<?php

namespace spec\Tennis;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Tennis\Player;

class MatchSpec extends ObjectBehavior
{
    /** @var  Player $playerOne*/
    protected $playerOne;
    /** @var  Player $playerTwo*/
    protected $playerTwo;

    function let()
    {
        $this->playerOne = new Player('Pepe', 0);
        $this->playerTwo = new Player('Juan', 0);
        
        $this->beConstructedWith($this->playerOne, $this->playerTwo);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Tennis\Match');
    }

    function it_should_return_love_all_when_match_starts()
    {
        $this->getResult()->shouldReturn('Love-all');
    }
    function it_scores_1_0_game()
    {
        $this->playerOne->setScore(1);
        $this->playerTwo->setScore(0);

        $this->getResult()->shouldReturn('Fifteen-Love');
    }
    function it_scores_2_0_game()
    {
        $this->playerOne->setScore(2);
        $this->playerTwo->setScore(0);

        $this->getResult()->shouldReturn('Thirty-Love');
    }
    function it_scores_3_0_game()
    {
        $this->playerOne->setScore(3);
        $this->playerTwo->setScore(0);

        $this->getResult()->shouldReturn('Forty-Love');
    }
    function it_scores_3_2_game()
    {
        $this->playerOne->setScore(3);
        $this->playerTwo->setScore(2);

        $this->getResult()->shouldReturn('Forty-Thirty');
    }

}
