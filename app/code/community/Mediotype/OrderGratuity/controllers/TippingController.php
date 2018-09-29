<?php
class Mediotype_OrderGratuity_TippingController extends Mage_Core_Controller_Front_Action
{

    public function _construct(){
        if(!Mage::helper('mediotype_tipping')->isEnabled()){
            $this->_redirect('noroute');
        }
    }

    public function addTipAction()
    {
        $url = $this->getRequest()->getParam('redirect_url', false);
        $tip = $this->getRequest()->getParam('tip', false);

        if($tip){
            Mage::getSingleton('checkout/session')->setTipAmount($tip);
        }

        //if empty or zero, reset tip
        if($tip == '0') {
            Mage::getSingleton('checkout/session')->setTipAmount(0);
        }

        /** @var $helper Mediotype_OrderGratuity_Helper_Data */
        $helper = Mage::helper('mediotype_tipping');
        if($helper->getUseAjax()){
            Mage::getSingleton('checkout/type_onepage')->getQuote()->collectTotals()->save();
            $block = $this->getLayout()->createBlock('checkout/cart_totals')->setTemplate('checkout/cart/totals.phtml');
            $this->getResponse()->setBody($block->toHtml());
            return;
        }

        if($url){
            $this->_redirectUrl($url);
            return;
        }

        $this->_redirect('checkout/cart');
    }

    public function ajaxTipAction()
    {
        $tip = $this->getRequest()->getParam('tip');
        if($tip){
            Mage::getSingleton('checkout/session')->setTipAmount($tip);
            Mage::getSingleton('checkout/type_onepage')->getQuote()->collectTotals()->save();
        }
        //if empty or zero, reset tip
        if($tip == '0') {
            Mage::getSingleton('checkout/session')->setTipAmount(0);
            Mage::getSingleton('checkout/type_onepage')->getQuote()->collectTotals()->save();
        }
        return;
    }

    /**
     * Get checkout session model instance
     *
     * @return Mage_Checkout_Model_Session
     */
    protected function _getSession()
    {
        return Mage::getSingleton('checkout/session');
    }
}
