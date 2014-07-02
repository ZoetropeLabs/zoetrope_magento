<?php
$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

$installer->startSetup();

$setup->addAttributeGroup('catalog_product', 'Default', 'Zoetrope Engage Image Viewer', 2000);
$setup->addAttribute('catalog_product', 'zoetrope_id', array(
    'group'         => 'Zoetrope Engage Image Viewer',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Image ID',
    'backend'       => '',
    'visible'       => 0,
    'required'      => 0,
    'user_defined'  => 1,
    'searchable'    => 0,
    'filterable'    => 0,
    'comparable'    =>0,
    'visible_on_front' => 0,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$setup->addAttribute('catalog_product', 'zoetrope_starting_pos', array(
    'group'         => 'Zoetrope Engage Image Viewer',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Starting Position',
    'backend'       => '',
    'visible'       => 0,
    'required'      => 0,
    'user_defined'  => 1,
    'searchable'    => 0,
    'filterable'    => 0,
    'comparable'    => 0,
    'visible_on_front' => 0,
    'visible_in_advanced_search'  => 0,
    'is_html_allowed_on_front' => 0,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));
 
$installer->endSetup();
