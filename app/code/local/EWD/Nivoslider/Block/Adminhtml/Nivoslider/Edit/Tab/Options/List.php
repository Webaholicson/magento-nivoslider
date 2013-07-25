<?php
class EWD_Nivoslider_Block_Adminhtml_Nivoslider_Edit_Tab_Options_List extends Mage_Adminhtml_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('nivoslider/list.phtml');
    }
	
    protected function _toHtml()
    {
    	if(!Mage::registry('nivoslider_data')) {
    		$this->assign('slides', false);
    		return parent::_toHtml();
    	}
    
    	$collection = Mage::getModel('nivoslider/nivoslider')
    	->getResourceCollection()
    	->addFieldToFilter('slider_id', Mage::registry('nivoslider_data')->getId())
    	->load();
    	$this->assign('slides', $collection);
    
    	return parent::_toHtml();
    }
    
    protected function _prepareLayout()
    {
        $this->setChild('deleteButton',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label'     => Mage::helper('nivoslider')->__('Delete Slide'),
                    'onclick'   => 'answer.del(this)',
                    'class' 	=> 'delete'
                ))
        );

        $this->setChild('addButton',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label'     => Mage::helper('nivoslider')->__('Add Slide'),
                    'onclick'   => 'answer.add(this)',
                    'class' 	=> 'add'
                ))
        );
        return parent::_prepareLayout();
    }

    public function getDeleteButtonHtml()
    {
        return $this->getChildHtml('deleteButton');
    }

    public function getAddButtonHtml()
    {
        return $this->getChildHtml('addButton');
    }
}
