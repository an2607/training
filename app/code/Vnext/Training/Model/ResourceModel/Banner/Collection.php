<?php

namespace Vnext\Training\Model\ResourceModel\Banner;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    protected function _construct()
    {
        // Model + Resource Model
        $this->_init('Vnext\Training\Model\Banner', 'Vnext\Training\Model\ResourceModel\Banner');
    }

}
