<?php

/**
 * @author Lee Saferite <lee.saferite@aoe.com>
 * @since  2014-07-15
 *
 * @method Lee_Demo_Model_Widget load(mixed $id, string $field = null)
 * @method Lee_Demo_Resource_Widget getResource()
 * @method Lee_Demo_Resource_Widget_Collection getResourceCollection()
 * @method Lee_Demo_Resource_Widget_Collection getCollection()
 */
class Lee_Demo_Model_Widget extends Mage_Core_Model_Abstract
{
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'lee_demo_widget';

    /**
     * Parameter name in event
     *
     * @var string
     */
    protected $_eventObject = 'widget';

    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_setResourceModel('Lee_Demo/Widget', 'Lee_Demo/Widget_Collection');
    }

    public function getDoodads()
    {
        return Mage::getSingleton('Lee_Demo/Doodad')->getCollection()->addFieldToFilter('widget_id', $this->getId());
    }
}
