<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MagePal\LinkProduct\Model\ProductLink\CollectionProvider;

class Accessory implements \Magento\Catalog\Model\ProductLink\CollectionProviderInterface
{
    /** @var \MagePal\LinkProduct\Model\Accessory */
    protected $accessoryModel;

    public function __construct(
        \MagePal\LinkProduct\Model\Accessory $accessoryModel
    ) {
        $this->accessoryModel = $accessoryModel;
    }

    /**
     * {@inheritdoc}
     */
    public function getLinkedProducts(\Magento\Catalog\Model\Product $product)
    {
        return (array) $this->accessoryModel->getAccessoryProducts($product);
    }
}
