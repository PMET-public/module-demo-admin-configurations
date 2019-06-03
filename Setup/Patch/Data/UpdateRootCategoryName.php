<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MagentoEse\DemoAdminConfigurations\Setup\Patch\Data;


use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Catalog\Model\CategoryFactory;

class UpdateRootCategoryName implements DataPatchInterface
{

    /** @var CategoryRepositoryInterface  */
    private $categoryRepository;

    /** @var CategoryFactory  */
    private $categoryFactory;

    /**
     * UpdateRootCategoryName constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     * @param CategoryFactory $collectionFactory
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        CategoryFactory $categoryFactory)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryFactory = $categoryFactory;
    }

    public function apply()
    {
        /** @var \Magento\Catalog\Model\Category $category */
        $category = $this->categoryFactory->create();
        $category->setStoreId(0);
        $category->load(2);
        $category->setName('Luma Catalog');
        $category->save();
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