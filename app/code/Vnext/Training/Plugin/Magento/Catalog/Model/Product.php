<?php
namespace Vnext\Training\Plugin\Magento\Catalog\Model;
/**
 * Class Product
 * @package Vnext\Training\Plugin\Magento\Catalog\Model
 */
class Product
{
    public function beforeSetName(\Magento\Catalog\Model\Product $subject, $name)
    {
        //Your plugin code
        return ['(' . $name . ')'];
    }

    public function afterGetName(\Magento\Catalog\Model\Product $subject,$result)
    {
        //Your plugin code
        return '|' . $result . '|';
    }

    public function aroundGetName(\Magento\Catalog\Model\Product $subject,\Closure $proceed)
    {
        //Your plugin code
        $result = $proceed();
        return $result;
    }
}
