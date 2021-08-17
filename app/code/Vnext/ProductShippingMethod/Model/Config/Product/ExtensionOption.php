<?php
namespace Vnext\ProductShippingMethod\Model\Config\Product;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class ExtensionOption extends AbstractSource
{
    protected $optionFactory;

    public function getAllOptions()
    {
        $this->_options = [];
        $this->_options[] = ['label' => 'Flat Rate', 'value' => 'flatrate'];
        $this->_options[] = ['label' => 'Free Shipping', 'value' => 'freeshipping'];
        $this->_options[] = ['label' => 'Table Rates', 'value' => 'tablerates'];

        return $this->_options;
    }


}
