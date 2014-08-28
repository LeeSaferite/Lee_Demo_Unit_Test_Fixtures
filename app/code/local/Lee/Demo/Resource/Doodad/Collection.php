<?php

/**
 * @author Lee Saferite <lee.saferite@aoe.com>
 * @since  2014-07-15
 *
 * @method Lee_Demo_Resource_Doodad getResource()
 * @method Lee_Demo_Model_Doodad getNewEmptyItem()
 * @method Lee_Demo_Resource_Doodad_Collection load(bool $printQuery = false, bool $logQuery = false)
 */
class Lee_Demo_Resource_Doodad_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Name prefix of events that are dispatched by model
     *
     * @var string
     */
    protected $_eventPrefix = 'lee_demo_doodad_collection';

    /**
     * Name of event parameter
     *
     * @var string
     */
    protected $_eventObject = 'collection';

    /**
     * Configure Collection
     */
    protected function _construct()
    {
        parent::_construct();

        $this->_init('Lee_Demo/Doodad');
    }
}
