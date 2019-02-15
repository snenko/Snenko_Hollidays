<?php

class Snenko_Holidayapi_Block_Adminhtml_Holidayapi_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("holidayapiGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("holidayapi/holidayapi")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("holidayapi")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
                
						$this->addColumn('country_id', array(
						'header' => Mage::helper('holidayapi')->__('Country'),
						'index' => 'country_id',
						'type' => 'options',
						'options'=>Snenko_Holidayapi_Block_Adminhtml_Holidayapi_Grid::getOptionArray0(),				
						));
						
				$this->addColumn("name", array(
				"header" => Mage::helper("holidayapi")->__("Name"),
				"index" => "name",
				));
					$this->addColumn('date', array(
						'header'    => Mage::helper('holidayapi')->__('Date'),
						'index'     => 'date',
						'type'      => 'datetime',
					));
					$this->addColumn('observed', array(
						'header'    => Mage::helper('holidayapi')->__('Observed'),
						'index'     => 'observed',
						'type'      => 'datetime',
					));
						$this->addColumn('public', array(
						'header' => Mage::helper('holidayapi')->__('Public'),
						'index' => 'public',
						'type' => 'options',
						'options'=>Snenko_Holidayapi_Block_Adminhtml_Holidayapi_Grid::getOptionArray4(),				
						));
						 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_holidayapi', array(
					 'label'=> Mage::helper('holidayapi')->__('Remove Holidayapi'),
					 'url'  => $this->getUrl('*/adminhtml_holidayapi/massRemove'),
					 'confirm' => Mage::helper('holidayapi')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray0()
		{
            $data_array=array(); 
			$data_array[0]='US';
			$data_array[1]='RU';
            return($data_array);
		}
		static public function getValueArray0()
		{
            $data_array=array();
			foreach(Snenko_Holidayapi_Block_Adminhtml_Holidayapi_Grid::getOptionArray0() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray4()
		{
            $data_array=array(); 
			$data_array[0]='True';
			$data_array[1]='False ';
            return($data_array);
		}
		static public function getValueArray4()
		{
            $data_array=array();
			foreach(Snenko_Holidayapi_Block_Adminhtml_Holidayapi_Grid::getOptionArray4() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}