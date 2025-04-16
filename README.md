# kafka-queue

- https://arnaud-lb.github.io/php-rdkafka-doc/phpdoc/rdkafka.installation.html

installing
```sh
composer require multividas/kafka-queue:dev-main --dev
```

### ServiceProvider (KafkaServiceProvider):

- Registers the Kafka queue connector with Laravel's queue manager.

### Implements the QueueContract interface.

- Provides methods like push, pop, and size for interacting with Kafka.
- push() pushes a serialized job to Kafka using the producer.
- pop() consumes messages from Kafka and processes jobs.

### Connector Class (KafkaConnector):

- Implements the ConnectorInterface.
- Sets up Kafka producer and consumer.
