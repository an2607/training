<?php

namespace Vnext\Training\Block\Adminhtml\Index;

class Index extends \Magento\Framework\View\Element\Template
{
    public function __construct(

        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {

        parent::__construct($context, $data);
    }

    public function getTrainingContent(){
        return __('TrainingContent');
    }
}
