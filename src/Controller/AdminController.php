<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Cocur\Slugify\Slugify;

class AdminController extends BaseAdminController
{
    public function persistEntity($entity)
    {
        $this->updateSlug($entity);
        parent::persistEntity($entity);
    }

    public function updateEntity($entity)
    {
        $this->updateSlug($entity);
        parent::updateEntity($entity);
    }

    private function updateSlug($entity)
    {
        $slugify = new Slugify();
        if (method_exists($entity, 'setSlug') && method_exists($entity, 'getTitle'))
        {
            $entity->setSlug($slugify->slugify($entity->getTitle()));
        }
    }
}
