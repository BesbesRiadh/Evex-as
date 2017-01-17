<?php

namespace Evexias\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{
    /**
     * @Route("/admin_panel", name="admin_panel")
     */
    public function indexAction()
    {
        return $this->render('EvexiasUserBundle:User:index.html.twig');
    }
    
}
