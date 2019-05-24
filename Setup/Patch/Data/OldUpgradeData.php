<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MagentoEse\DemoAdminConfigurations\Setup\Patch\Data;


use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;



class OldUpgradeData implements DataPatchInterface, PatchVersionInterface
{

    /** @var \Magento\Config\Model\ResourceModel\Config  */
    private $resourceConfig;


    /**
     * OldUpgradeData constructor.
     * @param \Magento\Config\Model\ResourceModel\Config $resourceConfig
     */
    public function __construct(
        \Magento\Config\Model\ResourceModel\Config $resourceConfig
    ) {
        $this->resourceConfig = $resourceConfig;

    }

    public function apply()
    {
        $this->resourceConfig->saveConfig("google/analytics/account", "UA-53529203-4", "default", 0);
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public static function getVersion()
    {
       return '0.0.5';
    }
}