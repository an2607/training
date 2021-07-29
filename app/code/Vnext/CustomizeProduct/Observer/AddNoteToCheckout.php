<?php

namespace Vnext\CustomizeProduct\Observer;

class AddNoteToCheckout implements \Magento\Framework\Event\ObserverInterface
{
    protected $request;
    public function __construct(\Magento\Framework\App\RequestInterface $request)
    {
        $this->request = $request;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $requestContent = json_decode($this->request->getContent(), true);
        $order = $observer->getEvent()->getOrder();
        $order->setCustomerNoteNotify(0);

        if ($customerNote = $requestContent['paymentMethod']['extension_attributes']['customer_note'] ?? null) {
            $order->setData(
                'customer_note',
                $customerNote
            );
        }
    }
}
