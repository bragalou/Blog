<?php

namespace App\Controller;

use App\Repository\TPContactRepository;
use App\Entity\TPContact;
use App\Form\AjoutertpcontactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TpController extends AbstractController
{

    private $tpContactRepository;
    public function __construct(TPContactRepository $tpContactRepository)
    {
        $this->tpContactRepository = $tpContactRepository;    
    }


    /**
     * @Route("/tp", name="tp")
     */
    public function tp(Request $request): Response
    {
        $tpcontact = new TPContact();
        $form = $this->createForm(AjoutertpcontactType::class, $tpcontact);
        $form->handleRequest($request);

        dump($form->getViewData());

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();
            $tpcontact = $form->getData();

            return $this->redirectToRoute('tpSendOk');

        }


        return $this->renderForm('tp/index.html.twig', [
            'controller_name' => 'TP - PHP Symfony',
            'form' => $form,
            'tpContacts' => $this->tpContactRepository->findAll()
        ]);
    }

    /**
     * @Route("/tp/sendOk", name="tpSendOk")
     */
    public function tpSendOk(): Response
    {
        return $this->render('tp/sendOK.html.twig', [
            'controller_name' => 'Enregistrement Réussi'
        ]);
    }

    
    /**
     * @Route("/tp/detail/{id}", name="detailTpContact")
     */
    public function detailTpContact(Request $request, String $id = ""): Response
    {
        // $detailContact = $request->query->get('name');
        $detailContactId = $request->get('id');

        return $this->render('tp/detailTpContact.html.twig', [
            'controller_name' => 'Contact actuel : ',
            'detailContact' => $this->tpContactRepository->find($detailContactId)
        ]);
    }

    
    /**
     * @Route("/tp/detailOld/{contact}", name="detailTpContactOldVersion")
     */
    public function detailTpContactOldVersion(Request $request, String $contact = ""): Response
    {
        // $detailContact = $request->query->get('name');
        $detailContactName = $request->get('name');
        $detailContactFirstname = $request->get('firstname');
        $detailContactAge = $request->get('Age');
        $detailContactNewsletter = $request->get('newsletter');
        $detailContactId = $request->get('id');

        return $this->render('tp/detailTpContactOldVersion.html.twig', [
            'controller_name' => 'Contact actuel (old version) : ',
            
            'detailContactId' => $detailContactId,
            'detailContactName' => $detailContactName,
            'detailContactFirstname' => $detailContactFirstname,
            'detailContactAge' => $detailContactAge,
            'detailContactNewsletter' => $detailContactNewsletter
        ]);
    }
}
