<?php
/**
 * Class Mediotype_OrderGratuity_Block_Checkout_Onepage_Review_Button
 *
 * @author  Joel Hart
 */
class Mediotype_OrderGratuity_Block_Checkout_Onepage_Review_Button extends Mage_Core_Block_Template
{
    /**
     * Returns submit url
     * @return string
     */
    public function getTipSubmitUrl(){
        return Mage::helper('mediotype_tipping')->getTipSubmitUrl();
    }

    /**
     * @return mixed Label For Tip Input Field
     */
    public function getTippingLabel(){
        return Mage::getStoreConfig(Mediotype_OrderGratuity_Helper_Data::CONFIG_PATH_LABEL);
    }

    /**
     * Show Extra Note Flag
     * @returns bool
     */
    public function getShowNote(){
        return (bool)Mage::getStoreConfig(Mediotype_OrderGratuity_Helper_Data::CONFIG_PATH_SHOW_NOTE);
    }

    /**
     * @return bool
     */
    public function isTipRequired(){
        return (bool)Mage::getStoreConfig(Mediotype_OrderGratuity_Helper_Data::CONFIG_PATH_REQUIRE_TIP);
    }

    /**
     * @return mixed Extra message below tip input field
     */
    public function getTippingNote(){
        return Mage::getStoreConfig(Mediotype_OrderGratuity_Helper_Data::CONFIG_PATH_TIPPING_NOTE);
    }

}
