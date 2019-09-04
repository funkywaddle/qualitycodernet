<?php
namespace App\Services;

use App\Models\Project as ProjectMdl;

class Projects
{
    private $projectMdl;

    public function __construct(ProjectMdl $projectMdl) {
        $this->projectMdl = $projectMdl;
    }

    public function getProjectsList() {
        return $this->projectMdl::all();
    }

    public function getSingleProjectById($id)
    {
        return $this->projectMdl::with('webhooks')
            ->where('id','=', $id)
            ->get();
    }
}
