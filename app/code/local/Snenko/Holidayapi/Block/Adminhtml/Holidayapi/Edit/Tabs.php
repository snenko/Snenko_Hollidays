<?php
class Snenko_Holidayapi_Block_Adminhtml_Holidayapi_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("holidayapi_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("holidayapi")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("holidayapi")->__("Item Information"),
				"title" => Mage::helper("holidayapi")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("holidayapi/adminhtml_holidayapi_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
