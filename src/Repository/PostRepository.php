<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function getPostsWithPagination($page = 1)
    {
        $query = $this->createQueryBuilder('post')
            ->andWhere('post.is_published = 1')
            ->orderBy('post.id', 'DESC')
            ->getQuery();

        return $this->paginate($query, $page);
    }

    public function getPostsWithPaginationAsArray($page = 1)
    {
        $query = $this->createQueryBuilder('post')
            ->andWhere('post.is_published = 1')
            ->leftJoin('post.categories', 'category')
            ->addSelect('category')
            ->orderBy('post.id', 'DESC')
            ->getQuery();

        $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        return $this->paginate($query, $page);
    }

    /**
     * Paginator Helper
     *
     * Pass through a query object, current page & limit
     * the offset is calculated from the page and limit
     * returns an `Paginator` instance, which you can call the following on:
     *
     *     $paginator->getIterator()->count() # Total fetched (ie: `10` posts)
     *     $paginator->count() # Count of ALL posts (ie: `20` posts)
     *     $paginator->getIterator() # ArrayIterator
     *
     * @param Doctrine\ORM\Query $dql   DQL Query Object
     * @param integer            $page  Current page (defaults to 1)
     *
     * @return \Doctrine\ORM\Tools\Pagination\Paginator
     */
    public function paginate($dql, $page = 1)
    {
        $paginator = new Paginator($dql);

        $paginator->getQuery()
            ->setFirstResult(Post::NUM_ITEMS * ($page - 1)) // Offset
            ->setMaxResults(Post::NUM_ITEMS); // Limit

        return $paginator;
    }

//    /**
//     * @return Post[] Returns an array of Post objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Post
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
