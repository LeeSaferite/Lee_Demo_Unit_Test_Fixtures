<?php
/**
 * @author Lee Saferite <lee.saferite@aoe.com>
 * @var Mage_Core_Model_Resource_Setup $this
 */
// Start
$this->startSetup();

// Remove existing tables
$this->getConnection()->dropTable($this->getTable('Lee_Demo/Widget'));
$this->getConnection()->dropTable($this->getTable('Lee_Demo/Doodad'));

// Widget Table
$table = $this->getConnection()->newTable($this->getTable('Lee_Demo/Widget'));
$table->addColumn(
    'id',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    null,
    array(
        'identity' => true,
        'primary'  => true,
        'unsigned' => true,
        'nullable' => false,
    )
);
$table->addColumn(
    'name',
    Varien_Db_Ddl_Table::TYPE_TEXT,
    255,
    array(
        'nullable' => false,
    )
);
$this->getConnection()->createTable($table);

// Doodad Table
$table = $this->getConnection()->newTable($this->getTable('Lee_Demo/Doodad'));
$table->addColumn(
    'id',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    null,
    array(
        'identity' => true,
        'primary'  => true,
        'unsigned' => true,
        'nullable' => false,
    )
);
$table->addColumn(
    'name',
    Varien_Db_Ddl_Table::TYPE_TEXT,
    255,
    array(
        'nullable' => false,
    )
);
$table->addColumn(
    'widget_id',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    null,
    array(
        'unsigned' => true,
        'nullable' => true,
    )
);
$table->addColumn(
    'qty',
    Varien_Db_Ddl_Table::TYPE_DECIMAL,
    null,
    array(
        'precision' => 12,
        'scale'     => 4,
        'nullable'  => false,
    )
);
$table->addForeignKey(
    $this->getFkName('Lee_Demo/Doodad', 'widget_id', 'Lee_Demo/Widget', 'id'),
    'widget_id',
    $this->getTable('Lee_Demo/Widget'),
    'id',
    Varien_Db_Ddl_Table::ACTION_CASCADE,
    Varien_Db_Ddl_Table::ACTION_CASCADE
);
$this->getConnection()->createTable($table);

// Finish
$this->endSetup();
