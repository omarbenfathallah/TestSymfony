<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClassroomRepository ;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Classroom ;

class ClassroomController extends AbstractController
{
    #[Route('/classroom', name: 'app_classroom')]
    public function index(ManagerRegistry $doctrine): Response
    {

        $listClass= $doctrine-> getRepository(Classroom :: class) -> findAll();
        return $this->render('classroom/index.html.twig',
        [
            'class' => $listClass,
        ]);
        /*return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
            'class' => $listClass,
        ]);*/
       
    }

    #[Route('/classroom/remove/{id}', name: 'app_classroom_delete')]
    public function remove(ManagerRegistry $doctrine, $id): Response
    {
        $em=$doctrine -> getManager() ; 
        $listClass=   $doctrine ->getRepository(Classroom ::  class)->find($id) ; 
        $em -> remove($listClass) ;
        $em -> flush() ;
        return $this->redirectToRoute('app_classroom') ; 
    }

    /**
 * @Route("/article/new", name="new_article")
 * Method({"GET", "POST"})
 */
 /*public function new(Request $request) {
    $article = new Article();
    $form = $this->createFormBuilder($article)
    ->add('name', TextType::class)
    ->add('save', SubmitType::class, array('label' => 'Créer')
    )->getForm();
    
    
    $form->handleRequest($request);
    
    if($form->isSubmitted() && $form->isValid()) {
    $article = $form->getData();
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($article);
    $entityManager->flush();
    
    return $this->redirectToRoute('article_list');
    }
    return $this->render('articles/new.html.twig',['form' => $form-
   >createView()]);
    }
   */

   /* #[Route('/classroom',name'app_classroom_list')]
    public function list(): Response
    {
        $listClub= $doctrine-> getRepository(Club :: class) -> findAll();
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);

    }*/


}
