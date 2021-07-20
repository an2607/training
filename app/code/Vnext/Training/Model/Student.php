<?php
namespace Vnext\Training\Model;

use Vnext\Training\Api\Data\StudentInterface;

class Student extends \Magento\Framework\Model\AbstractModel implements StudentInterface
{
    public function _construct()
    {
        $this->_init('Vnext\Training\Model\ResourceModel\Student');
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return parent::getData(self::ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return parent::getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getRollNumber()
    {
        return parent::getData(self::ROLL_NUMBER);
    }

    /**
     * @inheritDoc
     */
    public function setRollNumber($rollNumber)
    {
        return $this->setData(self::ROLL_NUMBER, $rollNumber);
    }

    /**
     * @inheritDoc
     */
    public function getGender()
    {
        return parent::getData(self::GENDER);
    }

    /**
     * @inheritDoc
     */
    public function setGender($gender)
    {
        return $this->setData(self::GENDER, $gender);
    }

    /**
     * @inheritDoc
     */
    public function getDob()
    {
        return parent::getData(self::DOB);
    }

    /**
     * @inheritDoc
     */
    public function setEmail($email)
    {
        return $this->setData(self::MAIL, $email);
    }

    /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return parent::getData(self::MAIL);
    }

    /**
     * @inheritDoc
     */
    public function setDob($dob)
    {
        return $this->setData(self::DOB, $dob);
    }

    /**
     * @inheritDoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritDoc
     */
    public function setExtensionAttributes(
        StudentExtensionInterface $extensionAttributes
    ) {
        $this->_setExtensionAttributes($extensionAttributes);
    }


}
