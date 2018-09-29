<?php
/**
 * Magento / Mediotype Module
 *
 *
 * @desc
 * @category    Mediotype
 * @package
 * @class
 * @copyright   Copyright (c) 2013 Mediotype (http://www.mediotype.com)
 *              Copyright, 2013, Mediotype, LLC - US license
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author      Mediotype (SZ,JH) <diveinto@mediotype.com>
 */

class Mediotype_OrderGratuity_Block_Adminhtml_Sales_Creditmemo_Totals extends Mage_Adminhtml_Block_Sales_Order_Creditmemo_Totals {

    protected function _initTotals()
    {
        parent::_initTotals();
        $this->_totals['tip_amount'] = new Varien_Object(array(
            'code'      => 'tip_amount',
            'strong'    => true,
            'value'     => $this->getSource()->getTipAmount(),
            'label'     => $this->helper('sales')->__('Tip Amount'),
            'area'      => 'footer'
        ));

        return $this;
     }

}
