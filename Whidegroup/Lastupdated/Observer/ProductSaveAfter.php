<?php

namespace Whidegroup\Lastupdated\Observer;

use Magento\Framework\Event\ObserverInterface;

class ProductSaveAfter implements ObserverInterface
{
  public function execute(\Magento\Framework\Event\Observer $observer)
   {
        $timezone = date_default_timezone_get();
        $date_today = date("d/m/Y H:i:s ");
        $newValue = $date_today . $timezone;

        $product = $observer->getProduct();

        $oldValue = $product->getLastupdated();
        $product->setLastupdated($newValue);
        $product->getResource()->saveAttribute($product, 'lastupdated');


        // $product = $observer->getProduct();
        // $orgprice = $product->getPrice();
        // $specialprice = $product->getSpecialPrice();
        // $product->setDiscount($orgprice - $specialprice);
        // $product->getResource()->saveAttribute($product, 'discount');

   } 

  // public function execute(\Magento\Framework\Event\Observer $observer)
    // {
    //   $product = $observer->getProduct();

    //   //$sku = $product->getSku();
    //   //$id = $product->getId();
    //   //$name = $product->getName();

    //   $attr = $product->getResource()->getAttribute('lastupdated');

    //   if ($attr->usesSource()) {
 
    //     	$avid = $attr->getSource()->getOptionId('new value lastupdated');

    //       $product->setData('lastupdated', $avid);
    //       $product->save();
    //    }
    //   //$product->set[AttributeName]('[needed text]')->save();
    //   //$product->set['lastupdated']('[new value lastupdated]')->save();
    // }


}




