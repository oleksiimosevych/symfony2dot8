<?php
//CategoryConroller.php

namespace CoursesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CoursesBundle\Entity\Category;
use CoursesBundle\Form\CategoryType;

/**
 * Course controller.
 *
 */
class CategoryController extends Controller
{
	public function indexcction()
	{
		  $em = $this->getDoctrine()->getEntityManager();
		 
		  $categories = $em->getRepository('CoursesBundle:Category')->getWithCoursos();
		 
		  foreach($categories as $category)
		  {
		    $category->setActiveCoursos($em->getRepository('CoursesBundle:Course')->getActiveCoursos($category->getId(),10));
		  }
		 
		  return $this->render('CousesBundle:Course:index.html.twig', array(
		    'categories' => $categories
		  ));
	}
}