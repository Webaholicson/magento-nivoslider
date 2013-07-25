<?php
class EWD_Nivoslider_Model_Widget_Source_Select
{
    public function toOptionArray()
    {
    	$sliders = Mage::getModel('nivoslider/nivoslider')->getCollection()->load();
    	$options[] = array('value' => '', 'label' => 'Select One');
    	foreach ($sliders as $slider) {
    		$options[] = array('value' => $slider->getId(), 'label' => $slider->getSliderName());	
    	}
        return $options;
    }
}