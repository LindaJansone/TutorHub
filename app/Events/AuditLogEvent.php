<?php
namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AuditLogEvent
{
    use Dispatchable, SerializesModels;

    public $user;
    public $action;
    public $auditable;
    public $oldValues;
    public $newValues;

    public function __construct($user, $action, $auditable, $oldValues = null, $newValues = null)
    {
        $this->user = $user;
        $this->action = $action;
        $this->auditable = $auditable;
        $this->oldValues = $oldValues;
        $this->newValues = $newValues;
    }
}
