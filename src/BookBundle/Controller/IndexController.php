<?php

namespace BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
     */
    public function userAction()
    {
       return array(
           'message' => 'test user access to role ROLE_USER!'
       );
    }

    /**
     * @Template()
     */
    public function adminAction()
    {
        return array(
            'message' => 'test admin access to role ROLE_ADMIN!'
        );
    }
} 
