<?php
namespace Vnext\Training\Plugin;

class Product
{

    public function afterGetName(\Magento\Catalog\Model\Product $subject,$result)
    {
        //Your plugin code
        return " xinchao - " . $result ;
    }
}
