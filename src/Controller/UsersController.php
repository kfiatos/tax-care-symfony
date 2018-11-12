<?php

namespace App\Controller;

use App\Entity\Fruits;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    /**
     * @Route("/", name="users")
     */
    public function index(EntityManagerInterface $entityManager)
    {
        /*
         * NEVER do this, only for the sakes of simplicity
         */
        $userRepo = $entityManager->getRepository(Users::class);
        $userEntities = $userRepo->findAll();


        return $this->render('users/index.html.twig', [
            'users' => $userEntities,
            'controller_name' => 'UsersController',
        ]);
    }

    /**
     * @Route("/insert_data", name="users_insert_data")
     */
    public function insertData(EntityManagerInterface $entityManager)
    {
        /*
         * NEVER do this, only for the sakes of simplicity
         */
        $userRepo = $entityManager->getRepository(Users::class);
        $userEntities = $userRepo->findAll();
        if (!empty($userEntities)) {
            return $this->redirectToRoute('users');
        }

        $fruits = ['orange', 'apple', 'potato', 'cabbage'];
        $users = ['Anna', 'Gosia', 'Marek', 'Darek', 'Jarek'];

        foreach ($fruits as $fruit) {
            $entity = new Fruits();
            $entity->setName($fruit);
            $entityManager->persist($entity);
        }
        foreach ($users as $username) {
            $user = new Users();
            $user->setName($username);
            $entityManager->persist($user);
        }
        $entityManager->flush();

        $userRepo = $entityManager->getRepository(Users::class);
        $fruitRepo = $entityManager->getRepository(Fruits::class);

        $userEntities = $userRepo->findAll();
        $fruitEntities = $fruitRepo->findAll();
        foreach ($userEntities as $index => $userEntity) {
            $index = rand(0,3);
            $userEntity->addFruits($fruitEntities[$index]);
            $entityManager->persist($userEntity);
        }

        foreach ($fruitEntities as $index => $fruitEntity) {
            $index = rand(0,3);
            $fruitEntity->addUsers($userEntities[$index]);
            $entityManager->persist($fruitEntity);

        }
        $entityManager->flush();

        return $this->redirectToRoute('users');
    }
}
