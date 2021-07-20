<?php
namespace Vnext\Training\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;

class ListMode implements \Magento\Framework\Option\ArrayInterface
{
/**
* {@inheritdoc}
*
* @codeCoverageIgnore
*/
public function toOptionArray()
{
return [
['value' => 'asc', 'label' => __('Sort ASC')],
['value' => 'desc', 'label' => __('Sort DESC')],
];
}
}

