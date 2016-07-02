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
    function it_scores_0_3_game()
    {
        $this->playerOne->setScore(0);
        $this->playerTwo->setScore(3);

        $this->getResult()->shouldReturn('Love-Forty');
    }
    function it_scores_3_2_game()
    {
        $this->playerOne->setScore(3);
        $this->playerTwo->setScore(2);

        $this->getResult()->shouldReturn('Forty-Thirty');
    }
    function it_scores_4_0_game()
    {
        $this->playerOne->setScore(4);
        $this->playerTwo->setScore(0);

        $this->getResult()->shouldReturn('Game won by Pepe');
    }
    function it_scores_0_4_game()
    {
        $this->playerOne->setScore(0);
        $this->playerTwo->setScore(4);

        $this->getResult()->shouldReturn('Game won by Juan');
    }
    function it_scores_4_3_game()
    {
        $this->playerOne->setScore(4);
        $this->playerTwo->setScore(3);

        $this->getResult()->shouldReturn('Advantage for Pepe');
    }
    function it_scores_4_4_game()
    {
        $this->playerOne->setScore(4);
        $this->playerTwo->setScore(4);

        $this->getResult()->shouldReturn('Deuce');

    }
    function it_scores_1_2_game()
    {
        $this->playerOne->setScore(1);
        $this->playerTwo->setScore(2);

        $this->getResult()->shouldReturn('Fifteen-Thirty');

    }
    function it_scores_8_8_in_a_long_game()
    {
        $this->playerOne->setScore(8);
        $this->playerTwo->setScore(8);

        $this->getResult()->shouldReturn('Deuce');

    }
}
