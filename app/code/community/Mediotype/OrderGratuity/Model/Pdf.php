<?php

class Mediotype_OrderGratuity_Model_Pdf extends Mage_Sales_Model_Order_Pdf_Total_Default
{

    public function getTotalsForDisplay()
    {
        $amount = $this->getOrder()->getTipAmount();
        $fontSize = $this->getFontSize() ? $this->getFontSize() : 7;
        if(floatval($amount)){
            $amount = $this->getOrder()->formatPriceTxt($amount);
            if($this->getAmountPrefix()){
                $amount = $this->getAmountPrefix() . $amount;
            }
            $totals = array(
                array(
                    'label' => 'Tip Amount',
                    'amount' => $amount,
                    'font_size' => $fontSize,
                )
            );
            return $totals;
        }
    }

}
