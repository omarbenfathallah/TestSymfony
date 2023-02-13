<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClubRepository ;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Club ;

class ClubController extends AbstractController
{
    #[Route('/club', name: 'app_club')]
    public function index(ManagerRegistry $doctrine) : Response
    {
       # $listClub= $clubRepository -> findAll();
       # $club= $clubRepository -> find(2);

        $listClub= $doctrine-> getRepository(Club :: class) -> find('1');


        return $this->render('club/index.html.twig',
         [
            'clubs' => $listClub,
         ]);
    }

 /*   #[Route('/removeClub/{id}', name: 'app_club_remove')]
    public function removeClub(ManagerRegistry $doctrine,$id): Response 
    {
        $em=$doctrine->getManager();
        $club= $doctrine -> getRepository(Club::class)->find($id);
        $em->remove($club);
        $em->flush();
        return $this->redirectToRoute('app_club');

    }
*/

  /*  #[Route('/club', name: 'app_club')]
    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }

    #[Route('/club/getname', name: 'club_name')]
    public function getName($nom): Response
    {
        return $this.render('club/detail.html.twig' ,[
            'getname' => $nom 
        ]);
    }
    
    
    #[Route('/club', name: 'app_club')]
        public function list(): Response
        {
            $formations = array(
                array('ref' => 'form147', 'Titre' => 'Formation Symfony 4','Description'=>'formation pratique', 'date_debut'=>'12/06/2020', 'date_fin'=>'19/06/2020', 'nb_participants'=>19) ,
                array('ref'=>'form177','Titre'=>'Formation SOA' ,'Description'=>'formation theorique','date_debut'=>'03/12/2020','date_fin'=>'10/12/2020','nb_participants'=>0),
                array('ref'=>'form178','Titre'=>'Formation Angular' ,'Description'=>'formation theorique','date_debut'=>'10/06/2020','date_fin'=>'14/06/2020','nb_participants'=>12)) ;

                return $this->render('club/index.html.twig', [
                    'controller_name' => 'ClubController',
                    'f' => $formations ,
                    'var1' => 'v',

                ]);
            
        }*/
}
