<?php
/**
 * Created by PhpStorm.
 * User: javi
 * Date: 02/07/16
 * Time: 20:05
 */

namespace Tennis;


class Player
{
    /** @var integer $score */
    public $score;
    /** @var string $name */
    public $name;

    public function __construct($name, $score)
    {
        $this->name = $name;
        $this->score = $score;
    }

    /**
     * @param int $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}