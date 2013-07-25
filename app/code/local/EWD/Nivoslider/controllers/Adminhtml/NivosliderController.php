<?php
class EWD_Nivoslider_Adminhtml_NivosliderController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout()->_setActiveMenu('nivoslider/sliders');
        return $this;
    }
	
    public function indexAction()
    {
        $this->_initAction();
        $this->renderLayout();
    }
    
    public function newAction()
    {
    	$this->_initAction();
    	$this->renderLayout();
    }
    
    public function editAction()
    {
        $sliderId     = $this->getRequest()->getParam('id');
        $nivosliderModel  = Mage::getModel('nivoslider/nivoslider')->load($sliderId);

        $this->_title($this->__('Edit Slider'));

        Mage::register('nivoslider_data', $nivosliderModel);

        $this->loadLayout();
        $this->_initLayoutMessages('admin/session');
        $this->_setActiveMenu('nivoslider/slider');
        $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Slider Manager'), Mage::helper('adminhtml')->__('Slider Manager'), $this->getUrl('*/*/'));
        $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Edit Slider'), Mage::helper('adminhtml')->__('Edit Slider'));

        $this->_initAction();
        $this->renderLayout();
    }
    
    public function saveAction()
    {
    	if ($this->getRequest()->getPost()) {
            try {
                $id = $this->getRequest()->getParam('id');
                $postData = $this->getRequest()->getPost();
                $nivosliderModel = Mage::getModel('nivoslider/nivoslider');
                if ($id) $nivosliderModel->load($id);
                $start = array_shift(array_keys($_FILES['slider_files']['size']));
                $end = array_pop(array_keys($_FILES['slider_files']['size']));
                
                if(isset($_FILES['slider_files'])) {
                    try {
                        $path = Mage::getBaseDir('media') . DS . 'nivoslider';
                        for ($i = $start; $i <= $end; $i++) {
                            if (isset($_FILES['slider_files']['size'][$i]) && $_FILES['slider_files']['size'][$i] > 0) {
                                $postData['slider_data'][$i]['image'] = $_FILES['slider_files']['name'][$i];
                                $uploader = new Varien_File_Uploader('slider_files[' . $i . ']');
                                $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
                                $uploader->setAllowRenameFiles(false);
                                $uploader->setFilesDispersion(false);
                                $uploader->save($path);
                            }
                        }
                        
                        $postData['slider_data'] = serialize($postData['slider_data']);
                        
                    } catch (Exception $e) {
                        Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                        Mage::getSingleton('adminhtml/session')->setNivosliderData($this->getRequest()->getPost());
                        $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                        return;
                    }
                } else {
                    if (!$id) {
                        Mage::getSingleton('adminhtml/session')->addError('There was an error while trying to upload the images');
                        Mage::getSingleton('adminhtml/session')->setNivosliderData($this->getRequest()->getPost());
                        $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                        return;
                    }
                    
                    $postData['slider_data'] = serialize($postData['slider_data']);
                }
		
                $nivosliderModel->addData($postData);
                
                if (!$id) {
                    $nivosliderModel->setCreatedAt(now());
                }
                
                $nivosliderModel->setUpdatedAt(now())->save();
               
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Slider was successfully saved'));
                Mage::getSingleton('adminhtml/session')->setNivosliderData(false);
                
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setNivosliderData($this->getRequest()->getPost());
                $this->_redirect('*/*/edit', array('id' => $id));
                return;
            }
        }
        $this->_redirect('*/*/');
    }
	
    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $model = Mage::getModel('nivoslider/nivoslider');
                $model->setId($id);
                $model->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('The slider has been deleted.'));
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Unable to find a slider to delete.'));
        $this->_redirect('*/*/');
    }
}