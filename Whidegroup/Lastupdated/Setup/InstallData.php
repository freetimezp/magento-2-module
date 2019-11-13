<?php 

namespace Whidegroup\Lastupdated\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements InstallDataInterface
{
    const CUSTOM_ATTRIBUTE_CODE = 'lastupdated';

    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) 
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            self::CUSTOM_ATTRIBUTE_CODE,
            [
                'type' => 'varchar',
                'label' => 'lastupdated',
                'input' => 'text',
                'visible' => true,
                'required' => false,
                'class' => '',
                'source' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'group' => 'General', // product attribute and assigned it all attribute set
                'backend'  => '',
                'frontend'  => '',
                'default' => 'some default value',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'user_defined' => true,
                'system' => false
            ]
        );

    }
}