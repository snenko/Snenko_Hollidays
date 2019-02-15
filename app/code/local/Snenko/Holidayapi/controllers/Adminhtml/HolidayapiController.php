<?php

class Snenko_Holidayapi_Adminhtml_HolidayapiController extends Mage_Adminhtml_Controller_Action
{
		protected function _isAllowed()
		{
		//return Mage::getSingleton('admin/session')->isAllowed('holidayapi/holidayapi');
			return true;
		}

		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("holidayapi/holidayapi")->_addBreadcrumb(Mage::helper("adminhtml")->__("Holidayapi  Manager"),Mage::helper("adminhtml")->__("Holidayapi Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Holidayapi"));
			    $this->_title($this->__("Manager Holidayapi"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("Holidayapi"));
				$this->_title($this->__("Holidayapi"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("holidayapi/holidayapi")->load($id);
				if ($model->getId()) {
					Mage::register("holidayapi_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("holidayapi/holidayapi");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Holidayapi Manager"), Mage::helper("adminhtml")->__("Holidayapi Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Holidayapi Description"), Mage::helper("adminhtml")->__("Holidayapi Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("holidayapi/adminhtml_holidayapi_edit"))->_addLeft($this->getLayout()->createBlock("holidayapi/adminhtml_holidayapi_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("holidayapi")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Holidayapi"));
		$this->_title($this->__("Holidayapi"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("holidayapi/holidayapi")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("holidayapi_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("holidayapi/holidayapi");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Holidayapi Manager"), Mage::helper("adminhtml")->__("Holidayapi Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Holidayapi Description"), Mage::helper("adminhtml")->__("Holidayapi Description"));


		$this->_addContent($this->getLayout()->createBlock("holidayapi/adminhtml_holidayapi_edit"))->_addLeft($this->getLayout()->createBlock("holidayapi/adminhtml_holidayapi_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						

						$model = Mage::getModel("holidayapi/holidayapi")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Holidayapi was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setHolidayapiData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setHolidayapiData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("holidayapi/holidayapi");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("holidayapi/holidayapi");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'holidayapi.xml';
			$grid       = $this->getLayout()->createBlock('holidayapi/adminhtml_holidayapi_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
