<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController ;
use Symfony\Component\HttpFoundation\Response;

 class StudentController extends AbstractController{
    public function index():Response
    {
        return new Response("bonjour mes etudiants");
    }
}
