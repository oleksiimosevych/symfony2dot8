<?php
namespace CoursesBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
// use CoursesBundle\Utils\Courses as Courses;

class Courses
{
    static public function slugify($text)
    {
        // replace all non letters or digits by -
        $text = preg_replace('/\W+/', '-', $text);
 
        // trim and lowercase
        $text = strtolower(trim($text, '-'));
 
        return $text;
    }
}

/**
 * Course
 */

class Course
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $contents;

    /**
     * @var integer
     */
    private $price;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $autor_courses;

    /**
     * @var \CoursesBundle\Entity\Category
     */
    private $category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->autor_courses = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     * @return Course
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set contents
     *
     * @param string $contents
     * @return Course
     */
    public function setContents($contents)
    {
        $this->contents = $contents;

        return $this;
    }

    /**
     * Get contents
     *
     * @return string 
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Course
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add autor_courses
     *
     * @param \CoursesBundle\Entity\AutorCourse $autorCourses
     * @return Course
     */
    public function addAutorCourse(\CoursesBundle\Entity\AutorCourse $autorCourses)
    {
        $this->autor_courses[] = $autorCourses;

        return $this;
    }

    /**
     * Remove autor_courses
     *
     * @param \CoursesBundle\Entity\AutorCourse $autorCourses
     */
    public function removeAutorCourse(\CoursesBundle\Entity\AutorCourse $autorCourses)
    {
        $this->autor_courses->removeElement($autorCourses);
    }

    /**
     * Get autor_courses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAutorCourses()
    {
        return $this->autor_courses;
    }

    /**
     * Set category
     *
     * @param \CoursesBundle\Entity\Category $category
     * @return Course
     */
    public function setCategory(\CoursesBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \CoursesBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;


    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Course
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Course
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
         if(!$this->getCreatedAt())
            {
                $this->created_at = new \DateTime();
            }
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
        $this->updated_at = new \DateTime();
    }
///////// //src/bun/entity/course.php

    // public function getIdSlug()
    // {
    //     return Courses::slugify($this->getId());
    // }
 
    public function getNameSlug()
    {
        return Courses::slugify($this->getName());
    }

    // public function getContentsSlug()
    // {
    //     return Courses::slugify($this->getContents());
    // }
    public function getPriceSlug()
    {
        return Courses::slugify($this->getPrice());
    }
    // public function getAutorCoursesSlug()
    // {
    //     return Courses::slugify($this->getAutorCourses());
    // }
    public function getCategorySlug()
    {
        return Courses::slugify($this->getCategory());
    }
    // public function getCreatedAtSlug()
    // {
    //     return Courses::slugify($this->getCreatedAt());
    // }
    // public function getUpdatedAtSlug()
    // {
    //     return Courses::slugify($this->getUpdatedAt());
    // }
    //////       

    /**
     * @ORM\PrePersist
     */
    public function setExpiresAtValue()
    {
        // Add your code here
        $now = $this->getCreatedAt() ? $this->getCreatedAt()->format('U') : time();
        $this->expires_at = new \DateTime(date('Y-m-d H:i:s', $now + 86400 * 30));
    }
    /**
     * @var \DateTime
     */
    private $expires_at;


    /**
     * Set expires_at
     *
     * @param \DateTime $expiresAt
     * @return Course
     */
    public function setExpiresAt($expiresAt)
    {
        if(!$this->getExpiresAt()){
        //$this->expires_at = $expiresAt;
        $now= $this->getCreatedAt() ? $this->getCreatedAt()->format('U') : time();
        $this->expires_at = new \DateTime(date('Y-m-d H:i:s', $now + 86400 * 30));
        }//return $this;
    }

    /**
     * Get expires_at
     *
     * @return \DateTime 
     */
    public function getExpiresAt()
    {
        return $this->expires_at;
    }

     public static function getTypes()
    {
        return array('full-time' => 'Full time', 'part-time' => 'Part time', 'freelance' => 'Freelance');
    }
 
    public static function getTypeValues()
    {
        return array_keys(self::getTypes());
    }
    
}
