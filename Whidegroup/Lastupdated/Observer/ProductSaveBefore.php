<?php

namespace Whidegroup\Lastupdated\Observer;

use Magento\Framework\Event\ObserverInterface;

class ProductSaveBefore implements ObserverInterface
{
  public function execute(\Magento\Framework\Event\Observer $observer)
    {
      $product = $observer->getProduct();
      $sku = $product->getSku();
      $id = $product->getId();
      $name = $product->getName();
    }

    
}




