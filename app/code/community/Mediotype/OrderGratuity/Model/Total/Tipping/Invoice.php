<?php
/**
 * @author      Joel Hart
 *
 * Class Mediotype_OrderGratuity_Model_Total_Tipping_Invoice
 */
class Mediotype_OrderGratuity_Model_Total_Tipping_Invoice extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    protected $_tipAmount; // numeric ammount to tip

    protected $code = "tip_amount";

    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        $order  = $invoice->getOrder();
        $amount = $order->getTipAmount();
        if ($amount) {
            $invoice->setGrandTotal($invoice->getGrandTotal() + $amount);
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $amount);
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
