<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKataTest\Algorithm;

use Katas\IncomprehensibleFinder\AgeDifferenceFinder;
use Katas\IncomprehensibleFinder\Finder;
use Katas\IncomprehensibleFinder\FindCriteria;
use Katas\IncomprehensibleFinder\Person;
use PHPUnit\Framework\TestCase;

final class FinderTest extends TestCase
{
    /** @var Person */
    private $sue;

    /** @var Person */
    private $greg;

    /** @var Person */
    private $sarah;

    /** @var Person */
    private $mike;

    /** @var AgeDifferenceFinder **/
    private $ageDifferenceFinder;

    protected function setUp()
    {
        $this->sue            = new Person();
        $this->sue->name      = "Sue";
        $this->sue->birthDate = new \DateTime("1950-01-01");

        $this->greg            = new Person();
        $this->greg->name      = "Greg";
        $this->greg->birthDate = new \DateTime("1952-05-01");

        $this->sarah            = new Person();
        $this->sarah->name      = "Sarah";
        $this->sarah->birthDate = new \DateTime("1982-01-01");

        $this->mike            = new Person();
        $this->mike->name      = "Mike";
        $this->mike->birthDate = new \DateTime("1979-01-01");

        $this->ageDifferenceFinder = new AgeDifferenceFinder();
    }

    /** @test */
    public function should_return_empty_when_given_empty_list()
    {
        $list   = [];
        $finder = new Finder($list, $this->ageDifferenceFinder);

        $result = $finder->find(FindCriteria::CLOSEST);

        $this->assertEquals(null, $result->oldest);
        $this->assertEquals(null, $result->youngest);
    }

    /** @test */
    public function should_return_empty_when_given_one_person()
    {
        $list   = [];
        $list[] = $this->sue;
        $finder = new Finder($list, $this->ageDifferenceFinder);

        $result = $finder->find(FindCriteria::CLOSEST);

        $this->assertEquals(null, $result->oldest);
        $this->assertEquals(null, $result->youngest);
    }

    /** @test */
    public function should_return_closest_two_for_two_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->greg;
        $finder = new Finder($list, $this->ageDifferenceFinder);

        $result = $finder->find(FindCriteria::CLOSEST);

        $this->assertEquals($this->sue, $result->oldest);
        $this->assertEquals($this->greg, $result->youngest);
    }

    /** @test */
    public function should_return_furthest_two_for_two_people()
    {
        $list   = [];
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new Finder($list, $this->ageDifferenceFinder);

        $result = $finder->find(FindCriteria::FURTHEST);

        $this->assertEquals($this->greg, $result->oldest);
        $this->assertEquals($this->mike, $result->youngest);
    }

    /** @test */
    public function should_return_furthest_two_for_four_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->sarah;
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new Finder($list, $this->ageDifferenceFinder);

        $result = $finder->find(FindCriteria::FURTHEST);

        $this->assertEquals($this->sue, $result->oldest);
        $this->assertEquals($this->sarah, $result->youngest);
    }

    /**
     * @test
     */
    public function should_return_closest_two_for_four_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->sarah;
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new Finder($list, $this->ageDifferenceFinder);

        $result = $finder->find(FindCriteria::CLOSEST);

        $this->assertEquals($this->sue, $result->oldest);
        $this->assertEquals($this->greg, $result->youngest);
    }
}
