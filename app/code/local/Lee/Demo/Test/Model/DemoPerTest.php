<?php

/**
 * @group  Lee_Demo
 *
 * @author Lee Saferite <lee.saferite@aoe.com>
 */
class Lee_Demo_Test_Model_DemoPerTest extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @test
     * @dataProvider dataProvider
     * @loadFixture demo1
     */
    public function demo1($widgetId, array $doodadIds)
    {
        $this->demo($widgetId, $doodadIds);
    }

    /**
     * @test
     * @dataProvider dataProvider
     * @loadFixture demo2
     */
    public function demo2($widgetId, array $doodadIds)
    {
        $this->demo($widgetId, $doodadIds);
    }

    /**
     * @test
     * @dataProvider dataProvider
     * @loadFixture demo3
     */
    public function demo3($widgetId, array $doodadIds)
    {
        $this->demo($widgetId, $doodadIds);
    }

    protected function demo($widgetId, array $doodadIds)
    {
        $widgetId = intval($widgetId);
        $this->assertGreaterThan(0, $widgetId, 'Invalid widget ID');

        $doodadIds = array_filter(array_map('intval', $doodadIds));
        foreach ($doodadIds as $doodadId) {
            $this->assertGreaterThan(0, $doodadId, 'Invalid doodad ID');
        }

        /** @var Lee_Demo_Model_Widget $widget */
        $widget = Mage::getModel('Lee_Demo/Widget')->load($widgetId);
        $this->assertEquals($widgetId, intval($widget->getId()), 'Could not load widget');

        $foundIds = array();
        foreach ($widget->getDoodads() as $doodad) {
            /** @var Lee_Demo_Model_Doodad $doodad */
            $doodadId = intval($doodad->getId());
            $this->assertContains($doodadId, $doodadIds, 'Doodad not in expected list');
            $foundIds[] = $doodadId;
        }

        $notFoundDoodadIds = array_diff($doodadIds, $foundIds);
        $this->assertEmpty($notFoundDoodadIds, 'Widget has more doodads than expected');
    }

}
