<?php

declare(strict_types = 1);

namespace Katas\IncomprehensibleFinder;

final class AgeDifferenceBetweenTwoPeople
{
    /** @var Person */
    public $oldest;

    /** @var Person */
    public $youngest;

    /** @var int */
    public $ageDifference;

    public function __construct(Person $person1 = null, Person $person2 = null)
    {
        if ($person1 === null || $person2 === null) {
            return;
        }

        if ($person1->birthDate < $person2->birthDate) {
            $this->oldest = $person1;
            $this->youngest = $person2;
        } else {
            $this->oldest = $person2;
            $this->youngest = $person1;
        }

        $this->ageDifference =
            $this->youngest->birthDate->getTimestamp()
            - $this->oldest->birthDate->getTimestamp();
    }
}
