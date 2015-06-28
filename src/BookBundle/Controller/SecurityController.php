<?php

namespace BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BookBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    /**
     * @Template()
     */
    public function registerAction()
    {
        $user = new User();
        $formType = $this->get('bookbundle.user.register.type');
        $form = $this->createForm(
            $formType,
            $user,
            ['action' => $this->generateUrl('create'), 'method' => 'POST']
        );

        return [
            'form' => $form->createView()
        ];
    }

    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $formType = $this->get('bookbundle.user.register.type');
        $form = $this->createForm($formType, $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $user = $form->getData();
            $user->setRoles('ROLE_USER');
            $user->setIsActive(true);

            $password = $user->getPassword();
            $encoder = $this->get('security.password_encoder');
            $password = $encoder->encodePassword($user, $password);
            $user->setPassword($password);

            $em->persist($user);
            $em->flush();

            $url = $this->generateUrl('login');

            return $this->redirect($url);
        }
    }

    /**
     * @Template()
     */
    public function loginAction()
    {
        return [];
    }
} 
