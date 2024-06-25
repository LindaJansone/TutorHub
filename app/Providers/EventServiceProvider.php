<?php 

namespace App\Providers;

use App\Events\AuditLogEvent;
use App\Listeners\AuditLogListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        AuditLogEvent::class => [
            AuditLogListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
