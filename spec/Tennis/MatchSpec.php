<?php

namespace spec\Tennis;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MatchSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Tennis\Match');
    }
}