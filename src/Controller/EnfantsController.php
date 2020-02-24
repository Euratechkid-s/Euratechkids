<?php

namespace App\Controller;

use App\Form\EnfantsType;
use App\Entity\Enfants;
use App\Entity\CreateAtelier;
use App\Entity\ReservationAtelier;
use App\Form\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EnfantsController extends AbstractController
{
    /**
     * @Route("/inscription/enfants/{titre}/{id}", name="formulaire_enfants")
     */

    public function form(Request $request, $titre, $id)
    {

        $product = new Enfants();
        $product->setIdatelier($id);
        $form = $this->createForm(EnfantsType::class, $product);
        $form->handleRequest($request);
        $enfant = $this->getDoctrine()->getRepository(Enfants::class)->findByExampleField($id);
        dump(count($enfant));
        $enfants = 12 - count($enfant) ;
        dump($enfants);

        if ($enfants <= 12 && $enfants > 1) {
            $this->addFlash('success', 'Il reste ' . $enfants  . ' places dans cet atelier');
        }
        elseif ( $enfants == 1) {
        $this->addFlash('success', 'Il reste ' . $enfants  . ' place dans cet atelier');
        }
        elseif ($enfants == 0) {
            $this->addFlash('warning', 'Il n\'y a plus de places dans l\'atelier');
        }

            if ($form->isSubmitted() && $form->isValid()) {

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($product);
                $entityManager->flush();
                $this->addFlash('primary','Votre enfant a bien été ajouté');
                return $this->redirectToRoute('formulaire_enfants', [
                    'titre' => $titre,
                    'id' => $id
                ]);

            }
        return $this->render('Form/form2.html.twig', [
            'form' => $form->createView(),
            'titre' => $titre
        ]);

    }

}