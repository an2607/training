<?php

namespace Vnext\Training\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\CatalogInventory\Model\StockManagementFactory;

class MyObserver implements ObserverInterface
{
    protected $orderFactory;
    protected $productFactory;
    protected $stockFactory;
    protected $stockRegistry;

    public function __construct(\Magento\Quote\Model\QuoteFactory $quoteFactory,
                                \Magento\Sales\Model\Order $orderFactory,
                                ProductFactory $productFactory,
                                StockManagementFactory $stockFactory,
                                \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry )
    {
        $this->orderFactory = $orderFactory;
        $this->productFactory = $productFactory;
        $this->stockFactory = $stockFactory;
        $this->stockRegistry = $stockRegistry;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        $order = $observer->getEvent()->getOrder();
        $orderId = $order->getIncrementId();
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/an.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info($orderId);
        $orderItems = $order->getAllItems();
//        $getName = $orderItems->getName();

        $itemProduct = $this->productFactory->create();

        foreach ($orderItems as $item){
            $logger->info($item->getName());
            $loadId = $item->getProduct()->getId();
            $sku = $item->getProduct()->getSku();
//            $loadItem = $itemProduct->load($loadId);
            $qty = 0;
            $stockItem = $this->stockRegistry->getStockItemBySku($sku);
            $stockItem->setQty($qty);
            $this->stockRegistry->updateStockItemBySku($sku, $stockItem);
        }
    }

}
