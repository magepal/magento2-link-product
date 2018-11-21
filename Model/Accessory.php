<?php
/**
 * Copyright © MagePal LLC. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MagePal\LinkProduct\Model;

class Accessory extends \Magento\Framework\DataObject
{
    /**
     * Product link instance
     *
     * @var Product\Link
     */
    protected $linkInstance;

    public function __construct(
        \MagePal\LinkProduct\Model\Product\Link $productLink
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
     * @param \Magento\Catalog\Model\Product $currentProduct
     * @return array
     */
    public function getAccessoryProducts(\Magento\Catalog\Model\Product $currentProduct)
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
     * @param \Magento\Catalog\Model\Product $currentProduct
     * @return array
     */
    public function getAccessoryProductIds(\Magento\Catalog\Model\Product $currentProduct)
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
     * @param \Magento\Catalog\Model\Product $currentProduct
     * @return \Magento\Catalog\Model\ResourceModel\Product\Link\Product\Collection
     */
    public function getAccessoryProductCollection(\Magento\Catalog\Model\Product $currentProduct)
    {
        $collection = $this->getLinkInstance()->useAccessoryLinks()->getProductCollection()->setIsStrongMode();
        $collection->setProduct($currentProduct);
        return $collection;
    }

    /**
     * Retrieve collection accessory link
     *
     * @param \Magento\Catalog\Model\Product $currentProduct
     * @return \Magento\Catalog\Model\ResourceModel\Product\Link\Collection
     */
    public function getAccessoryLinkCollection(\Magento\Catalog\Model\Product $currentProduct)
    {
        $collection = $this->getLinkInstance()->useAccessoryLinks()->getLinkCollection();
        $collection->setProduct($currentProduct);
        $collection->addLinkTypeIdFilter();
        $collection->addProductIdFilter();
        $collection->joinAttributes();
        return $collection;
    }
}
