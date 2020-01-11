<?php

namespace Yakov\CustomerStatus\Setup;

use Magento\Eav\Setup\EavSetup; 
use Magento\Eav\Setup\EavSetupFactory; 
use Magento\Framework\Setup\InstallDataInterface; 
use Magento\Framework\Setup\ModuleContextInterface; 
use Magento\Framework\Setup\ModuleDataSetupInterface; 
use Magento\Eav\Model\Config; 
use Magento\Customer\Model\Customer;

class InstallData implements InstallDataInterface {

    private $eavSetupFactory;

    public function __construct(
        EavSetupFactory $eavSetupFactory,
        Config $eavConfig
    ) {
        $this->eavSetupFactory = $eavSetupFactory; 
        $this->eavConfig = $eavConfig; 
    } 
    
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) { 
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]); 
        $eavSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'customer_status',
            [
                'type' => 'varchar',
                'label' => 'Customer Status',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'user_defined' => false,
                'position' => 999,
                'system' => 0,
            ]
        );

        $attribute = $this->eavConfig->getAttribute(Customer::ENTITY, 'customer_status'); 

        $attribute->setData(
            'used_in_forms',
            [
                'adminhtml_customer'
            ]
        );
        
        $attribute->save(); 
    } 
}