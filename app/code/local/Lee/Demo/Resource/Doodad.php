<?php

/**
 * @author Lee Saferite <lee.saferite@aoe.com>
 */
class Lee_Demo_Resource_Doodad extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('Lee_Demo/Doodad', 'id');
    }
}
