<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\AMQP;

use Interop\Container\ContainerInterface;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class AMQPStreamConnectionInitializer
 * @package MSBios\AMQP
 */
class AMQPStreamConnectionInitializer implements InitializerInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param object $instance
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceof AMQPStreamConnectionAwareInterface) {
            $instance->setAMQPStreamConnection(
                $container->get(AMQPStreamConnection::class)
            );
        }
    }

    /**
     * @param $an_array
     * @return AMQPStreamConnectionInitializer
     */
    public static function __set_state($an_array): self
    {
        return new self();
    }


}