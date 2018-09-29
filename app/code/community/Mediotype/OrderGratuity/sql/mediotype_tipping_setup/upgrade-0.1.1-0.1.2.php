<?php
/**
 *
 */
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$conn = $installer->getConnection();
$conn->addColumn($this->getTable('sales/invoice'), 'tip_amount', "decimal(12,4) not null DEFAULT '0.0000' COMMENT 'Tip Amount'");

$installer->endSetup();
