<?php
class Snenko_Holidayapi_Block_Adminhtml_Holidayapi_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("holidayapi_form", array("legend"=>Mage::helper("holidayapi")->__("Item information")));

								
						 $fieldset->addField('country_id', 'select', array(
						'label'     => Mage::helper('holidayapi')->__('Country'),
						'values'   => Snenko_Holidayapi_Block_Adminhtml_Holidayapi_Grid::getValueArray0(),
						'name' => 'country_id',
						));
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("holidayapi")->__("Name"),
						"name" => "name",
						));
					
						$dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(
							Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
						);

						$fieldset->addField('date', 'date', array(
						'label'        => Mage::helper('holidayapi')->__('Date'),
						'name'         => 'date',
						'time' => true,
						'image'        => $this->getSkinUrl('images/grid-cal.gif'),
						'format'       => $dateFormatIso
						));
						$dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(
							Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
						);

						$fieldset->addField('observed', 'date', array(
						'label'        => Mage::helper('holidayapi')->__('Observed'),
						'name'         => 'observed',
						'time' => true,
						'image'        => $this->getSkinUrl('images/grid-cal.gif'),
						'format'       => $dateFormatIso
						));				
						 $fieldset->addField('public', 'select', array(
						'label'     => Mage::helper('holidayapi')->__('Public'),
						'values'   => Snenko_Holidayapi_Block_Adminhtml_Holidayapi_Grid::getValueArray4(),
						'name' => 'public',
						));
						$fieldset->addField("comment", "textarea", array(
						"label" => Mage::helper("holidayapi")->__("Comment"),
						"name" => "comment",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getHolidayapiData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getHolidayapiData());
					Mage::getSingleton("adminhtml/session")->setHolidayapiData(null);
				} 
				elseif(Mage::registry("holidayapi_data")) {
				    $form->setValues(Mage::registry("holidayapi_data")->getData());
				}
				return parent::_prepareForm();
		}
}
