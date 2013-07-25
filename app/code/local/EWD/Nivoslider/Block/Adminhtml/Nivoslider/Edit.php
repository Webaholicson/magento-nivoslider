<?php
class EWD_Nivoslider_Block_Adminhtml_Nivoslider_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
    	$this->_blockGroup = 'nivoslider';
    	$this->_controller = 'adminhtml_nivoslider';
        $this->_mode = 'edit';
    	
        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('nivoslider')->__('Save Slider'));
        $this->_updateButton('delete', 'label', Mage::helper('nivoslider')->__('Delete Slider'));

        // $this->setValidationUrl($this->getUrl('*/*/validate', array('id' => $this->getRequest()->getParam($this->_objectId))));
    }

    public function getHeaderText()
    {
        // return Mage::helper('nivoslider')->__('New Slider');
    	if( Mage::registry('nivoslider_data') && Mage::registry('nivoslider_data')->getId() ) {
            return Mage::helper('nivoslider')->__("Edit Slider '%s'", $this->htmlEscape(Mage::registry('nivoslider_data')->getSliderName()));
        } else {
            return Mage::helper('nivoslider')->__('New Slider');
        }
    }
}