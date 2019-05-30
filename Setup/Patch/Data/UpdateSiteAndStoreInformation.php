<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MagentoEse\DemoAdminConfigurations\Setup\Patch\Data;


use Magento\Framework\Setup\Patch\DataPatchInterface;


class UpdateSiteAndStoreInformation implements DataPatchInterface
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
        //Set the Store Information
        $this->resourceConfig->saveConfig("general/store_information/name", "Luma, Inc.", "default", 0)
            ->saveConfig("general/store_information/phone", "310-945-0345", "default", 0)
            ->saveConfig("general/store_information/hours", "9AM - 5PM", "default", 0)
            ->saveConfig("general/store_information/country_id", "US", "default", 0)
            ->saveConfig("general/store_information/region_id", "12", "default", 0)
            ->saveConfig("general/store_information/postcode", "90016", "default", 0)
            ->saveConfig("general/store_information/city", "Los Angeles", "default", 0)
            ->saveConfig("general/store_information/street_line1", "3640 Holdrege Ave", "default", 0);
        //Set Shipping Origin
        $this->resourceConfig->saveConfig("shipping/origin/city", "Los Angeles", "default", 0)
            ->saveConfig("shipping/origin/street_line1", "3640 Holdrege Ave", "default", 0)
            ->saveConfig("shipping/origin/postcode", "90016", "default", 0);
        //Set Site Meta Data
        //Luma
        $this->resourceConfig->saveConfig("design/head/default_title", "LUMA Official Online Store", "stores", 1)
            ->saveConfig("design/head/default_description", "With more than 230 stores spanning 43 states and growing, Luma is a nationally recognized active wear manufacturer and retailer. We’re passionate about active lifestyles – and it goes way beyond apparel.", "stores", 1)
            ->saveConfig("design/head/default_keywords", "yoga,exercise,apparel,clothing,working out,fitness", "stores", 1);
        //Luma DE
        $this->resourceConfig->saveConfig("design/head/default_title", "Offizieller LUMA Online-Shop", "stores", 2)
            ->saveConfig("design/head/default_description", "Luma ist ein landesweit anerkannter Hersteller und Händler von Sportbekleidung mit über 230 Filialen in 43 Bundesstaaten. Ein aktiver Lebensstil ist unsere Leidenschaft – und das längst nicht nur in puncto Kleidung.", "stores", 2)
            ->saveConfig("design/head/default_keywords", "yoga,sport,bekleidung,kleidung,training,fitness", "stores", 2);
        //Venia
        $this->resourceConfig->saveConfig("design/head/default_title", "VENIA Official Online Store", "stores", 3)
            ->saveConfig("design/head/default_description", "With 50 stores spanning 40 states and growing, Venia is a nationally recognized high fashion retailer for women. We’re passionate about helping you look your best.", "stores", 3)
            ->saveConfig("design/head/default_keywords", "fashion,women,blouse,top,pant,dress,venia", "stores", 3);
        //remove default welcome message
        $this->resourceConfig->saveConfig("design/header/welcome", "", "default", 0);
        //enable RMA
        $this->resourceConfig->saveConfig("sales/magento_rma/use_store_addresssales/magento_rma/use_store_address", "1", "default", 0)
            ->saveConfig("sales/magento_rma/enabled_on_product", "1", "default", 0)
            ->saveConfig("sales/magento_rma/enabled", "1", "default", 0);
        //set upsells, crosssells, related
        $this->resourceConfig->saveConfig("catalog/magento_targetrule/upsell_position_limit", "5", "default", 0)
            ->saveConfig("catalog/magento_targetrule/crosssell_position_limit", "6", "default", 0)
            ->saveConfig("catalog/magento_targetrule/related_position_limit", "5", "default", 0);
        //different related setting for venia
        $this->resourceConfig->saveConfig("catalog/magento_targetrule/related_position_limit", "4", "stores", 3);
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
