<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;


class FirstController extends AbstractController
{

     /**
      * @Route("/", name="index")
      */
    public function index(UserPasswordEncoderInterface $encoder)
    {

        var_dump($this->getUser());
        exit;
        $user = new User();
        $user->setUsername('adsas');
        $user->setFullName('adsas');
        $user->setEmail('asd@sdf.fsd');
        $plainPassword = 'ryanpass';
        $encoded = $encoder->encodePassword($user, $plainPassword);

        $user->setPassword($encoded);



        $this->getDoctrine()->getManager()->persist($user);
        $this->getDoctrine()->getManager()->flush();
        exit;
    }
}