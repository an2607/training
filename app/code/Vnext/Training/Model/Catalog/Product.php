<?php
namespace Vnext\Training\Model\Catalog;

use Magento\TestFramework\Event\Magento;

class Product extends \Magento\Catalog\Model\Product
{

    /**
     * Get product name
     * @return string
     */
    public function getName(){
        $name = $this->_getData(self::NAME);
        $sku = $this->_getData(self::SKU);
        return $name . ' + ' . $sku;
    }


}
