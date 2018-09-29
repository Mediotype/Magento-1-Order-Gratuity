<?php
/**
 * Class Mediotype_OrderGratuity_Block_Checkout_Onepage_Link
 * @author Joel Hart
 */
class Mediotype_OrderGratuity_Block_Checkout_Onepage_Link extends Mage_Checkout_Block_Onepage_Link
{
    /**
     * Returns submit url
     * @return string
     */
    public function getTipSubmitUrl(){
        return Mage::helper('mediotype_tipping')->getTipSubmitUrl();
    }

    /**
     * Returns use ajax, used by template & controller to determine strategy
     * @return bool
     */
    public function getUseAjax(){
        return (bool)Mage::getStoreConfig(Mediotype_OrderGratuity_Helper_Data::CONFIG_PATH_USE_AJAX);
    }
    /**
     * @return mixed Label For Tip Input Field
     */
    public function getTippingLabelHtml(){
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
    public function getTippingNoteHtml(){
        return Mage::getStoreConfig(Mediotype_OrderGratuity_Helper_Data::CONFIG_PATH_TIPPING_NOTE);
    }

}
