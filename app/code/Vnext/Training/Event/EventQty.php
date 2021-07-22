<?php
namespace Vnext\Training\Event;

use Magento\Framework\Event\ManagerInterface as EventManager;

class EventQty
{
    /**
     * @var EventManager
     */
    private $eventManager;

    /*
     * @param \Magento\Framework\Event\ManagerInterface as EventManager
     */
    public function __construct(EventManager $eventManager)
    {
        $this->eventManager = $eventManager;
    }

    public function something()
    {
        $eventData = null;
        // Code...
        $this->eventManager->dispatch('my_module_event_before');
        // More code that sets $eventData...
        $this->eventManager->dispatch('sales_order_place_after', ['order' => $this]);
    }
}
