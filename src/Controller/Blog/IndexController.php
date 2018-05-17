<?php

namespace App\Controller\Blog;

use App\Controller\BlogController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;

/**
 * Index page of blog website
 *
 * @Route("/")
 */
class IndexController extends BlogController
{
    /**
     * Blog Home Page
     *
     * @Route("/", defaults={"page": "1", "_format"="html"}, name="blog_index")
     * @Route("/rss.xml", defaults={"page": "1", "_format"="xml"}, name="blog_rss")
     * @Route("/page/{page}", defaults={"_format"="html"}, requirements={"page": "\d+"}, name="blog_index_paginated")
     * @Method("GET")
     */
    public function index($page)
    {
        $postRepo = $this->getDoctrine()
            ->getRepository(Post::class);

        $posts = $postRepo->getPostsWithPagination($page);

        return $this->render('cleanblog/index.html.twig', [
            'posts' => $posts,
            'totalPages' => ceil($posts->count() / Post::NUM_ITEMS),
            'currentPage' => $page
        ]);
    }
}
