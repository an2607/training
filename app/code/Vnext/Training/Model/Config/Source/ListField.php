<?php
namespace Vnext\Training\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
class ListField implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * {@inheritdoc}
     *
     * @codeCoverageIgnore
     */
    public function toOptionArray()
    {
        return [
            ['value' => '', 'label' => __('---Field---')],
            ['value' => 'entity_id', 'label' => __('Entity_ID')],
            ['value' => 'name', 'label' => __('NAME')],
            ['value' => 'dob', 'label' => __('DOB')],
        ];
    }
}


