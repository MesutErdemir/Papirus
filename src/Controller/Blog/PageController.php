<?php

namespace App\Controller\Blog;

use App\Controller\BlogController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Page;

/**
 * Page of blog website
 *
 * @Route("/page")
 */
class PageController extends BlogController
{
    /**
     * @Route("/{slug}", defaults={"_format"="html"}, name="page_index")
     * @Method("GET")
     */
    public function index($slug)
    {
        $postRepo = $this->getDoctrine()
            ->getRepository(Page::class);

        $page = $postRepo->findOneBy([
          'is_published' => true,
          'slug' => $slug
        ]);

        if (is_null($page))
        {
            return $this->redirectToRoute('blog_index');
        }

        return $this->render('cleanblog/page.html.twig', [
            'page' => $page
        ]);
    }
}
