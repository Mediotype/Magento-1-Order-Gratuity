<?php
/**
 * @author Joel Hart
 */
class Mediotype_OrderGratuity_Helper_Data extends Mage_Core_Helper_Abstract {

    const CONFIG_PATH_ACTIVE            = "tipping_config/general/active";
    const CONFIG_PATH_REQUIRE_TIP       = "tipping_config/general/require_tip";
    const CONFIG_PATH_LABEL             = "tipping_config/general/label";
    const CONFIG_PATH_SHOW_NOTE         = "tipping_config/general/show_note";
    const CONFIG_PATH_TIPPING_NOTE      = "tipping_config/general/tipping_note";
    const CONFIG_PATH_SUBTOTAL_LABEL    = "tipping_config/general/subtotal_label";
    const CONFIG_PATH_USE_AJAX          = "tipping_config/general/use_ajax";

    /**
     * @return String | Null
     */
    public function getSubtotalLabel(){
        return (string)Mage::getStoreConfig(self::CONFIG_PATH_LABEL);
    }

    /**
     * @return bool check system config for if module is enabled
     */
    public function isEnabled(){
        return (bool)Mage::getStoreConfig(self::CONFIG_PATH_ACTIVE);
    }

    /**
     * Returns use ajax, used by template & controller to determine strategy
     * @return bool
     */
    public function getUseAjax(){
        return (bool)Mage::getStoreConfig(self::CONFIG_PATH_USE_AJAX);
    }

    /**
     * @return String | Null
     */
    public function getTippingNote(){
        return (string)Mage::getStoreConfig(self::CONFIG_PATH_TIPPING_NOTE);
    }

    /**
     * @return bool
     */
    public function getShowNote(){
        return (bool)Mage::getStoreConfig(self::CONFIG_PATH_SHOW_NOTE);
    }

    /**
     * @return bool
     */
    public function getIsTipRequired(){
        return (bool)Mage::getStoreConfig(self::CONFIG_PATH_REQUIRE_TIP);
    }

    /**
     * Returns ajax controller url or redirect controller url depending on sys config
     *
     * Default is ajax url
     * @return string
     */
    public function getTipSubmitUrl(){
        return Mage::getBaseUrl() . "tipping/tipping/addTip";
    }

    /**
     * Returns ajax controller url or redirect controller url depending on sys config
     *
     * Default is ajax url
     * @return string
     */
    public function getAjaxTipLink(){
        return Mage::getBaseUrl() . "tipping/tipping/ajaxTip";
    }

}
