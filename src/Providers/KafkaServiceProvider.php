<?php

declare(strict_types=1);

namespace Kafka\Providers;

use Illuminate\Queue\QueueManager;
use Kafka\Services\KafkaConnector;
use Illuminate\Support\ServiceProvider;

class KafkaServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        /** @var \Illuminate\Queue\QueueManager $queue */
        $queue = $this->app->make('queue');

        $queue->addConnector('kafka', static fn () => new KafkaConnector());
    }
}
