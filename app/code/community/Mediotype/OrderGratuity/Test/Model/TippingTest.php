<?php
/**
 *
 * @author      Joel Hart
 */
class Mediotype_OrderGratuity_Test_Model_TippingTest extends EcomDev_PHPUnit_Test_Case{

    protected $tipModel;

    public function setUp(){
        $this->tipModel = Mage::getModel('mediotype_tipping/total_tipping_quote');
    }



    /**
     *
     * @return mixed
     */
    public function testHelper(){
        $helper = Mage::helper('mediotype_tipping');

        $this->assertInstanceOf('Mediotype_OrderGratuity_Helper_Data', $helper);

        $reflectionHelper = new ReflectionClass(get_class($helper));
        $this->assertEquals($reflectionHelper->getConstant('CONFIG_PATH_ACTIVE'), 'tipping_config/general/active');

        return $helper;
    }

    /**
     * Get Subtotal label
     * @param $helper Mediotype_OrderGratuity_Helper_Data
     *
     * @group ordergratuity
     * @depends testHelper
     */
    public function subtotalLabelTest($helper)
    {
        $this->assertNotEmpty($helper->getSubtotalLabel());
    }


    public function tearDown(){
        if( method_exists($this->tipModel, 'getId') && $this->tipModel->getId()){
            $this->tipModel->delete();
        }
        unset($this->tipModel);
    }

}
