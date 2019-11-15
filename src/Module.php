<?php
/**
 * @access protected
 * @author Jduzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\AMQP;

use Zend\Stdlib\ArrayUtils;

/**
 * Class Module
 * @package MSBios\AMQP
 */
class Module extends \MSBios\Module
{
    /** @const VERSION */
    const VERSION = '1.0.0';

    /**
     * @return string
     */
    protected function getDir()
    {
        return __DIR__;
    }

    /**
     * @return string
     */
    protected function getNamespace()
    {
        return __NAMESPACE__;
    }

    /**
     * @inheritdoc
     *
     * @return array|mixed|\Traversable
     */
    public function getConfig()
    {
        /** @var ConfigProvider $configProvider */
        $configProvider = new ConfigProvider;

        return ArrayUtils::merge(parent::getConfig(), [
            'service_manager' => $configProvider->getDependencyConfig(),
        ]);
    }
}