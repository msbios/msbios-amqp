<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\AMQP;

use PhpAmqpLib\Connection\AMQPStreamConnection;

/**
 * Trait AMQPStreamConnectionAwareTrait
 * @package MSBios\AMQP
 */
trait AMQPStreamConnectionAwareTrait
{
    /** @var AMQPStreamConnection */
    protected $AMQPStreamConnection;

    /**
     * @return AMQPStreamConnection
     */
    public function getAMQPStreamConnection(): AMQPStreamConnection
    {
        return $this->AMQPStreamConnection;
    }

    /**
     * @param AMQPStreamConnection $AMQPStreamConnection
     * @return $this
     */
    public function setAMQPStreamConnection(AMQPStreamConnection $AMQPStreamConnection): self
    {
        $this->AMQPStreamConnection = $AMQPStreamConnection;
        return $this;
    }
}