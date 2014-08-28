<?php

/**
 * @group  Lee_Demo
 *
 * @author Lee Saferite <lee.saferite@aoe.com>
 */
class Lee_Demo_Test_Model_SanityCheck extends EcomDev_PHPUnit_Test_Case
{
    /**
     * Check object instances are of the correct class
     *
     * @test
     * @dataProvider dataProvider
     */
    public function checkObjectClass($modelString, $modelClass, $resourceClass, $collectionClass)
    {
        /** @var $model Mage_Core_Model_Abstract */
        $model = Mage::getModel($modelString);
        $this->assertInstanceOf($modelClass, $model);

        /** @var $resource Mage_Core_Model_Resource_Db_Abstract */
        $resource = $model->getResource();
        $this->assertInstanceOf($resourceClass, $resource);

        /** @var $collection Mage_Core_Model_Resource_Db_Collection_Abstract */
        $collection = $model->getResourceCollection();
        $this->assertInstanceOf($collectionClass, $collection);
    }

    /**
     * Check entity table name is correct
     *
     * @test
     * @dataProvider dataProvider
     */
    public function checkEntityTableName($modelString, $entityTableName)
    {
        $tablePrefix = (string)Mage::getConfig()->getTablePrefix();
        $entityTableName = $tablePrefix . $entityTableName;

        $entityResource = Mage::getModel($modelString)->getResource();
        $this->assertEquals($entityTableName, $entityResource->getMainTable());
    }
}
