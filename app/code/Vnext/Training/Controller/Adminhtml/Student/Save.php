<?php

namespace Vnext\Training\Controller\Adminhtml\Student;

use Magento\Backend\App\Action;
use Vnext\Training\Model\StudentFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class Save extends Action
{
    private $resultRedirect;
    private $studentFactory;

    public function __construct(
        Action\Context $context,
        StudentFactory $studentFactory,
        RedirectFactory $redirectFactory
    )
    {
        parent::__construct($context);
        $this->studentFactory = $studentFactory;
        $this->resultRedirect = $redirectFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['entity_id']) ? $data['entity_id'] : null;

        $newData = [
            'name' => $data['name'],
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'email' => $data['email'],
        ];

        $student = $this->studentFactory->create();
        if ($id) {
            $student->load($id);
            $this->getMessageManager()->addSuccessMessage(__('Edit thành công'));
        } else {
            $this->getMessageManager()->addSuccessMessage(__('Save thành công.'));
        }
        try{
            $student->addData($newData);
            $student->save();
            return $this->resultRedirect->create()->setPath('backend/student/index');
        }catch (\Exception $e){
            $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));
        }
    }
}
