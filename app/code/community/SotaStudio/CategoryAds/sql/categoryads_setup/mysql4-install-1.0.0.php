<?php

/**
 * Init and start setup
 */

$installer = $this;
$installer->startSetup();


/**
 * Configuration
 */

# Get Entity Type Id fot catalog categories
# Alternative: directly use Mage_Catalog_Model_Category::ENTITY instead of resolved $catalogEntityTypeId.
$catalogEntityTypeId = $installer->getEntityTypeId('catalog_category');

# Group definition for this module
$adAttributeGroup = 'Advertisement';

# Add Group for Advertisment fields
$installer->addAttributeGroup($catalogEntityTypeId, 'Default', $adAttributeGroup , 100);
# Add necessary fields into Advertisment group

# Attribute default config - every property can be overridden
$defaultAttributeConfig = array(
	'type' 		=> 'varchar',
	'backend'	=> null,
	'visible' 	=> true,
	'required' 	=> false,
	'user_defined' 	=> false,
	'used_in_product_listing' => true,
	'group' 	=> $adAttributeGroup,
	'global' 	=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
	//'default' 	=> Module_Catalog_Model_Category_Attribute_Myattribute::DEFAULT_Groupname,
);


/**
 * Attribute definitions
 */

$installer->removeAttribute($catalogEntityTypeId, 'category_ad_image');
$installer->removeAttribute($catalogEntityTypeId, 'category_ad_url');
$installer->removeAttribute($catalogEntityTypeId, 'category_ad_urltarget');
$installer->removeAttribute($catalogEntityTypeId, 'category_ad_titletext');
$installer->removeAttribute($catalogEntityTypeId, 'category_ad_alttext');

$installer->addAttribute(
	$catalogEntityTypeId,
	'category_ad_image',
	array_merge($defaultAttributeConfig, array(
		'label' 	=> 'Image',
		'input' 	=> 'image',
		'backend'	=> 'catalog/category_attribute_backend_image',
		'sort'		=> 10,
	))
);

$installer->addAttribute(
	$catalogEntityTypeId,
	'category_ad_url',
	array_merge($defaultAttributeConfig, array(
		'label' 	=> 'URL',
		'input' 	=> 'text',
		'sort'		=> 20,
	))
);

$installer->addAttribute(
	$catalogEntityTypeId,
	'category_ad_urltarget',
	array_merge($defaultAttributeConfig, array(
		'label' 	=> 'URL Target',
		'input' 	=> 'select',
		'backend'	=> 'eav/entity_attribute_backend_array',
		'sort'		=> 30,
		'option'	=> array (
			'value' => array(
				'_blank' => array('_blank'),
				'_self' => array('_self')
			)
		)
	))
);

$installer->addAttribute(
	$catalogEntityTypeId,
	'category_ad_titletext',
	array_merge($defaultAttributeConfig, array(
		'label' 	=> 'Title Text',
		'input' 	=> 'text',
		'sort'		=> 40,
	))
);

$installer->addAttribute(
	$catalogEntityTypeId,
	'category_ad_alttext',
	array_merge($defaultAttributeConfig, array(
		'label' 	=> 'Alternative Text',
		'input' 	=> 'text',
		'sort'		=> 50,
	))
);


/**
 * Misc
 */

# An example on how to update attribs
//$installer->updateAttribute($catalogEntityTypeId, 'category_ad_image', 'property', 'value');

# An example on how to remove attribs
//$installer->removeAttribute($catalogEntityTypeId, 'category_ad_image');
//$installer->removeAttribute($catalogEntityTypeId, 'category_ad_url');
//$installer->removeAttribute($catalogEntityTypeId, 'category_ad_urltarget');
//$installer->removeAttribute($catalogEntityTypeId, 'category_ad_titletext');
//$installer->removeAttribute($catalogEntityTypeId, 'category_ad_alttext');


/**
 * End setup
 */

$installer->endSetup();