<?php
class Mediotype_OrderGratuity_Test_Model_ConfigurationTest extends EcomDev_PHPUnit_Test_Case_Config{

    /**
     * @test
     * @group ordergratuity
     * @return Mediotype_OrderGratuity_Helper_Data
     */
    public function testHelper(){
        $helper = Mage::helper('mediotype_tipping');

        $this->assertInstanceOf('Mediotype_OrderGratuity_Helper_Data', $helper);

        $reflectionHelper = new ReflectionClass(get_class($helper));
        $this->assertEquals($reflectionHelper->getConstant('CONFIG_PATH_ACTIVE'), 'tipping_config/general/active');

        return $helper;
    }

    /**
     *
     */
    public function modelAliasTest(){
        $this->assertModelAlias('mediotype_tipping/total_tipping_quote', 'Mediotype_OrderGratuity_Model_Total_Tipping_Quote');

    }

    /**
     *
     */
    public function helperAliasTest(){
        $this->assertHelperAlias('mediotype_tipping', 'Mediotype_OrderGratuity_Helper_Data');
    }

    /**
     * @test
     * @param $helper Mediotype_OrderGratuity_Helper_Data
     * @depends testHelper
     * @group ordergratuity
     */
    public function configurationTest($helper)
    {
        $reflectionHelper = new ReflectionClass(get_class($helper));
        $this->assertEquals($reflectionHelper->getConstant('CONFIG_PATH_REQUIRE_TIP'),'tipping_config/general/require_tip');
        $this->assertEquals($reflectionHelper->getConstant('CONFIG_PATH_LABEL'),'tipping_config/general/label');
        $this->assertEquals($reflectionHelper->getConstant('CONFIG_PATH_SHOW_NOTE'),'tipping_config/general/show_note');
        $this->assertEquals($reflectionHelper->getConstant('CONFIG_PATH_TIPPING_NOTE'),'tipping_config/general/tipping_note');
        $this->assertEquals($reflectionHelper->getConstant('CONFIG_PATH_SUBTOTAL_LABEL'),'tipping_config/general/subtotal_label');
        $this->assertEquals($reflectionHelper->getConstant('CONFIG_PATH_USE_AJAX'),'tipping_config/general/use_ajax');
    }

    /**
     * @test
     * @param $helper Mediotype_OrderGratuity_Helper_Data
     * @depends testHelper
     * @depends configurationTest
     * @group ordergratuity
     */
    public function configValuesTest($helper)
    {
        //        $this->assertConfigNodeValue('node/path',expectedvalue)
        $this->assertTrue($helper->getUseAjax());
        $this->assertTrue($helper->getShowNote());
        $this->assertFalse($helper->getIsTipRequired());
        $this->assertNotEmpty($helper->getTippingNote());
        $this->assertNotEmpty($helper->getSubtotalLabel());
    }

}