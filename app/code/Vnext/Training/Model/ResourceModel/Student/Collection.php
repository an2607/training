<?php
namespace Vnext\Training\Model\ResourceModel\Student;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Vnext\Training\Model\Student','Vnext\Training\Model\ResourceModel\Student');
    }
}
