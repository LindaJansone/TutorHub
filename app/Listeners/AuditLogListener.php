<?php

namespace App\Listeners;

use App\Events\AuditLogEvent;
use App\Models\AuditLog;

class AuditLogListener
{
    protected $fillable = [
        'user_id', 'action', 'auditable_type', 'auditable_id', 'old_values', 'new_values',
    ];
    
    public function handle(AuditLogEvent $event)
    {
        AuditLog::create([
            'user_id' => $event->user ? $event->user->id : null,
            'action' => $event->action,
            'auditable_type' => get_class($event->auditable),
            'auditable_id' => $event->auditable->id,
            'old_values' => json_encode($event->oldValues),
            'new_values' => json_encode($event->newValues),
        ]);
    }
}

