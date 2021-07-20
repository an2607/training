<?php

namespace Vnext\Training\Controller\Student;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;



class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $studentFactory;
    protected $scopeConfig;
    protected $redirectFactory;
    protected $request;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->scopeConfig = $scopeConfig;
        $this->redirectFactory = $redirectFactory;
        $this->request = $request;
        $this->_pageFactory = $pageFactory;
         return parent::__construct($context);
    }

    public function execute()
    {
        $url = $this->scopeConfig->getValue('section_id/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        if($url == true){
            $firstParam = $this->request->getParam('first_param', null);
            $secondParam = $this->request->getParam('second_param', null);
            return $this->_pageFactory->create();

        }else{
            return $this->redirectFactory->create()
                ->setPath('404notfound');
        }

//        return $this->_pageFactory->create();
    }

}
