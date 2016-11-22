<?php

namespace CoursesBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CourseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CourseRepository extends EntityRepository
{
	public function getActiveCoursos($category_id = null, $max=null, $offset=null)
  {
    $qb = $this->createQueryBuilder('j')
      ->where('j.expires_at > :date')
      ->setParameter('date', date('Y-m-d H:i:s', time()))
      ->orderBy('j.expires_at', 'DESC');
 	if($max)
	  {
	    $qb->setMaxResults($max);
	  }
  if($offset){
    $qb->setFirstResult($offset); 
  }
    if($category_id)
    {
      $qb->andWhere('j.category = :category_id')
         ->setParameter('category_id', $category_id);
    }
 
    $query = $qb->getQuery();
 
    return $query->getResult();
  }
//new func 6 40 at 211116
  public function getActiveCourse($id)
  {
    $query = $this->createQueryBuilder('j')
      ->where('j.id = :id')
      ->setParameter('id', $id)
      ->andWhere('j.expires_at > :date')
      ->setParameter('date', date('Y-m-d H:i:s', time()))
      ->setMaxResults(1)
      ->getQuery();
   
    try {
      $course = $query->getSingleResult();
    } catch (\Doctrine\Orm\NoResultException $e) {
      $course = null;
      echo "<table class='table'><h1>Цей курс уже пройшов. Вибачте :'(</h1>";
    }
 
  return $course;
  }

  public function countActiveCoursos($category_id = null)
  {
    $qb = $this->createQueryBuilder('j')
      ->select('count(j.id)')
      ->where('j.expires_at > :date')
      ->setParameter('date', date('Y-m-d H:i:s', time()));
   
    if($category_id)
    {
      $qb->andWhere('j.category = :category_id')
      ->setParameter('category_id', $category_id);
    }
   
    $query = $qb->getQuery();
   
    return $query->getSingleScalarResult();
  }






}
