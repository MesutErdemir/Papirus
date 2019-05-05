<?php

namespace App\Controller\Papirus;

use App\Controller\PapirusController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;

/**
 * List Posts
 *
 * @Route("/posts")
 */
class PostsController extends PapirusController
{
    /**
     * @Route("/{page}", defaults={"_format"="html"}, requirements={"page": "\d+"}, name="papirus_posts")
     */
    public function index($page = 1)
    {
        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->getPostsWithPagination($page);

        return $this->render($this->settingService->getSettingValue('template') . '/posts.html.twig', [
            'posts' => $posts,
            'totalPages' => ceil($posts->count() / Post::NUM_ITEMS),
            'currentPage' => $page
        ]);
    }
}
