<?php

namespace App\Controller\Blog;

use App\Controller\BlogController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;

/**
 * About page of blog website
 *
 * @Route("/about")
 */
class AboutController extends BlogController
{
    /**
     * About index
     *
     * @Route("/", name="about_index")
     * @Method("GET")
     */
    public function index()
    {
        return $this->render('cleanblog/about.html.twig');
    }

}
