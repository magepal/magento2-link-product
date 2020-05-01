<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 * http://www.magepal.com | support@magepal.com
 */

namespace MagePal\LinkProduct\Model;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Product\Link\Collection;
use Magento\Framework\DataObject;
use MagePal\LinkProduct\Model\Product\Link;

class Accessory extends DataObject
{
    /**
     * Product link instance
     *
     * @var Product\Link
     */
    protected $linkInstance;

    /**
     * Accessory constructor.
     * @param Link $productLink
     */
    public function __construct(
        Link $productLink
    ) {
        $this->linkInstance = $productLink;
    }

    /**
     * Retrieve link instance
     *
     * @return  Product\Link
     */
    public function getLinkInstance()
    {
        return $this->linkInstance;
    }

    /**
     * Retrieve array of Accessory products
     *
     * @param Product $currentProduct
     * @return array
     */
    public function getAccessoryProducts(Product $currentProduct)
    {
        if (!$this->hasAccessoryProducts()) {
            $products = [];
            $collection = $this->getAccessoryProductCollection($currentProduct);
            foreach ($collection as $product) {
                $products[] = $product;
            }
            $this->setAccessoryProducts($products);
        }
        return $this->getData('accessory_products');
    }

    /**
     * Retrieve accessory products identifiers
     *
     * @param Product $currentProduct
     * @return array
     */
    public function getAccessoryProductIds(Product $currentProduct)
    {
        if (!$this->hasAccessoryProductIds()) {
            $ids = [];
            foreach ($this->getAccessoryProducts($currentProduct) as $product) {
                $ids[] = $product->getId();
            }
            $this->setAccessoryProductIds($ids);
        }
        return $this->getData('accessory_product_ids');
    }

    /**
     * Retrieve collection accessory product
     *
     * @param Product $currentProduct
     * @return \Magento\Catalog\Model\ResourceModel\Product\Link\Product\Collection
     */
    public function getAccessoryProductCollection(Product $currentProduct)
    {
        $collection = $this->getLinkInstance()->useAccessoryLinks()->getProductCollection()->setIsStrongMode();
        $collection->setProduct($currentProduct);
        return $collection;
    }

    /**
     * Retrieve collection accessory link
     *
     * @param Product $currentProduct
     * @return Collection
     */
    public function getAccessoryLinkCollection(Product $currentProduct)
    {
        $collection = $this->getLinkInstance()->useAccessoryLinks()->getLinkCollection();
        $collection->setProduct($currentProduct);
        $collection->addLinkTypeIdFilter();
        $collection->addProductIdFilter();
        $collection->joinAttributes();
        return $collection;
    }
}
