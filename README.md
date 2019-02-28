<a href="http://www.magepal.com" title="Top Magento 2 Extension Provider" ><img src="https://image.ibb.co/dHBkYH/Magepal_logo.png" width="100" align="right" alt="Magento Extension Provider" /></a>

## Custom Product Relation Sample Extension for Magento 2.2.x and 2.3.x (with zero class rewrite or hacks)


Create a new product accessory relationship in additional to the default Up-sell products, Related products, and Cross-sell products options available in Magento.

![Magento Custom Product Relation](https://image.ibb.co/mPXauq/magento-2-link-product.png)


#### Usage

````
    public function __construct(
        ...
        \MagePal\LinkProduct\Model\Accessory $accessory,
        ....
    ) {
        ...
        $this->accessory = $accessory;
    }
    
    $product = $currentProduct;
    return products
    $accessoryItems = $this->accessory->getAccessoryProducts($product);
    //return product ids
    $accessoryItemIds = $this->accessory->getAccessoryProductIds($product);
    
````

#### Step 1

##### Using Composer (recommended)

```
composer require magepal/link-product
```

##### Manually
 * Download the extension
 * Unzip the file
 * Create a folder {Magento 2 root}/app/code/MagePal/LinkProduct
 * Copy the content from the unzip folder


#### Step 2 - Enable extension ("cd" to {Magento root} folder)
```
  php -f bin/magento module:enable --clear-static-content MagePal_LinkProduct
  php -f bin/magento setup:upgrade
```


Contribution
---
Want to contribute to this extension? The quickest way is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Importing via CSV or 3rd party extensions
---

To import via CSV, you need to have the [a patch applied to the core](https://github.com/magento/magento2/pull/21230/commits/0846e9aed7040659e7ce3e109eb91df3f5fdfb7e.patch) (until merged to Magento 2).

Support
---
If you encounter any problems or bugs, please open an issue on [GitHub](https://github.com/magepal/link-product/issues).

Need help setting up or want to customize this extension to meet your business needs? Please email support@magepal.com and if we like your idea we will add this feature for free or at a discounted rate.

Magento 2 Plugins
---
[Custom SMTP](https://www.magepal.com/magento2/extensions/custom-smtp.html) | [Google Tag Manager](https://www.magepal.com/magento2/extensions/google-tag-manager.html) | [Enhanced E-commerce](https://www.magepal.com/magento2/extensions/enhanced-ecommerce-for-google-tag-manager.html) | [Reindex](https://www.magepal.com/magento2/extensions/reindex.html) | [Custom Shipping Method](https://www.magepal.com/magento2/extensions/custom-shipping-rates-for-magento-2.html) | [Preview Order Confirmation](https://www.magepal.com/magento2/extensions/preview-order-confirmation-page-for-magento-2.html) | [Guest to Customer](https://www.magepal.com/magento2/extensions/guest-to-customer.html) | [Admin Form Fields Manager](https://www.magepal.com/magento2/extensions/admin-form-fields-manager-for-magento-2.html) | [Customer Dashboard Links Manager](https://www.magepal.com/magento2/extensions/customer-dashboard-links-manager-for-magento-2.html) | [Lazy Loader](https://www.magepal.com/magento2/extensions/lazy-load.html) | [Order Confirmation Page Miscellaneous Scripts](https://www.magepal.com/magento2/extensions/order-confirmation-miscellaneous-scripts-for-magento-2.html)

© MagePal LLC. | [www.magepal.com](http:/www.magepal.com)
