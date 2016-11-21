<?php
// src/Ens/JobeetBundle/DataFixtures/ORM/LoadCategoryData.php
namespace CoursesBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use CoursesBundle\Entity\Course;
 
class LoadCourseData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
    $java_for_dummies = new Course();
    $java_for_dummies->setName('Java for dummies');
    $java_for_dummies->setContents('Java is a programming lang which....');
    $java_for_dummies->setPrice(30);
    $java_for_dummies->setCategory($em->merge($this->getReference('category-java')));
       
 
    $php_for_dummies = new Course();
    $php_for_dummies->setName('Php');
    $php_for_dummies->setContents('Php for dummies is a course about programming lang which....');
    $php_for_dummies->setPrice(50);
    $php_for_dummies->setCategory($em->merge($this->getReference('category-php')));
       
    $cpp_for_profi = new Course();
    $cpp_for_profi->setName('C++ for professionals');
    $cpp_for_profi->setContents('C++ for profi 2016 is a course about programming lang which....');
    $cpp_for_profi->setPrice(300);
    $cpp_for_profi->setCategory($em->merge($this->getReference('category-cpp')));
    
    $cpp_for_dummies = new Course();
    $cpp_for_dummies->setName('C++ for dummies');
    $cpp_for_dummies->setContents('C++ for dummies 2016 is a course about programming lang which....');
    $cpp_for_dummies->setPrice(100);
    $cpp_for_dummies->setCategory($em->merge($this->getReference('category-cpp')));
    
    $cs_for_dummies = new Course();
    $cs_for_dummies->setName('C# for dummies');
    $cs_for_dummies->setContents('In our course we will talk about programming lang which....');
    $cs_for_dummies->setPrice(200);
    $cs_for_dummies->setCategory($em->merge($this->getReference('category-cs')));
    
    $cs_for_dummies2 = new Course();
    $cs_for_dummies2->setName('C# for dummies 2');
    $cs_for_dummies2->setContents('We will talk about programming lang C# which....');
    $cs_for_dummies2->setPrice(300);
    $cs_for_dummies2->setCategory($em->merge($this->getReference('category-cs')));
    $cs_for_dummies2->setCreatedAt(new \DateTime('2005-12-01'));
    
    $em->persist($java_for_dummies);
    $em->persist($php_for_dummies);
    $em->persist($cpp_for_dummies);
    $em->persist($cpp_for_profi);
    $em->persist($cs_for_dummies);
    $em->persist($cs_for_dummies2);
    
    //211116 here
    for($i = 100; $i <= 130; $i++)
  {
    $cs_for_dummies3 = new Course();
    $cs_for_dummies3->setName('C# for dummies_'.$i);
    $cs_for_dummies3->setCategory($em->merge($this->getReference('category-cs')));
    $cs_for_dummies3->setContents('We will talk about programming lang C# 3 which....has no_'.$i);
    $cs_for_dummies3->setPrice(500);    
    $em->persist($cs_for_dummies3);
  }




    $em->flush();
 
    // $this->addReference('category-java', $java);
    // $this->addReference('category-php', $php);
    // $this->addReference('category-cpp', $cpp);
    // $this->addReference('category-cs', $cs);
  }
 
  public function getOrder()
  {
    return 2; // the order in which fixtures will be loaded
  }
}
?>