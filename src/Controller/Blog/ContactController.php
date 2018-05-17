<?php

namespace App\Controller\Blog;

use App\Controller\BlogController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Contact page of blog website
 *
 * @Route("/contact")
 */
class ContactController extends BlogController
{
    /**
     * Contact index
     *
     * @Route("/", name="contact_index")
     * @Method("GET")
     */
    public function index()
    {
        return $this->render('cleanblog/contact.html.twig');
    }

    /**
     * Send message from contact page
     *
     * @Route("/send", name="contact_send")
     * @Method("POST")
     */
    public function send()
    {

    }
}
