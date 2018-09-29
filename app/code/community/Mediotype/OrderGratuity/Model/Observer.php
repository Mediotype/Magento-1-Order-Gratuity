<?php
/**
 * Class Mediotype_OrderGratuity_Model_Observer
 */
class Mediotype_OrderGratuity_Model_Observer{

    public function addScreenToPayPal($observer){
        $paypalCart = $observer->getPaypalCart();

        if ($paypalCart && $paypalCart->getSalesEntity()) {

            $salesEntity = $paypalCart->getSalesEntity();
            Mage::log(get_class($salesEntity));
            $amount = null;
            if ( is_object($salesEntity) && $salesEntity instanceof Mage_Sales_Model_Order){
                $amount = $salesEntity->getTipAmount();
            } else { // Mage_Sales_Model_Quote
                $salesEntity->getShippingAddress()->getTipAmount();
                return $observer;
            }

            if ($amount) {
                $paypalCart->addItem(
                    Mage::helper('mediotype_tipping')->__('Tip'),
                    1,
                    $amount,
                    'tip_amount'
                );
            }
        }

        return $observer;
    }

    public function clearTipAmount($observer)
    {
        Mage::getSingleton('checkout/session')->unsTipAmount();
    }
}
