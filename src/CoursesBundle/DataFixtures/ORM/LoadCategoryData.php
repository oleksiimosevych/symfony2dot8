<?php
// src/Ens/JobeetBundle/DataFixtures/ORM/LoadCategoryData.php
namespace CoursesBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use CoursesBundle\Entity\Category;
 
class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
    $java = new Category();
    $java->setName('Java');
    $java->setShortDescription('Java is...');
       
 
    $php = new Category();
    $php->setName('Learn Php Programming Lang');
    $php->setShortDescription('Php is a Programming lang...');
    
    $cpp = new Category();
    $cpp->setName('Learn C++');
    $cpp->setShortDescription('C++ is...');
    
    $cs = new Category();
    $cs->setName('C#');
    $cs->setShortDescription('C# is...');
    
    $em->persist($java);
    $em->persist($php);
    $em->persist($cpp);
    $em->persist($cs);
 
    $em->flush();
 
    $this->addReference('category-java', $java);
    $this->addReference('category-php', $php);
    $this->addReference('category-cpp', $cpp);
    $this->addReference('category-cs', $cs);
  }
 
  public function getOrder()
  {
    return 1; // the order in which fixtures will be loaded
  }
}
?>