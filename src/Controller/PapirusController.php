<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\Setting;

class PapirusController extends AbstractController
{
    protected $settingService;

    function __construct(Setting $settingService)
    {
        $this->settingService = $settingService;
    }
}
