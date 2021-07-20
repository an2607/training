<?php
/**
 * Copyright © NinePoints Co., Ltd All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Vnext\Training\Model\ResourceModel;


class Training extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('training_test', 'training_id');
    }

}
