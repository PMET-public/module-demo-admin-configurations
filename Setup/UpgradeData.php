<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MagentoEse\DemoAdminConfigurations\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Event\ObserverInterface;

class UpgradeData implements UpgradeDataInterface
{
    public $_resourceConfig;
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;
    private $encrypted;
    const BRAINTREE_PUBLICKEY = 'sn6xgt8pqv8868pq';
    const BRAINTREE_PRIVATEKEY = 'ad7807895eae5bd5a3cc913005eaefe8';
    public function __construct(
        \Magento\Config\Model\ResourceModel\Config $resourceConfig,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Encryption\EncryptorInterface $encrypted
    ) {
        $this->_resourceConfig = $resourceConfig;
        $this->scopeConfig = $scopeConfig;
        $this->encrypted=$encrypted;
    }

    public function upgrade( ModuleDataSetupInterface $setup, ModuleContextInterface $context )
    {
        xdebug_break();
        if (version_compare($context->getVersion(), '0.0.2', '<')) {
            $this->_resourceConfig->saveConfig("google/analytics/account", "UA-53529203-5", "default", 0);
        }
        if (version_compare($context->getVersion(), '0.0.5', '<=')) {
            $this->_resourceConfig->saveConfig("google/analytics/account", "UA-53529203-4", "default", 0);
        }
    }

}
