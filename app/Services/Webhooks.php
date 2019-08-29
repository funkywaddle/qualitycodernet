<?php
namespace App\Services;

use App\Models\Project as ProjectMdl;
use App\Models\Webhook as WebhookMdl;

class Webhooks
{
    private $webhookMdl;
    private $projectMdl;

    public function __construct(WebhookMdl $webhookMdl, ProjectMdl $projectMdl) {
        $this->webhookMdl = $webhookMdl;
        $this->projectMdl = $projectMdl;
    }

    public function saveHook($data) {
        $this->webhookMdl->data = $data;
        $project = $this->projectMdl->where('stub', 'ogmabot');
        $project->webhooks->save($this->webhookMdl);
    }
}