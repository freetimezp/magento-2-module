<?php 

namespace Whidegroup\Lastupdated\Setup;

use Magento\Catalog\Setup\CategorySetup;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;

$categorySetup = $this->categorySetupFactory->create(['setup' => $this->moduleDataSetup]);

$attributeSetId = $categorySetup->getDefaultAttributeSetId(\Magento\Catalog\Model\Product::ENTITY);
$categorySetup->addAttributeGroup(
    \Magento\Catalog\Model\Product::ENTITY,
    $attributeSetId,
    'Last updated',
    115
);

$categorySetup->addAttribute(
    \Magento\Catalog\Model\Product::ENTITY,
    'last_updated',
    [
        'type' => 'text',
        'label' => 'Last updated',
        'input' => 'textarea',
        'source' => \Magento\Catalog\Model\Product\Attribute\Source\Layout::class,
        'required' => false,
        'sort_order' => 10,
        'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
        'group' => 'Content',
        'is_used_in_grid' => true,
        'is_visible_in_grid' => false,
        'is_filterable_in_grid' => false,
        'is_visible_on_front' => true,
        'default' => 'Hello World'
    ]
);
