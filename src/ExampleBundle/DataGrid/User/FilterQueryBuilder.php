<?php

namespace ExampleBundle\DataGrid\User;

use Deejff\DataGridBundle\DataGrid\FilterQueryBuilderInterface;
use Doctrine\ORM\QueryBuilder;

class FilterQueryBuilder implements FilterQueryBuilderInterface
{
    public function build(QueryBuilder $qb, $data)
    {
        if (!empty($data['firstName'])) {
            $qb->andWhere('u.firstName LIKE :firstName');
            $qb->setParameter(':firstName', '%' . $data['firstName'] . '%');
        }

        if (!empty($data['lastName'])) {
            $qb->andWhere('u.lastName LIKE :lastName');
            $qb->setParameter(':lastName', '%' . $data['lastName'] . '%');
        }

        if (!empty($data['email'])) {
            $qb->andWhere('u.email LIKE :email');
            $qb->setParameter(':email', '%' . $data['email'] . '%');
        }
    }
}