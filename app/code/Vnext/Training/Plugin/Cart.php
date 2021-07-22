<?php

declare(strict_types=1);

namespace Vnext\Training\Plugin;

class Cart
{
    public function beforeAddProduct(\Magento\Checkout\Model\Cart $subject, $productInfo, $requestInfo = null)
    {
        $requestInfo['qty'] = 10;
        return [$productInfo, $requestInfo];
    }

    public function aroundAddProduct(\Magento\Checkout\Model\Cart $subject, \Closure $proceed, $productInfo, $requestInfo = null)
    {
        //Your plugin code
        $requestInfo['qty'] = 3;
        $result = $proceed($productInfo, $requestInfo);
        return $result;
    }
}
