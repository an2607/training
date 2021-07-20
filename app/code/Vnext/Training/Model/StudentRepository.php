<?php

namespace Vnext\Training\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Vnext\Training\Api\Data\StudentInterface;
use Vnext\Training\Api\Data\StudentSearchResultInterfaceFactory;
use Vnext\Training\Api\StudentRepositoryInterface;
use Vnext\Training\Model\ResourceModel\Student;
use Vnext\Training\Model\ResourceModel\Student\CollectionFactory;

/**
 * Class StudentRepository
 * @author Suman Kar(suman.jis@gmail.com)
 */
class StudentRepository implements StudentRepositoryInterface
{

    /**
     * @var StudentFactory
     */
    private $studentFactory;

    /**
     * @var Student
     */
    private $studentResource;

    /**
     * @var StudentCollectionFactory
     */
    private $studentCollectionFactory;

    /**
     * @var StudentSearchResultInterfaceFactory
     */
    private $searchResultFactory;
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    private $productRepository;

    private $studentModel;

//    protected $studentRepository;


    public function __construct(
        \Vnext\Training\Api\Data\StudentInterface $studentModel,
//        \Vnext\Training\Api\StudentRepositoryInterface $studentRepository,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        StudentFactory $studentFactory,
        Student $studentResource,
        CollectionFactory $studentCollectionFactory,
        StudentSearchResultInterfaceFactory $studentSearchResultInterfaceFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->studentFactory = $studentFactory;
        $this->studentResource = $studentResource;
        $this->studentCollectionFactory = $studentCollectionFactory;
        $this->searchResultFactory = $studentSearchResultInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->productRepository = $productRepository;
        $this->studentModel = $studentModel;

    }

//    /**
//     * @param int $id
//     * @param string $name
//     * @param string $gender
//     * @return \Vnext\Training\Api\Data\StudentInterface
//     */
//    public function addStudent($id, $name, $gender){
//        $student = $this->studentFactory->create();
//        $student->setName($id);
//        $student->setName($name);
//        $student->setGender($gender);
//        $this->studentResource->save($student);
//        return $student;
//    }


    /**
     * @param  \Vnext\Training\Api\Data\StudentInterface $student
     * @return \Vnext\Training\Api\Data\StudentInterface
     */
    public function createStudent(\Vnext\Training\Api\Data\StudentInterface $student){
//        $student = $this->studentFactory->create();
        $this->studentResource->save($student);
        return $student;
    }

    /**
     * @param int $id
     * @return \Vnext\Training\Api\Data\StudentInterface
     */
    public function getByIdStudent($id)
    {
        $student = $this->studentFactory->create();
        $this->studentResource->load($student, $id);
        if (!$student->getId()) {
            throw new NoSuchEntityException(__('Unable to find Student with ID "%1"', $id));
        }
        return $student;
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $gender
     * @param string $dob
     * @param string $email
     * @return \Vnext\Training\Api\Data\StudentInterface
     */
    public function editByIdStudent($id, $name, $gender, $dob, $email){
        $student = $this->studentFactory->create();
        $this->studentResource->load($student, $id);
        $student->setName($id);
        $student->setName($name);
        $student->setGender($gender);
        $student->setDob($dob);
        $student->setEmail($email);
        $this->studentResource->save($student);
        return $student;
    }

    /**
     * @param int $id
     * @return \Vnext\Training\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException

     */
    public function deleteById($id)
    {
        try {
            $student = $this->studentFactory->create();
            $student->load($id);
            $student->delete();
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }

        return true;
    }



    /**
     * @param int $id
     * @return \Vnext\Training\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */

    public function getById($id)
    {
        $student = $this->studentFactory->create();
        $this->studentResource->load($student, $id);
        if (!$student->getId()) {
            throw new NoSuchEntityException(__('Unable to find Student with ID "%1"', $id));
        }
        return $student;
    }

    /**
     * @param \Vnext\Training\Api\Data\StudentInterface $student
     * @return \Vnext\Training\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(StudentInterface $student)
    {
        $this->studentResource->save($student);
        return $student;
    }

    /**
     * @param \Vnext\Training\Api\Data\StudentInterface $student
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(StudentInterface $student)
    {
        try {
            $this->studentResource->delete($student);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }

        return true;

    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Vnext\Training\Api\Data\StudentSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->studentCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());

//        echo "</br>";
//        echo $collection->getSelect()->__toString();
//        echo "</br>";

        return $searchResults;
    }
}
