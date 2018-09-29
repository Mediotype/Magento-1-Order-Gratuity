<?php

/**
 *
 * @author      Joel Hart
 */
class Mediotype_OrderGratuity_Model_Total_Tipping_Creditmemo extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{

    protected $_tipAmount; // numeric ammount to tip

    /**
     * Use of __construct as total abstract does not follow normal _construct Magento pattern
     */
    public function __construct()
    {
        $this->setCode('tip_amount');
    }


    public function collect(Mage_Sales_Model_Order_Creditmemo $creditMemo)
    {
        $order = $creditMemo->getOrder();
        $amount = $order->getTipAmount();
        if ($amount) {
            $creditMemo->setGrandTotal($creditMemo->getGrandTotal() + $amount);
            $creditMemo->setBaseGrandTotal($creditMemo->getBaseGrandTotal() + $amount);
        }

        return $this;
    }

    /**
     * Get Subtotal label
     *
     * @return string
     */
    public function getLabel()
    {
        return Mage::helper('mediotype_tipping')->__(
            Mage::getStoreConfig(Mediotype_OrderGratuity_Helper_Data::CONFIG_PATH_SUBTOTAL_LABEL)
        );
    }
}
