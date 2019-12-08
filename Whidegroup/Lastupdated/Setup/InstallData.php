<?php 

namespace Whidegroup\Lastupdated\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

use Magento\Cms\Model\Page;
use Magento\Cms\Model\PageFactory;

use Magento\Cms\Model\BlockFactory;
use Magento\Cms\Model\BlockRepository;

class InstallData implements InstallDataInterface
{
    const CUSTOM_ATTRIBUTE_CODE = 'lastupdated';
    private $eavSetupFactory;

				protected $blockFactory;
				protected $blockRepository;

    public function __construct(
     EavSetupFactory $eavSetupFactory,
     PageFactory $resultPageFactory,
     \Magento\Cms\Model\BlockFactory $blockFactory,
     \Magento\Cms\Model\BlockRepository $blockRepository
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->blockFactory = $blockFactory;
        $this->blockRepository = $blockRepository;
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
                'group' => 'General', // product attribute assigned to all attribute set
                'backend'  => '',
                'frontend'  => '',
                'default' => 'some default value',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'user_defined' => true,
                'system' => false
            ]
        );

    $data = [
				    'title' => 'Test block title',
				    'identifier' => 'test-block',
				    'stores' => ['0'],
				    'is_active' => 1,
				    'content' => 'Test block content'
				];
				$newBlock = $this->blockFactory->create(['data' => $data]);
				$this->blockRepository->save($newBlock);

    }
}