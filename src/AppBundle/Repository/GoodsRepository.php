<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Goods;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query\Expr\Join;

class GoodsRepository extends EntityRepository
{

    public function findGoods($type)
    {
        /** @var EntityManager $em */
        $em = $this->getEntityManager();

        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $em->createQueryBuilder();

        $queryBuilder
            ->select('g.id,g.title,p.price,f.basename')
            ->from('AppBundle:Goods', 'g')
            ->leftJoin('AppBundle:Prices', 'p', Join::WITH, 'p.goods = g.id')
            ->leftJoin('AppBundle:Photos', 'f', Join::WITH, 'f.goodsId = g.id')
            ->where('p.priceTypeId = :type')
            ->orderBy('g.id')
            ->setParameter('type',$type)
            ;

        $array = $queryBuilder->getQuery()->getArrayResult();

       return $array;
    }
}