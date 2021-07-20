<?php

namespace Vnext\Training\Block\Student;


class Detail extends \Magento\Framework\View\Element\Template
{
    protected $studentNewsFactory;
    protected $_query;
    protected $scopeConfig;

    /**
     * @var StudentRepositoryInterface
     */
    protected $studentRepository;

    /**
     * @var StudentInterface
     */
    protected $studentModel;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Vnext\Training\Model\StudentFactory $studentNewsFactory,
        \Magento\Search\Model\QueryFactory $query,
        \Magento\Framework\App\Config\ScopeConfigInterface  $scopeConfig,
        array $data = []
    ) {

        parent::__construct($context, $data);
        $this->studentNewsFactory = $studentNewsFactory;
        $this->_query = $query;
        $this->scopeConfig  = $scopeConfig;

    }

    public function getStudentDetail(){
        $student=($this->getRequest()->getParam('slug'))? $this->getRequest()->getParam('slug') : '';
        if($student != ''){
            return $this->studentNewsFactory->create()->load($student);
        }
        // else{
        //     return $this->redirectFactory->create()->setPath('404notfound');
        // }
    }

}
