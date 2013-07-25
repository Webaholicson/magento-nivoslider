<?php
class EWD_Nivoslider_Block_Adminhtml_Nivoslider extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
    	$this->_blockGroup = 'nivoslider';
    	$this->_controller = 'adminhtml_nivoslider';
    	$this->_headerText = Mage::helper('nivoslider')->__('Manage Sliders');
        $this->_addButtonLabel = Mage::helper('nivoslider')->__('Add new');
        parent::__construct();
    }
    
    public function getHeaderCssClass()
    {
        return 'icon-head head-sales-order';
    }
    
}