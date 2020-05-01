<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.magepal.com | support@magepal.com
 */

namespace MagePal\LinkProduct\Model\ProductLink\CollectionProvider;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ProductLink\CollectionProviderInterface;

class Accessory implements CollectionProviderInterface
{
    /** @var \MagePal\LinkProduct\Model\Accessory */
    protected $accessoryModel;

    /**
     * Accessory constructor.
     * @param \MagePal\LinkProduct\Model\Accessory $accessoryModel
     */
    public function __construct(
        \MagePal\LinkProduct\Model\Accessory $accessoryModel
    ) {
        $this->accessoryModel = $accessoryModel;
    }

    /**
     * {@inheritdoc}
     */
    public function getLinkedProducts(Product $product)
    {
        return (array) $this->accessoryModel->getAccessoryProducts($product);
    }
}
