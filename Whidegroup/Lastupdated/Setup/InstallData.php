<?php 

namespace Whidegroup\Lastupdated\Setup;

use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Model\Config;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements InstallDataInterface
{
	/*
	*** Attribute code for Custom Attribute
	*/
	const CUSTOM_ATTRIBUTE_CODE = 'lastupdated';

	/*
	*** @var EavSetup
	*/
	private $eavSetup;

 /*
	*** @var Config
	*/
	private $eavConfig;
	/*
	*** InstallData constructor
	*** @param EavSetup $eavSetup
	*** Config $config
	*/
	public function __construct(
		EavSetup $eavSetup,
  Config $config
	)	{
		$this->eavSetup = $eavSetup; 
		$this->eavConfig = $config;
	}

 public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) 
 {
 	$setup->startSetup();

 	$this->eavSetup->addAttribute(
 		AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
 		self::CUSTOM_ATTRIBUTE_CODE,
 		[
 			'label' => 'Lastupdated',
 			'input' => 'text',
 			'visible' => true,
 			'required' => false,
 			'position' => 150,
 			'sort_order' => 150,
 			'system' => false
 		]
 	);

 	$customAttribute = $this->eavConfig->getAttribute(
 		AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
 		self::CUSTOM_ATTRIBUTE_CODE
 	);

 	$customAttribute->setData(
 		'used_in_forms',
 		['adminhtml_customer_address', 'customer_address_edit', 'customer_register_address']
 	);

 	$customAttribute->save();

 	$setup->endSetup();
 }
}
