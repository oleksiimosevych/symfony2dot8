<?php

namespace CoursesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AutorCourse
 */
class AutorCourse
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \CoursesBundle\Entity\Autor
     */
    private $autor;

    /**
     * @var \CoursesBundle\Entity\Course
     */
    private $course;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set autor
     *
     * @param \CoursesBundle\Entity\Autor $autor
     * @return AutorCourse
     */
    public function setAutor(\CoursesBundle\Entity\Autor $autor = null)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return \CoursesBundle\Entity\Autor 
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set course
     *
     * @param \CoursesBundle\Entity\Course $course
     * @return AutorCourse
     */
    public function setCourse(\CoursesBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \CoursesBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
