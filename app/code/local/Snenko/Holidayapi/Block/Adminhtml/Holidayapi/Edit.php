<?php
	
class Snenko_Holidayapi_Block_Adminhtml_Holidayapi_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "id";
				$this->_blockGroup = "holidayapi";
				$this->_controller = "adminhtml_holidayapi";
				$this->_updateButton("save", "label", Mage::helper("holidayapi")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("holidayapi")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("holidayapi")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("holidayapi_data") && Mage::registry("holidayapi_data")->getId() ){

				    return Mage::helper("holidayapi")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("holidayapi_data")->getId()));

				} 
				else{

				     return Mage::helper("holidayapi")->__("Add Item");

				}
		}
}