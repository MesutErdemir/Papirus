<?php

namespace App\Controller\Papirus;

use App\Controller\PapirusController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;

/**
 * Home Page
 *
 * @Route("/")
 */
class IndexController extends PapirusController
{
    /**
     * Home Page Method
     *
     * @Route("/", defaults={"_format"="html"}, name="papirus_index")
     */
    public function index()
    {
        $recentPosts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->getRecentPosts();

        return $this->render($this->settingService->getSettingValue('template') . '/index.html.twig', [
            'recentPosts' => $recentPosts
        ]);
    }
}
