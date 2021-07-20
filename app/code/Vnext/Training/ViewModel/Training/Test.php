<?php

namespace Vnext\Training\ViewModel\Training;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Test implements ArgumentInterface
{
    protected $studentFactory;

    /**
     * @var StudentRepositoryInterface
     */
    protected $studentRepository;

    /**
     * @var StudentInterface
     */
    protected $studentModel;

    protected $studentCollectionFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;


    /**
     * Test constructor.
     * @param \Vnext\Training\Model\StudentFactory $studentFactory
     * @param \Vnext\Training\Api\Data\StudentInterface $studentModel
     * @param \Vnext\Training\Api\StudentRepositoryInterface $studentRepository,
     */
    public function __construct(
        \Vnext\Training\Model\StudentFactory $studentFactory,
        \Vnext\Training\Api\Data\StudentInterface $studentModel,
        \Vnext\Training\Api\StudentRepositoryInterface $studentRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
    )
    {
        $this->studentFactory = $studentFactory;
        $this->studentModel = $studentModel;
        $this->studentRepository = $studentRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    public function getListDataStudent()
    {
//        $id=($this->getRequest()->getParam('id'))? $this->getRequest()->getParam('id') : '';
//        if($id != ''){
//            $items = $this->studentCollectionFactory->create()->load($id);
//            return $items;
//        }
//        $search=($this->getRequest()->getParam('search'))? $this->getRequest()->getParam('search') : '';
//        $this->studentModel->setName('antest3');
//        $student = $this->studentRepository->save($this->studentModel);
//        var_dump($student->getName());die;
//        $this->searchCriteriaBuilder->addFilter('name', '%vinh%', 'like');
//        $this->searchCriteriaBuilder->addFilter('name', '%Student%', 'like');
//        $this->searchCriteriaBuilder->addFilter('roll_number', '123', 'eq');
//        $this->searchCriteriaBuilder->setCurrentPage(1)->setPageSize(5);
        $searchCriteria = $this->searchCriteriaBuilder->create();

        $searchResult = $this->studentRepository->getList($searchCriteria);
        $items = $searchResult->getItems();

//        foreach ($items as $item) {
//            var_dump($item->getName());
//        }
//        die;
        return $items;

    }


}

