<?php
namespace Vnext\Training\Block\Adminhtml\Student;

class Index extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        $this->_controller = 'adminhtml_student_index';
        $this->_blockGroup = 'Vnext_Training';
        $this->_headerText = __('Student');
        $this->_addButtonLabel = __('Create New Student');
        parent::_construct();
    }

}
