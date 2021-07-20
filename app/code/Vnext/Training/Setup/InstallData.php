<?php

namespace Vnext\Training\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $date;

    public function __construct(
        \Magento\Framework\Stdlib\DateTime\DateTime $date
    ) {
        $this->date = $date;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $dataSeen = [
            [
                'name' => 'An',
                'gender' => 'Nam',
                'address' => 'Ninh binh',
                'dob' => '1999/02/01',
                'email' => 'tranan2607@gmail.com',
                'slug' => 'an-49',
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ],
            [
                'name' => 'Nam',
                'gender' => 'Nam',
                'address' => 'Ha Noi',
                'dob' => '1997/03/04',
                'email' => 'tranan26077@gmail.com',
                'slug' => 'nam-50',
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ],
            [
                'name' => 'Nữ',
                'gender' => 'Nữ',
                'address' => 'Ha Noi',
                'dob' => '1996/05/06',
                'email' => 'tranan26078@gmail.com',
                'slug' => 'nu-51',
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ],
            [
                'name' => 'Long',
                'gender' => 'Nam',
                'address' => 'Ha Noi',
                'dob' => '2021/04/09',
                'email' => 'tranan26079@gmail.com',
                'slug' => 'long-52',
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ],
            [
                'name' => 'Ha',
                'gender' => 'Nam',
                'address' => 'Hai Phong',
                'dob' => '2012/09/08',
                'email' => 'tranan26070@gmail.com',
                'slug' => 'ha-53',
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ],
            [
                'name' => 'Canh',
                'gender' => 'Nam',
                'address' => 'Ninh Thuan',
                'dob' => '2015/10/06',
                'email' => 'tranan26017@gmail.com',
                'slug' => 'canh-54',
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ],
            [
                'name' => 'Lan',
                'gender' => 'Nữ',
                'address' => 'Ha noi',
                'dob' => '2020/09/03',
                'email' => 'tranan26027@gmail.com',
                'slug' => 'lan-55',
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ],
            [
                'name' => 'Vinh',
                'gender' => 'Nam',
                'address' => 'Ha noi',
                'dob' => '2001/06/01',
                'email' => 'tranan2607@gmail.com',
                'slug' => 'vinh-56',
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ],
            [
                'name' => 'An',
                'gender' => 'Nam',
                'address' => 'Ha noi',
                'dob' => '2021/10/10',
                'email' => 'tranan2607@gmail.com',
                'slug' => 'an-57',
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ],
            [
                'name' => 't1et',
                'gender' => 'Nam',
                'address' => 'Ninh binh',
                'dob' => '2002/04/01',
                'email' => 'tranan2607@gmail.com',
                'slug' => 't1et-58',
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ],
            [
                'name' => 'CB',
                'gender' => 'Nam',
                'address' => 'Ha noi',
                'dob' => '2020/11/11',
                'email' => 'tranan2607@gmail.com',
                'slug' => 'cb-59',
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ],
            [
                'name' => 'Co',
                'gender' => 'Nam',
                'address' => 'Ha noi',
                'dob' => '2021/02/08',
                'email' => 'tranan2607@gmail.com',
                'slug' => 'co-60',
                'updated_at' => $this->date->date(),
                'created_at' => $this->date->date()
            ],
        ];

        foreach($dataSeen as $data) {
            $setup->getConnection()->insert($setup->getTable('student'), $data);
        }
    }
}
?>
