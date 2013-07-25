<?php
class EWD_Nivoslider_Block_Nivoslider extends Mage_Core_Block_Template
{
    protected $_slider;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('nivoslider/slider.phtml');
        $this->_slider = $this->getData('widget');
    }
	
    public function getSliderToShow() 
    {
        return $this->_slider;
    }
	
    public function setSliderToShow($slider_id) 
    {
        $this->_slider = $slider_id;
        return $this;
    }
	
    public function getSliderData() 
    {
        if (empty($this->_slider)) {
            return false;
        }
	
        return Mage::getModel('nivoslider/nivoslider')
            ->getCollection()
            ->addFieldToFilter('slider_id', $this->_slider)
            ->load();
    }
	
    protected function _toHtml() 
    {
        $pageTitle = '';
        $headBlock = $this->getLayout()->getBlock('head');
        if ($headBlock) {
            $pageTitle = $headBlock->getTitle();
        }
	
        $data = $this->getSliderData();
        $this->assign('nivoslider', $data);
	
        return parent::_toHtml();
    }
}