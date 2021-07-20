<?php
namespace Vnext\Training\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface StudentInterface extends ExtensibleDataInterface
{
    const ENTITY_ID = 'entity_id';
    const NAME = 'name';
    const ROLL_NUMBER = 'roll_number';
    const GENDER = 'gender';
    const DOB = 'dob';
    const MAIL = 'email';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getRollNumber();

    /**
     * @param $rollNumber
     * @return mixed
     */
    public function setRollNumber($rollNumber);

    /**
     * @return mixed
     */
    public function getGender();

    /**
     * @param $gender
     * @return mixed
     */
    public function setGender($gender);

    /**
     * @return mixed
     */
    public function getEmail();

    /**
     * @param $email
     * @return mixed
     */
    public function setEmail($email);

    /**
     * @return mixed
     */
    public function getDob();

    /**
     * @param $dob
     * @return mixed
     */
    public function setDob($dob);

}
