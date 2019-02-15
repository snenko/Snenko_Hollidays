<?php


class Snenko_Holidayapi_Block_Adminhtml_Holidayapi extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_holidayapi";
	$this->_blockGroup = "holidayapi";
	$this->_headerText = Mage::helper("holidayapi")->__("Holidayapi Manager");
	$this->_addButtonLabel = Mage::helper("holidayapi")->__("Add New Item");
	parent::__construct();
	
	}

}