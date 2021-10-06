<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class MyModel
{
    /**
     * @Assert\Positive()
     * @Assert\Type("float"),
     * @Assert\DivisibleBy(0.01),
     */
    public $amount;

    /**
     * @Assert\Positive()
     * @Assert\Type("float"),
     * @Assert\DivisibleBy(
     *     value = 0.01
     * ),
     */
    public $amountBis;

    public function __construct($value)
    {
        $this->amount = (float)$value;
        $this->amountBis = (float)$value;
    }
}
