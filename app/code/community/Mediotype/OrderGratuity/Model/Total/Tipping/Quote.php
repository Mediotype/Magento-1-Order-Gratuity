<?php
/**
 * Class Mediotype_OrderGratuity_Model_Total_Tipping_Quote
 */
class Mediotype_OrderGratuity_Model_Total_Tipping_Quote extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    protected $_tipAmount; // numeric ammount to tip

    /**
     * Use of __construct as total abstract does not follow normal _construct Magento pattern
     */
    public function __construct()
    {
        $this->setCode('tip_amount');
    }

    /**
     * Collect total for tipping method
     *
     * @param Mage_Sales_Model_Quote_Address $address
     *
     * @return $this|Mage_Sales_Model_Quote_Address_Total_Abstract
     */
    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);

        $amount = Mage::getSingleton('checkout/session')->getTipAmount();

        if ($address->getAddressType() != 'billing'){
            if($amount){
                $address->setTipAmount($amount);
                $this->_addAmount($amount);
                $this->_addBaseAmount($amount);
            }
            return $this;
        }

        if($amount){
            $address->setTipAmount($amount);
        }

        return $this;
    }

    /**
     *
     *
     * @param Mage_Sales_Model_Quote_Address $address
     *
     * @return $this|array
     */
    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        if ($address->getAddressType() != 'billing'){
            $amount = $address->getTipAmount();
            if($amount > 0){
                $address->addTotal(array(
                        'code'  => $this->getCode(),
                        'title' => Mage::helper('sales')->__('Tip Amount'),
                        'value' => $amount,
                    ));
            }

            return $this;
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
