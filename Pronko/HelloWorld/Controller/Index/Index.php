<?php

namespace Pronko\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
// use Magento\Framework\Controller\ResultFactory;

class Index extends Action implements HttpGetActionInterface
{
	public function execute()
	{
		echo 'Hello world!!!';
		// return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
	}
}