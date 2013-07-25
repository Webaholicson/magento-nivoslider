<?php 
class EWD_Nivoslider_Block_Widget extends Mage_Core_Block_Abstract implements Mage_Widget_Block_Interface
{	
    protected function _toHtml()
    {
        $layout = $this->getLayout();
        return $layout->createBlock('nivoslider/nivoslider', 'nivoslider')->setSliderToShow($this->getData('slider'))->toHtml();
    }
}