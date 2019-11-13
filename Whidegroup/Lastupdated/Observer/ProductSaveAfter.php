<?php

namespace Whidegroup\Lastupdated\Observer;

use Magento\Framework\Event\ObserverInterface;

class ProductSaveAfter implements ObserverInterface
{
  public function execute(\Magento\Framework\Event\Observer $observer)
    {
      $product = $observer->getProduct();

      //$sku = $product->getSku();
      //$id = $product->getId();
      //$name = $product->getName();

      $attr = $product->getResource()->getAttribute('lastupdated');

      if ($attr->usesSource()) {
 
        	$avid = $attr->getSource()->getOptionId('new value lastupdated');

          $product->setData('lastupdated', $avid);
          $product->save();
       }
      //$product->set[AttributeName]('[needed text]')->save();
    }
}




