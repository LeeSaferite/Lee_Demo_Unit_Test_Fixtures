<?php

/**
 * @author Lee Saferite <lee.saferite@aoe.com>
 *
 * @method Lee_Demo_Model_Doodad load(mixed $id, string $field = null)
 * @method Lee_Demo_Resource_Doodad getResource()
 * @method Lee_Demo_Resource_Doodad_Collection getResourceCollection()
 * @method Lee_Demo_Resource_Doodad_Collection getCollection()
 */
class Lee_Demo_Model_Doodad extends Mage_Core_Model_Abstract
{
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'lee_demo_doodad';

    /**
     * Parameter name in event
     *
     * @var string
     */
    protected $_eventObject = 'doodad';

    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_setResourceModel('Lee_Demo/Doodad', 'Lee_Demo/Doodad_Collection');
    }
}
