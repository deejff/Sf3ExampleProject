<?php

namespace ExampleBundle\Repository;

use Doctrine\ORM\EntityRepository;

class User extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getListQueryBuilder()
    {
        return $this->createQueryBuilder('u');
    }
}