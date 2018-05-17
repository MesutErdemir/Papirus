<?php

namespace App\Controller\Blog;

use App\Controller\BlogController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;

/**
 * Post page of blog website
 *
 * @Route("/post")
 */
class PostController extends BlogController
{
    /**
     * @Route("/{slug}", defaults={"_format"="html"}, name="blog_post")
     * @Method("GET")
     */
    public function index($slug)
    {
        $post_repo = $this->getDoctrine()
            ->getRepository(Post::class);

        $post = $post_repo->findOneBySlug($slug);

        if (is_null($post))
        {
            return $this->redirectToRoute('blog_index');
        }

        return $this->render('cleanblog/post.html.twig', [
            'post' => $post
        ]);
    }
}
