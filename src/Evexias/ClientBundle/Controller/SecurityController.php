<?php

namespace Evexias\ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Evexias\ClientBundle\Form\LoginForm;

class SecurityController extends Controller {

    /**
     * @Route("/login", name="login")
     * @Template()
     *
     * Authentification du client
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function loginAction() {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $oForm = $this->createForm(LoginForm::class, null, array(
            'action' => $this->generateUrl('login_check'))
        );

        return $this->render('EvexiasClientBundle:Security:login.html.twig', array(
                    'last_username' => $lastUsername,
                    'error' => $error,
                    'form' => $oForm->createView(),
        ));
    }

    /**
     *
     * @Route("/logout", name="logout")
     * @Template()
     *
     *
     */
    public function logoutAction() {
        
    }

    /**
     *
     * @Route("/login_check", name="login_check")
     * @Template()
     *
     *
     */
    public function loginCheckAction() {
        
    }

}
