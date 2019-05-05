<?php

namespace App\Service;

use App\Repository\ProjectRepository;

class Project
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Get published projects
     *
     * @return Project[]
     */
    public function getPublishedProjects()
    {
        return $this->projectRepository->findBy([
            'is_published' => true
        ]);
    }
}
