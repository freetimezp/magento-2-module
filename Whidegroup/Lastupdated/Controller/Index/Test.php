<?php

namespace Whidegroup\Lastupdated\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{
	public function execute()
	{
		$textDisplay = new \Magento\Framework\DataObject(array('text' => 'Whidegroup'));
		$this->_eventManager->dispatch('Whidegroup_Lastupdated_display_text', ['mp_text' => $textDisplay]);
		echo $textDisplay->getText();
		exit;
	}
}