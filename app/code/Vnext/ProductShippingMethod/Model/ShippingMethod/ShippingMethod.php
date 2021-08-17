<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Vnext\ProductShippingMethod\Model\ShippingMethod;

class ShippingMethod extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{

    protected $quoteValidator = null;

    public function __construct(\Magento\Quote\Model\QuoteValidator $quoteValidator
    )
    {
        $this->quoteValidator = $quoteValidator;
    }
    /**
     * @param \Magento\Quote\Model\Quote $quote
     * @param Address\Total $total
     * @return array|null
     */
    /**
     * Assign subtotal amount and label to address object
     *
     * @param \Magento\Quote\Model\Quote $quote
     * @param Address\Total $total
     * @return array
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */

    public function fetch(\Magento\Quote\Model\Quote $quote, \Magento\Quote\Model\Quote\Address\Total $total)
    {
        $quoteItems = $quote->getAllItems();
        foreach ($quoteItems as $item ){
            $product = $item->getProduct();
            $data[$item->getProductId()] = [
                'value' => $product->getCustomAttribute('shipping_method')->getValue()
            ];
        }
        return [
            'code' => 'shipping_method',
            'value' => $data
        ];
    }

}
