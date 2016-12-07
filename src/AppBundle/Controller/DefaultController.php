<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    /**
     * @Route("/welcome", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        $msg = $user->getUsername();
        if ($msg == null) {
            $msg = $user->getEmail();
        }
        return new Response('Well hi there ' . $user->getUsername());

    }


    /**
     * @Route("/under_construction", name="under_construction")
     */
    public function constratingAction(Request $request)
    {
        return $this->render('underconstruction.html.twig');

    }

    /**
     * @Route("/listu", name="list_users")
     */
    public function listusersAction(Request $request)
    {
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('listusers.html.twig', array('users'=>$users));
    }
}

