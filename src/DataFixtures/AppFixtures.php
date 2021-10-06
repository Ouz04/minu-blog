<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hash;
    public function __construct(UserPasswordHasherInterface $hash)
    {
        $this->hash=$hash;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $fake=Factory::create();
        for($u=0;$u<10;$u++){
            $user= new User();
            $user->setEmail($fake->email)
                 ->setPassword($this->hash->hashPassword($user, 'password'));

                 $manager->persist($user);

            for($x=0;$x<random_int(5,15);$x++){
                $article= (new Article())->setAuthor($user)
                ->setContent($fake->text(300))
                ->setName($fake->text(100));

                $manager->persist($article);
        
    
            }

        }
        

        $manager->flush();
    }
}
