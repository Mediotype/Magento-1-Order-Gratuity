<?php

class Mediotype_OrderGratuity_Block_Tip extends Mage_Sales_Block_Order_Totals
{

    public function initTotals()
    {
        $order = $this->getParentBlock()->getOrder();
        if($order->getTipAmount() > 0){
            $this->getParentBlock()->addTotalBefore(new Varien_Object(array(
                    'code'       => 'tip_amount',
                    'value'      => $order->getTipAmount(),
                    'base_value' => $order->getTipAmount(),
                    'label'      => Mage::helper('mediotype_tipping')->__(Mage::getStoreConfig(Mediotype_OrderGratuity_Helper_Data::CONFIG_PATH_SUBTOTAL_LABEL))
                )), 'grand_total');
        }
    }

}
