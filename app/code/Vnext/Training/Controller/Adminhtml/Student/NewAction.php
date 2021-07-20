<?php

namespace Vnext\Training\Controller\Adminhtml\Student;

class NewAction extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Vnext_Training::student');

        $resultPage->getConfig()->getTitle()->prepend((__('Student New')));

        return $resultPage;
    }


}
