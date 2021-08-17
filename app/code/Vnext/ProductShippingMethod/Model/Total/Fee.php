<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Vnext\ProductShippingMethod\Model\Total;

use Magento\Checkout\CustomerData\ItemPoolInterface;

class Fee extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{
    /**
     * @var ItemPoolInterface
     */
    protected $itemPoolInterface;
    /**
     * Collect grand total address amount
     *
     * @param \Magento\Quote\Model\Quote $quote
     * @param \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment
     * @param \Magento\Quote\Model\Quote\Address\Total $total
     * @param ItemPoolInterface $itemPoolInterface

     * @return $this
     */
    protected $quoteValidator = null;

    public function __construct(\Magento\Quote\Model\QuoteValidator $quoteValidator
//                                ItemPoolInterface $itemPoolInterface,

    )
    {
        $this->quoteValidator = $quoteValidator;
//        $this->itemPoolInterface = $itemPoolInterface;

    }
//    public function collect(
//        \Magento\Quote\Model\Quote $quote,
//        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
//        \Magento\Quote\Model\Quote\Address\Total $total
//    ) {
//        parent::collect($quote, $shippingAssignment, $total);
//        $price = 0;
//        $total->setGrandTotal($total->getGrandTotal() + $price);
//
//        return $this;
//    }


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
        $data = [];
        foreach ($quoteItems as $item ){
            $product = $item->getProduct();
            $data[$item->getProductId()] = [
                'code' => 'shipping_fee',
                'value' => $product->getCustomAttribute('shipping_fee')->getValue()
            ];
        }
        return $data;
//        return [
//            'code' => 'shipping_fee',
//            'value' => $data
//        ];

    }

}
