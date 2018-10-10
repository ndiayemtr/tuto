<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('default/homepage.html.twig');
    }
    
    
    /**
     * @Route("/teste_pdf", name="teste_pdf")
     */
    public function testePfAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('default/map.html.twig');
    }


    /**
     * @Route("/admin/", name="admin_page")
     */
    public function adminPageAction(){
        return $this->render('default/admin.html.twig');
    }
    
    /**
     * @Route("/client/", name="client_page")
     */
    public function clientPageAction(){
        return $this->render('default/client.html.twig');
    }
    
    /**
     * @Route("/login_ok/", name="login_ok")
     * @Security("has_role('ROLE_USER')")
     */
    public function showInfoUserAction(){
        return $this->render('default/login_success.html.twig');
    }
    
    /**
     * @Route("/user", name="user_info")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function showUserAction(){
        
        if ($this->get('security.authorization_checker')->isgranted('ROLE_ADMIN')) {
            
            return $this->render('default/admin.html.twig');      
        }
        
        if ($this->get('security.authorization_checker')->isgranted('ROLE_USER')) {
            
            return $this->render('default/client.html.twig');      
        }
    }
    
    /**
     * @Route("/who-is-user", name="user_question")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function determinerUser(){
        return $this->render('default/usr.html.twig'); 
    }
    
}
