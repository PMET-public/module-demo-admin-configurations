<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MagentoEse\DemoAdminConfigurations\Setup\Patch\Data;


use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Config\Model\ResourceModel\Config as ResourceConfig;

class AddFavicons implements DataPatchInterface
{
    /** @var ResourceConfig  */
    protected $resourceConfig;

    /**
     * OldUpgradeData constructor.
     * @param ResourceConfig $resourceConfig
     */
    public function __construct(ResourceConfig $resourceConfig)
    {
        $this->resourceConfig = $resourceConfig;
    }

    public function apply()
    {
        $this->resourceConfig->saveConfig(
            "design/head/shortcut_icon", "stores/1/favicon.png", "stores", 1)->saveConfig(
            "design/head/shortcut_icon", "stores/2/favicon.png", "stores", 2)->saveConfig(
            "design/head/shortcut_icon", "stores/3/favicon.png", "stores", 3);
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

}