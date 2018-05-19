<?php

namespace App\Controller\Blog;

use App\Controller\BlogController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Swift_Mailer;

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
    public function index(SessionInterface $session)
    {
        $captcha_int1 = rand(0, 9);
        $captcha_int2 = rand(0, 9);
        $simple_captcha_result = $captcha_int1 + $captcha_int2;
        $session->set('simple_captcha_result', $simple_captcha_result);

        return $this->render('cleanblog/contact.html.twig', [
            'captcha_int1' => $captcha_int1,
            'captcha_int2' => $captcha_int2
        ]);
    }

    /**
     * Send message from contact page
     *
     * @Route("/send", name="contact_send")
     * @Method("POST")
     */
    public function send(Request $request, Swift_Mailer $mailer, SessionInterface $session)
    {
        if ($request->request->get('captcha_result') == $session->get('simple_captcha_result'))
        {
            $message = (new \Swift_Message('Contact Form'))
                ->setFrom($request->request->get('email', "unknown@unknown.com"))
                ->setTo('erdemirmesut@gmail.com')
                ->setBody(
                    $this->renderView(
                        'emails/contact.html.twig',
                        array(
                          'name' => $request->request->get('name', ""),
                          'email' => $request->request->get('email', ""),
                          'phone' => $request->request->get('phone', ""),
                          'message' => $request->request->get('message', ""),
                        )
                    ),
                    'text/plain'
                );

            if ($mailer->send($message))
            {
                $this->addFlash('send_status', 1);
            }
            else
            {
                $this->addFlash('send_status', 0);
            }
        }

        return $this->redirectToRoute("contact_index");
    }
}
