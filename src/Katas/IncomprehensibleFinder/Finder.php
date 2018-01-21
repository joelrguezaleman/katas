<?php

declare(strict_types = 1);

namespace Katas\IncomprehensibleFinder;

final class Finder
{
    /** @var Person[] */
    private $people;

    public function __construct(array $people)
    {
        $this->people = $people;
    }

    public function find(int $ft): F
    {
        /** @var F[] $tr */
        $tr = [];

        for ($i = 0; $i < count($this->people); $i++) {
            for ($j = $i + 1; $j < count($this->people); $j++) {
                $r = new F();

                if ($this->people[$i]->birthDate < $this->people[$j]->birthDate) {
                    $r->person1 = $this->people[$i];
                    $r->person2 = $this->people[$j];
                } else {
                    $r->person1 = $this->people[$j];
                    $r->person2 = $this->people[$i];
                }

                $r->ageDifference = $r->person2->birthDate->getTimestamp()
                    - $r->person1->birthDate->getTimestamp();

                $tr[] = $r;
            }
        }

        if (count($tr) < 1) {
            return new F();
        }

        $answer = $tr[0];

        foreach ($tr as $result) {
            switch ($ft) {
                case FT::ONE:
                    if ($result->ageDifference < $answer->ageDifference) {
                        $answer = $result;
                    }
                    break;

                case FT::TWO:
                    if ($result->ageDifference > $answer->ageDifference) {
                        $answer = $result;
                    }
                    break;
            }
        }

        return $answer;
    }
}
