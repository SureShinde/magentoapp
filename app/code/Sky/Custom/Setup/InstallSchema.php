<?php
/**
 * Copyright © 2015 Sky. All rights reserved.
 */

namespace Sky\Custom\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
	
        $installer = $setup;

        $installer->startSetup();

		/**
         * Create table 'custom_custom'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('custom_custom')
        )
		->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'custom_custom'
        )
		->addColumn(
            'txtfirstname',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'txtFirstName'
        )
		->addColumn(
            'txtlastname',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'txtLastName'
        )
		->addColumn(
            'txtemail',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'txtEmail'
        )
		->addColumn(
            'txtpassword',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'txtPassword'
        )
		->addColumn(
            'txtrepeatpassword',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'txtRepeatPassword'
        )
		->addColumn(
            'txtorganization',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'txtOrganization'
        )
		->addColumn(
            'cbotipoempresa',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'cboTipoEmpresa'
        )
		->addColumn(
            'txtmobilephone',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'txtMobilePhone'
        )
		->addColumn(
            'txthomephone',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'txtHomePhone'
        )
		->addColumn(
            'txtworkphone',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'txtWorkPhone'
        )
		->addColumn(
            'txtfax',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'txtFax'
        )
		->addColumn(
            'cbocountry',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'cboCountry'
        )
		->addColumn(
            'txtzipcode',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'txtZipCode'
        )
		->addColumn(
            'cboregion',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'cboRegion'
        )
		->addColumn(
            'cbocity',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'cboCity'
        )
		->addColumn(
            'txtaddress',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'txtAddress'
        )
		->addColumn(
            'txtaddress2',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'txtAddress2'
        )
		->addColumn(
            'cbopaquetetmo',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'cboPaqueteTmo'
        )
		/*{{CedAddTableColumn}}}*/
		
		
        ->setComment(
            'Sky Custom custom_custom'
        );
		
		$installer->getConnection()->createTable($table);
		/*{{CedAddTable}}*/

        $installer->endSetup();

    }
}
