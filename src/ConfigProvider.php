<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\AMQP;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use Zend\Stdlib\ArrayUtils;

/**
 * Class ConfigProvider
 * @package MSBios\AMQP
 */
class ConfigProvider extends \MSBios\ConfigProvider
{
    /**
     * @inheritdoc
     *
     * @return array
     */
    public function __invoke(): array
    {
        return ArrayUtils::merge([
            'dependencies' => $this->getDependencyConfig(),
        ], $this->getConfig());
    }

    /**
     * @return array
     */
    public function getDependencyConfig(): array
    {
        return [
            'factories' => [
                AMQPStreamConnection::class =>
                    Factory\AMQPStreamConnectionFactory::class
            ]
        ];
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        /** @var string $filename */
        $filename = __DIR__ . '/../config/module.config.php';
        return file_exists($filename) ? include $filename : [];
    }
}