<?php

namespace Vnext\Training\Block\Student;


class Index extends \Magento\Framework\View\Element\Template
{
    protected $studentNewsFactory;
    protected $_query;
    protected $collection;
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
        \Vnext\Training\Api\Data\StudentInterface $studentModel,
        \Vnext\Training\Api\StudentRepositoryInterface $studentRepository,
        array $data = []
    ) {

        parent::__construct($context, $data);
        $this->studentNewsFactory = $studentNewsFactory;
        $this->_query = $query;
        $this->scopeConfig  = $scopeConfig;
        $this->studentModel = $studentModel;
        $this->studentRepository = $studentRepository;
        $this->collection = $this->getStudentCollection();

    }

    public function getStudent(){
        return __('TrainingContent');
    }

    public function getStudentCollection(){
        $collection = $this->studentNewsFactory->create()->getCollection();
        return $collection;
    }

    public static function toSlug($str, $delimiter = '-'){

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;

    }

    public function getListNews()
    {
        $searchAdmin= $this->scopeConfig->getValue('section_id/general/search', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        $enable= $this->scopeConfig->getValue('section_id/general/list_field', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $displayText= $this->scopeConfig->getValue('section_id/general/list_sort', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $pageAdmin= $this->scopeConfig->getValue('section_id/general/page', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        //get values of current page
        $page=($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
        //get values of current limit
        $pageSize=($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : $pageAdmin;

        $sort=($this->getRequest()->getParam('sort'))? $this->getRequest()->getParam('sort') : '';
//        $dob=($this->getRequest()->getParam('dob'))? $this->getRequest()->getParam('dob') : '';
        $search=($this->getRequest()->getParam('search'))? $this->getRequest()->getParam('search') : $searchAdmin;
        $gender=($this->getRequest()->getParam('gender'))? $this->getRequest()->getParam('gender') : '';
        $from=($this->getRequest()->getParam('from'))? $this->getRequest()->getParam('from') : '';

        $to=($this->getRequest()->getParam('to'))? $this->getRequest()->getParam('to') : '';


        $student=($this->getRequest()->getParam('slug'))? $this->getRequest()->getParam('slug') : '';

        $params = $this->getRequest()->getParams();
//        $collection = $this->studentNewsFactory->create()->getCollection();
        $collection = $this->collection;
//        if($student!=""){
//            $collection->addFieldToFilter('entity_id',$student);
//        }
        if(isset($enable) && isset($displayText)){
            $collection->setOrder($enable , $displayText);
        }
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);
        if($from != ''){
            $collection->addFieldToFilter('dob' ,['gteq' => $from] );
        }
        if($to != ''){
            $collection->addFieldToFilter('dob' ,['lteq' => $to] );
        }
        if ($search != '')
        {
            $collection->addFieldToFilter(['entity_id', 'name', 'dob', 'gender'],
                [
                    ['in' => $search],
                    ['in' => $search],
                    ['like' => $search],
                    ['like' => $search],
                    ['eq' => $search],
                ]);
        }

        if ($gender != '')
        {
            $collection->addFieldToFilter('gender', $gender);
        }

        if($sort){
            if($sort == 'giam_id'){
                $collection->setOrder('entity_id','desc');
            }
            elseif ($sort == 'tang_name') {
                $collection->setOrder('name','ASC');
            }elseif ($sort == 'giam_name') {
                $collection->setOrder('name','desc');
            }elseif ($sort == 'tang_dob') {
                $collection->setOrder('dob','ASC');
            }elseif ($sort == 'giam_dob') {
                $collection->setOrder('dob','desc');
            }
        }

        return $collection;
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('STUDENT'));


        if ($this->getListNews()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'student.pager'
            )->setAvailableLimit(array(5=>5,))->setShowPerPage(true)->setCollection(
                $this->getListNews()
            );
            $this->setChild('pager', $pager);
            $this->getListNews()->load();
        }
        return $this;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

}
