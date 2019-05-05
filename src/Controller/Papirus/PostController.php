<?php

namespace App\Controller\Papirus;

use App\Controller\PapirusController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;

/**
 * Post Content
 *
 * @Route("/post")
 */
class PostController extends PapirusController
{
    /**
     * @Route("/{slug}", defaults={"_format"="html"}, name="papirus_post")
     */
    public function index($slug)
    {
        $post = $this->getDoctrine()
            ->getRepository(Post::class)
            ->getPostBySlug($slug);

        if (is_null($post))
        {
            return $this->redirectToRoute('papirus_index');
        }

        preg_match_all("#<h(\d)[^>]*?>(.*?)<[^>]*?/h\d>#i", $post->getContent(), $matchHeadings, PREG_SET_ORDER);

        return $this->render($this->settingService->getSettingValue('template') . '/post.html.twig', [
            'post' => $post,
            'matchHeadings' => $matchHeadings
        ]);
    }
}
