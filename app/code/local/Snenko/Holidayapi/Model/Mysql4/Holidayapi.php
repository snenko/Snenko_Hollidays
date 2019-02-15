<?php
class Snenko_Holidayapi_Model_Mysql4_Holidayapi extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("holidayapi/holidayapi", "id");
    }
}