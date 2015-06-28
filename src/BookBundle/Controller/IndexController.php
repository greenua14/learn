<?php

namespace BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class IndexController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        return array(
            'word' => 'HELLOOOOOO!'
        );
    }

    /**
     * @Template()
     * @Security("has_role('ROLE_USER')")
     */
    public function userAction()
    {
       return array(
           'message' => 'test user access to role ROLE_USER!'
       );
    }

    /**
     * @Template()
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminAction()
    {
        return array(
            'message' => 'test admin access to role ROLE_ADMIN!'
        );
    }
} 
