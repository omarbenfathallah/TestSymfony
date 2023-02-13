<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestTwigController extends AbstractController
{
    #[Route('/test/twig', name: 'app_test_twig')]
    public function index(): Response
    {
        $persons =array(array('id' => '1' , 'name'=>'foulen' ,'email'=>'foulen@gmail.com'));
        

        return $this->render('test_twig/index.html.twig', [
            'controller_name' => 'TestTwigController',
            'var1' => 'v',
            'p' => $persons
        ]);
    }
}
