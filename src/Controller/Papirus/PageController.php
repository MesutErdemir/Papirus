<?php

namespace App\Controller\Papirus;

use App\Controller\PapirusController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Page;

/**
 * Show Pages
 *
 * @Route("/page")
 */
class PageController extends PapirusController
{
    /**
     * @Route("/{slug}", defaults={"_format"="html"}, name="papirus_page")
     */
    public function index($slug)
    {
        $page = $this->getDoctrine()
            ->getRepository(Page::class)
            ->getPageBySlug($slug);

        if (is_null($page)) {
            return $this->redirectToRoute('papirus_index');
        }

        return $this->render($this->settingService->getSettingValue('template') . '/page.html.twig', [
            'page' => $page
        ]);
    }
}
