<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
  
 namespace MagentoEse\AdminConfigurations\Setup;
  
 use Magento\Framework\Setup\UpgradeDataInterface;
 use Magento\Framework\Setup\ModuleDataSetupInterface;
 use Magento\Framework\Setup\ModuleContextInterface;
 use Magento\Framework\Event\ObserverInterface;

 class UpgradeData implements UpgradeDataInterface {
   public $_resourceConfig;

   public function __construct(
       \Magento\Config\Model\ResourceModel\Config $resourceConfig
   ) {
       $this->_resourceConfig = $resourceConfig;
   }
  
     public function upgrade( ModuleDataSetupInterface $setup, ModuleContextInterface $context ) {
         $installer = $setup;

   if (version_compare($context->getVersion(), '0.0.2', '<')) {
      
         $this->_resourceConfig->saveConfig(
          "admin/security/session_lifetime", "900000", "default", 0)->saveConfig(
          "dev/js/merge_files", "1", "default", 0)->saveConfig(
          "dev/js/minify_files", "1", "default", 0)->saveConfig(
          "dev/css/merge_css_files", "1", "default", 0)->saveConfig(
          "dev/css/minify_files", "1", "default", 0)->saveConfig(
          "dev/js/enable_js_bundling", "1", "default", 0)->saveConfig(
          "dev/template/minify_html", "1", "default", 0)->saveConfig(
          "payment/braintree/usecache", "1", "default", 0)->saveConfig(
          "system/full_page_cache/ttl", "8640000", 0)->saveConfig(
          "web/cookie/cookie_lifetime", "604800", 0)->saveConfig(
          "admin/security/admin_account_sharing", "1", "default", 0)->saveConfig(
          "web/seo/use_rewrites", "1", "default", 0)->saveConfig(
          "payment/braintree/active", "1", "default", 0)->saveConfig(
          "payment/braintree/title", "Credit Card", "default", 0)->saveConfig(
          "payment/braintree/environment", "sandbox", "default", 0)->saveConfig(
          "payment/braintree/payment_action", "authorize_capture", "default", 0)->saveConfig(
          "payment/braintree/merchant_account_id", "magento", "default", 0)->saveConfig(
          "payment/braintree/merchant_id", "zkw2ctrkj75ndvkc", "default", 0)->saveConfig(
          "payment/braintree/public_key", "0:2:5bgc5OpZgjZmtbN4SoHjtjk4GwfVmFxh:BHaV/Ln6Y24Im9QP3FqXh/X6ZqfWYeeqDgJCsK79Pj8=", "default", 0)->saveConfig(
          "payment/braintree/private_key", "0:2:HDkCiAspJhB2jfX2tvbNElIaHNVUij2P:fAHWXy6S3AdZ1F2eNrw3Qck15XF5KsDsE1RaVMmBmZk=", "default", 0)->saveConfig(
          "payment/braintree/debug", "0", "default", 0)->saveConfig(
          "payment/braintree/capture_action", "invoice", "default", 0)->saveConfig(
          "payment/braintree/order_status", "processing", "default", 0)->saveConfig(
          "payment/braintree/use_vault", "0", "default", 0)->saveConfig(
          "payment/braintree/duplicate_card", "0", "default", 0)->saveConfig(
          "payment/braintree/cctypes", "AE,VI,MC,DI,JCB", "default", 0)->saveConfig(
          "payment/braintree/enable_cc_detection", "1", "default", 0)->saveConfig(
          "payment/braintree/fraudprotection", "0", "default", 0)->saveConfig(
          "payment/braintree/usecache", "0", "default", 0)->saveConfig(
          "payment/braintree/allowspecific", "0", "default", 0)->saveConfig(
          "payment/braintree/countrycreditcard", "a:0:{}", "default", 0)->saveConfig(
          "payment/braintree/verify_3dsecure", "0", "default", 0)->saveConfig(
          "payment/braintree_paypal/active", "1", "default", 0)->saveConfig(
          "payment/braintree_paypal/title", "PayPal", "default", 0)->saveConfig(
          "payment/braintree_paypal/payment_action", "authorize", "default", 0)->saveConfig(
          "payment/braintree_paypal/order_status", "processing", "default", 0)->saveConfig(
          "payment/braintree_paypal/allowspecific", "0", "default", 0)->saveConfig(
          "payment/braintree_paypal/require_billing_address", "0", "default", 0)->saveConfig(
          "payment/braintree_paypal/display_on_shopping_cart", "0", "default", 0)->saveConfig(
          "payment/braintree_paypal/allow_shipping_address_override", "0", "default", 0)->saveConfig(
          "payment/braintree_paypal/debug", "0", "default", 0
       );
      }     
    }
}   
