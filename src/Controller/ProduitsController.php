<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produits;

class ProduitsController extends AbstractController
{
    #[Route('/produits', name: 'produits')]
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Produits::class);
        //récuperer tous la liste des produits
        $produits = $repo->findAll();
        return $this->render('produits/produits.html.twig', [
            'produits' => $produits,
        ]);
    }
}
