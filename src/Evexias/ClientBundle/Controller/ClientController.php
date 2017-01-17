<?php

namespace Evexias\ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Evexias\ClientBundle\Form\AddClientForm;
use Symfony\Component\HttpFoundation\Request;
use Evexias\ClientBundle\Form\InscriptionForm;

class ClientController extends Controller {
    
    
    /**
     * @Route("/admin", name="admin")
     */
    public function indexAction()
    {
        return $this->render('EvexiasClientBundle:Client:index.html.twig');
    }
    
    /**
     * @Route("/add_client", name="add_client")
     */
    public function addClientAction(Request $request) {
        $form = $this->createForm(AddClientForm::class);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $data = $form->getData();
                if ($this->get('mailService')->sendMail($data['email'], 'EvexiasClientBundle:Mail:index.html.twig')) {
                    $this->get('session')->getFlashBag()->add(
                            'notice', 'Client Ajouté!'
                    );
                    return $this->redirect($this->get('router')->generate('add_client'));
                } else {
                    $this->get('session')->getFlashBag()->add(
                            'error', 'Une erreur est survenue!'
                    );
                }
            }
        }

        return $this->render('EvexiasClientBundle:Client:AddClient.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscriptionAction(Request $request) {
        
        $list = array(
            'gov' => array('beja' => 'beja'),
            'deleg' => array('beja' => 'beja'),
            'loc' => array('beja' => 'beja'),
        );

        $form = $this->createForm(InscriptionForm::class);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                \Evexias\ClientBundle\Utils\Tools::pr($form->getData());
            }
        }

        return $this->render('EvexiasClientBundle:Client:Inscription.html.twig', array('form' => $form->createView()));
    }

}
