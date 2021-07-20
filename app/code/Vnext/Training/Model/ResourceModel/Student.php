<?php
namespace Vnext\Training\Model\ResourceModel;

class Student extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('student', 'entity_id');
    }
}
