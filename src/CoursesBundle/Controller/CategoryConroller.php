<?php

namespace CoursesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CoursesBundle\Entity\Category;

use CoursesBundle\Form\CategoryType;
/**
* Category controller.
*
*/
class CategoryController extends Controller
{
 	public function showAction($slug)
	{
	    $em = $this->getDoctrine()->getEntityManager();
	 
	    $category = $em->getRepository('CoursesBundle:Category')->findOneBySlug($slug);
	 
	    if (!$category) {
	        throw $this->createNotFoundException('Unable to find Category entity.');
	    }
	 
	    $category->setActiveCoursos($em->getRepository('CoursesBundle:Course')->getActiveCoursos($category->getId()));
	 
	    return $this->render('category/show.html.twig', array(
	        'category' => $category,
	    ));
	}

}