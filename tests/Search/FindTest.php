<?php

namespace Baldeweg\Bundle\BookBundle\Tests;

use Baldeweg\Bundle\BookBundle\Search\Filter;
use Baldeweg\Bundle\BookBundle\Search\Find;
use Baldeweg\Bundle\BookBundle\Search\OrderBy;
use Baldeweg\Bundle\BookBundle\Search\Term;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use PHPUnit\Framework\TestCase;

class FindTest extends TestCase
{
    public function testOrderBy()
    {
        $query = $this->getMockBuilder(AbstractQuery::class)
            ->disableOriginalConstructor()
            ->getMock();
        $query->method('getResult')
            ->willReturn([]);
        $query->method('getSingleScalarResult')
            ->willReturn(1);

        $qb = $this->getMockBuilder(QueryBuilder::class)
            ->disableOriginalConstructor()
            ->getMock();
        $qb->method('getQuery')
            ->willReturn($query);

        $em = $this->getMockBuilder(EntityManagerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $em->method('createQueryBuilder')
            ->willReturn($qb);

        $term = $this->getMockBuilder(Term::class)
            ->disableOriginalConstructor()
            ->getMock();

        $filter = $this->getMockBuilder(Filter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $orderBy = $this->getMockBuilder(OrderBy::class)
            ->disableOriginalConstructor()
            ->getMock();

        $find = new Find($em, $term, $filter, $orderBy);

        $this->assertIsArray($find->find([]));
        $this->assertIsInt($find->count([]));
    }
}
