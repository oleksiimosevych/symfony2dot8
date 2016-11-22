<?php

namespace CoursesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CoursesBundle\Entity\Course;
use CoursesBundle\Form\CourseType;

/**
 * Course controller.
 *
 */
class CourseController extends Controller
{
    /**
     * Lists all Course entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('CoursesBundle:Category')->getWithCoursos();
        foreach($categories as $category)
          {
          $category->setActiveCoursos($em->getRepository('CoursesBundle:Course')->getActiveCoursos($category->getId(),$this->container->getParameter('max_coursos_on_homepage')));//added here
          $category->setMoreCoursos($em->getRepository('CoursesBundle:Course')->countActiveCoursos($category->getId())- $this->container->getParameter('max_coursos_on_homepage'));//added here 211116 7 44
          //10 sheets
          }
          //


        return $this->render('course/index.html.twig', array('categories' => $categories));

        // $em = $this->getDoctrine()->getManager();

        // $courses = $em->getRepository('CoursesBundle:Course')->getActiveCoursos();
        // //$query = $em->createQuery('SELECT j FROM CoursesBundle:Course j WHERE j.expires_at > :date')->setParameter('date', date('Y-m-d H:i:s', time()));
        // //$courses = $query->getResult();
        // return $this->render('course/index.html.twig', array(
        //     'courses' => $courses,
        // ));
    }

    /**
     * Creates a new Course entity.
     *
     */
    public function newAction(Request $request)
    {
      $timenow = date("Y-m-d H:i");
      //$timenow2=  $now->format("m-d-Y H:i:s.u");
      //$timenow='2016-11-22 11:00';
        $course = new Course();
        // $course->setType('full-time');
        $course->setType('full-time');
        
        $course->setCreatedAt(new \DateTime($timenow));
        $course->setUpdatedAt(new \DateTime($timenow));
        
        $form = $this->createForm(new CourseType, $course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();

            return $this->redirectToRoute('course_show', array('id' => $course->getId()));
        }

        return $this->render('course/new.html.twig', array(
            'course' => $course,
            'form' => $form->createView(),
        ));
    }
    public function createAction(Request $request)
    {
        $course = new Course();
        $form = $this->createForm(new CourseType, $course);//new
        //$form->handleRequest($request);
        $form->bind($request);

        if (/*$form->isSubmitted() && */$form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //added file upload
            // $course->file->move(__DIR__.'/../../../../web/uploads/coursos', $course->file->getClientOriginalName());
            // $course->setLogo($course->file->getClientOriginalName());//now we need logo

            $em->persist($course);
            $em->flush();

            //return $this->redirectToRoute('course_show', array('id' => $course->getId()));
            return $this->redirect($this->generateUrl('course_preview', array(
            'name' => $course->getNameSlug(),
            'price' => $course->getPriceSlug(),
            'category' => $course->getCategorySlug(),
            'token' => $course->getToken()
        )));
        }

        return $this->render('course/new.html.twig', array(
            'course' => $course,
            'form' => $form->createView(),
        ));//changes in this block 22 11 16 13 57
    }

    /**
     * Finds and displays a Course entity.
     *
     */
    public function showAction(Course $course)
    {
      $deleteForm = $this->createDeleteForm($course);
      try{
      $id=$course->getId();
      $em = $this->getDoctrine()->getManager();
      $course = $em->getRepository('CoursesBundle:Course')->getActiveCourse($id);
      }catch(Exception $e){
        echo "zz";
      }

        return $this->render('course/show.html.twig', array(
            'course' => $course,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Course entity.
     *
     */
    public function editAction($token)
    {
        // 
        // 
        // $editForm->handleRequest($request);

        //if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $course = $em->getRepository('CoursesBundle:Course')->findOneByToken($token);
            if (! $course) {
              # code...
              throw $this->createNotFoundException('Unable to find Course entity.');
            }
            $editForm = $this->createForm(new CourseType, $course); 
            $deleteForm = $this->createDeleteForm($token);

            //$em->persist($course);
            //$em->flush();

            //return $this->redirectToRoute('course_edit', array('id' => $course->getId()));
        // }

        return $this->render('course/edit.html.twig', array(
            'course' => $course,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /////////////
    public function updateAction(Request $request, $token)
    {
        $em = $this->getDoctrine()->getManager();
 
        $course = $em->getRepository('CoursesBundle:Course')->findOneByToken($token);
 
        if (!$course) {
            throw $this->createNotFoundException('Unable to find Course entity.');
        }
 
        $editForm   = $this->createForm(new CourseType(), $course);
        $deleteForm = $this->createDeleteForm($token);
 
        $editForm->bind($request);
 
        if ($editForm->isValid()) {
            $em->persist($course);
            $em->flush();
 
            //return $this->redirect($this->generateUrl('course_preview', array('token' => $token)));
            return $this->redirect($this->generateUrl('course_preview', array(
              'name' => $course->getNameSlug(),
              'price' => $course->getPriceSlug(),
              'category' => $course->getCategorySlug(),
              'token' => $course->getToken()
              )));
        }
 
        return $this->render('course/edit.html.twig', array(
            'course'      => $course,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /////////////
    /**
     * Deletes a Course entity.
     *
     */
    public function deleteAction(Request $request, $token)
    {
        $form = $this->createDeleteForm($token);
        $form->bind($request);

        if (/*$form->isSubmitted() &&*/ $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $course= $em->getRepository('CoursesBundle:Course')->findOneByToken($token);

            if(! $course){
              throw $this->createNotFoundException('Unable to find Course entity.');
            }
            $em->remove($course);
            $em->flush();
        }

        //return $this->redirectToRoute('course_index');
        return $this->redirect($this->generateUrl('course_index'));
    }

    /**
     * Creates a form to delete a Course entity.
     *
     * @param Course $course The Course entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($token)
    {
        return $this->createFormBuilder(array('token' => $token))
            ->add('token', 'hidden')
            ->getForm()
        ;
        //     ->setAction($this->generateUrl('course_delete', array('id' => $course->getId())))
        //     ->setMethod('DELETE')
        //     ->getForm()
        // ;
    }


    public function previewAction($token)
    {

        $em = $this->getDoctrine()->getManager();
 
        $course = $em->getRepository('CoursesBundle:Course')->findOneByToken($token);
 
        if (!$course) {
            throw $this->createNotFoundException('Unable to find Course entity.');
        }
 
        $deleteForm = $this->createDeleteForm($course->getToken());
        $publishForm = $this->createPublishForm($course->getToken());

 
        return $this->render('course/show.html.twig', array(
            'course'      => $course,//entity??
            'delete_form' => $deleteForm->createView(),
            'publish_form' => $publishForm->createView(),
        ));
    }


    public function publishAction(Request $request, $token)
  {
    $form = $this->createPublishForm($token);
    $form->bind($request);
 
    if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $course = $em->getRepository('CoursesBundle:Course')->findOneByToken($token);
 
        if (!$course) {
            throw $this->createNotFoundException('Unable to find Course entity.');
        }
 
        $course->publish();
        $em->persist($course);
        $em->flush();
 
        $this->get('session')->getFlashBag()->add('notice', 'Your course is now online for 30 days.');
    }
 
    return $this->redirect($this->generateUrl('course_preview', array(
        'name' => $course->getNameSlug(),
        'price' => $course->getPriceSlug(),
        'category' => $course->getCategorySlug(),
        'token' => $course->getToken()
    )));
  }

  private function createPublishForm($token)
  {
    return $this->createFormBuilder(array('token' => $token))
        ->add('token', 'hidden')
        ->getForm()
    ;
  }


}
