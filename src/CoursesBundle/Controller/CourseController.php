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
        $course = new Course();
        $form = $this->createForm('CoursesBundle\Form\CourseType', $course);
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
    public function editAction(Request $request, Course $course)
    {
        $deleteForm = $this->createDeleteForm($course);
        $editForm = $this->createForm('CoursesBundle\Form\CourseType', $course);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();

            return $this->redirectToRoute('course_edit', array('id' => $course->getId()));
        }

        return $this->render('course/edit.html.twig', array(
            'course' => $course,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Course entity.
     *
     */
    public function deleteAction(Request $request, Course $course)
    {
        $form = $this->createDeleteForm($course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($course);
            $em->flush();
        }

        return $this->redirectToRoute('course_index');
    }

    /**
     * Creates a form to delete a Course entity.
     *
     * @param Course $course The Course entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Course $course)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('course_delete', array('id' => $course->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
