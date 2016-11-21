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
    $timeCreatedbyMe='2016-11-21';
    $java = new Category();
    $java->setName('Java');
    $java->setShortDescription('Java is...');
    $java->setCreatedAt(new \DateTime($timeCreatedbyMe));
 
    $php = new Category();
    $php->setName('Learn Php Programming Lang');
    $php->setShortDescription('Php is a Programming lang...');
    $php->setCreatedAt(new \DateTime($timeCreatedbyMe));
 
    $cpp = new Category();
    $cpp->setName('Learn C++');
    $cpp->setShortDescription('C++ is...');
    $cpp->setCreatedAt(new \DateTime($timeCreatedbyMe));
 
    $cs = new Category();
    $cs->setName('C#');
    $cs->setShortDescription('C# is...');
    $cs->setCreatedAt(new \DateTime($timeCreatedbyMe));

    $ruby = new Category();
    $ruby->setName('Ruby');
    $ruby->setShortDescription('Ruby is most popular...');
    $ruby->setCreatedAt(new \DateTime($timeCreatedbyMe));
 
 
    $em->persist($ruby);
    $em->persist($java);
    $em->persist($php);
    $em->persist($cpp);
    $em->persist($cs);
 
    $em->flush();
 
    $this->addReference('category-java', $java);
    $this->addReference('category-php', $php);
    $this->addReference('category-cpp', $cpp);
    $this->addReference('category-cs', $cs);
    $this->addReference('category-ruby', $ruby);
  }
 
  public function getOrder()
  {
    return 1; // the order in which fixtures will be loaded
  }
}
?>