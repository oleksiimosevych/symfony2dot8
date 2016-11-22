<?php

namespace CoursesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CoursesBundle\Entity\Category;

// use CoursesBundle\Form\CategoryType;
/**
* Category controller.
*
*/
class CategoryController extends Controller
{
 	public function showAction($slug, $page)
	{
	    $em = $this->getDoctrine()->getManager();
	 
	    $category = $em->getRepository('CoursesBundle:Category')->findOneBySlug($slug);
	 
	    if (!$category) {
	        throw $this->createNotFoundException('Unable to find Category entity.');
	    }
	 	
	$total_coursos = $em->getRepository('CoursesBundle:Course')->countActiveCoursos($category->getId());
    $coursos_per_page = $this->container->getParameter('max_coursos_on_category');
    $last_page = ceil($total_coursos / $coursos_per_page);
    $previous_page = $page > 1 ? $page - 1 : 1;
    $next_page = $page < $last_page ? $page + 1 : $last_page;
    $category->setActiveCoursos($em->getRepository('CoursesBundle:Course')->getActiveCoursos($category->getId(), $coursos_per_page, ($page - 1) * $coursos_per_page));
 
    return $this->render('category/show.html.twig', array(
        'category' => $category,
        'last_page' => $last_page,
        'previous_page' => $previous_page,
        'current_page' => $page,
        'next_page' => $next_page,
        'total_coursos' => $total_coursos
    ));

	    // $category->setActiveCoursos($em->getRepository('CoursesBundle:Course')->getActiveCoursos($category->getId()));
	 
	    //return $this->render('category/show.html.twig', array('category' => $category,));//там має бути кома походу . і це пов'язано з templates
	}

}

?>