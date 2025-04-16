<?php

declare(strict_types=1);

namespace Kafka\Services;

use Kafka\Services\KafkaQueue;
use Jobcloud\Kafka\Consumer\KafkaConsumerBuilder;
use Jobcloud\Kafka\Producer\KafkaProducerBuilder;
use Illuminate\Queue\Connectors\ConnectorInterface;
use Jobcloud\Kafka\Consumer\KafkaConsumerInterface;
use Jobcloud\Kafka\Producer\KafkaProducerInterface;

class KafkaConnector implements ConnectorInterface
{
    public function connect(array $config): KafkaQueue
    {
        return new KafkaQueue(
            $this->createProducer($config),
            $this->createConsumer($config)
        );
    }

    protected function createProducer(array $config): KafkaProducerInterface
    {
        return KafkaProducerBuilder::create()
            ->withAdditionalBroker($config['bootstrap-servers'])
            ->build();
    }

    protected function createConsumer(array $config): KafkaConsumerInterface
    {
        return KafkaConsumerBuilder::create()
            ->withAdditionalBroker($config['bootstrap-servers'])
            ->withConsumerGroup($config['group-id'])
            ->withAdditionalSubscription($config['topic-name'])
            ->build();
    }
}
