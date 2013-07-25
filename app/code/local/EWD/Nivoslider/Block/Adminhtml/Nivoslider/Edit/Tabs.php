<?php 
class EWD_Nivoslider_Block_Adminhtml_Nivoslider_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('nivoslider_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('nivoslider')->__('Slider Information'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('slider_form', array(
            'label'     => Mage::helper('nivoslider')->__('Slider Information'),
            'title'     => Mage::helper('nivoslider')->__('Slider Information'),
            'content'   => $this->getLayout()->createBlock('nivoslider/adminhtml_nivoslider_edit_tab_form')->toHtml(),
            'active'	=> true
        ));
        
        $this->addTab('slider_options', array(
            'label'     => Mage::helper('nivoslider')->__('Slider Options'),
            'title'     => Mage::helper('nivoslider')->__('Slider Options'),
            'content'	=> $this->getLayout()->createBlock('nivoslider/adminhtml_nivoslider_edit_tab_options')
                                ->append($this->getLayout()->createBlock('nivoslider/adminhtml_nivoslider_edit_tab_options_list'))
                                ->toHtml()
        ));
        
        return parent::_beforeToHtml();
    }
}
