<?php

namespace Whidegroup\Lastupdated\Observer;

use Magento\Framework\Event\ObserverInterface;

class LastupdateDateProduct implements ObserverInterface
{
    /**
     * @var ObjectManagerInterface
     */
    protected $_objectManager;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager
    ) {
        $this->_objectManager = $objectManager;
    }

    /**
     * customer register event handler
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        //Do your stuff here!
        die('Observer Is called!');
    }
}

