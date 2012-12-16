<?php

$installer = $this;
$installer->startSetup();
$installer->addAttribute(Mage_Catalog_Model_Category::ENTITY, 'category_ad', array(
	'label' 	=> 'Category Ad',
	'input' 	=> 'image',
	'type' 		=> 'varchar',
	'backend'	=> 'catalog/category_attribute_backend_image',
	'global' 	=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
	'visible' 	=> true,
	'required' 	=> false,
	'user_defined' 	=> false,
	'used_in_product_listing' => true,
	'group' 	=> 'General',
	//'default' 	=> Module_Catalog_Model_Category_Attribute_Myattribute::DEFAULT_Groupname,
));
$installer->endSetup();