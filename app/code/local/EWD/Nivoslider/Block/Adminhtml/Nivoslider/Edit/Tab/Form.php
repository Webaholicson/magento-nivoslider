<?php
class EWD_Nivoslider_Block_Adminhtml_Nivoslider_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();

        $fieldset = $form->addFieldset('slider_form', array('legend'=>Mage::helper('nivoslider')->__('Slider Information')));
        $fieldset->addField('slider_name', 'text', array(
            'label'     => Mage::helper('nivoslider')->__('Name'),
            'required'  => true,
            'name'      => 'slider_name',
        ));
        
        $fieldset->addField('effect', 'select', array(
            'label'     => Mage::helper('nivoslider')->__('Effect'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'effect',
            'value'	=> 'random',
            'values'	=> array(
                array('label' => 'Random', 'value' => 'random'),
                array('label' => 'Fold', 'value' => 'fold'),
                array('label' => 'Fade', 'value' => 'fade'),
                array('label' => 'Slide Down', 'value' => 'sliceDown'),
                array('label' => 'Slide Down Left', 'value' => 'sliceDownLeft'),
                array('label' => 'Slide Up', 'value' => 'sliceUp'),
                array('label' => 'Slide Up Left', 'value' => 'sliceUpLeft'),
                array('label' => 'Slide Up Down', 'value' => 'sliceUpDown'),
                array('label' => 'Slide Up Down Left', 'value' => 'sliceUpDownLeft'),
                array('label' => 'Slide Up', 'value' => 'sliceUp'),
                array('label' => 'Fold', 'value' => 'fold'),
                array('label' => 'Fade', 'value' => 'fade'),
                array('label' => 'Slide In Right', 'value' => 'slideInRight'),
                array('label' => 'Slide In Left', 'value' => 'slideInLeft'),
                array('label' => 'Box Random', 'value' => 'boxRandom'),
                array('label' => 'Box Rain', 'value' => 'boxRain'),
                array('label' => 'Box Rain Reverse', 'value' => 'boxRainReverse'),
                array('label' => 'Box Rain Reverse', 'value' => 'boxRainReverse'),
                array('label' => 'Box Rain Grow', 'value' => 'boxRainGrow'),
                array('label' => 'Box Rain Grow Reverse', 'value' => 'boxRainGrowReverse')
            )
        ));
        
        $fieldset->addField('slices', 'text', array(
            'label'     => Mage::helper('nivoslider')->__('Number of Slices'),
            'required'  => true,
            'name'      => 'slices',
            'value'     => '15'
        ));
        
        $fieldset->addField('box_cols', 'text', array(
            'label'     => Mage::helper('nivoslider')->__('Columns'),
            'required'  => true,
            'name'      => 'box_cols',
            'value'     => '8'
        ));
        
        $fieldset->addField('box_rows', 'text', array(
            'label'     => Mage::helper('nivoslider')->__('Rows'),
            'required'  => true,
            'name'      => 'box_rows',
            'value'     => '4'
        ));
        
        $fieldset->addField('animation_speed', 'text', array(
            'label'     => Mage::helper('nivoslider')->__('Animation Speed (Miliseconds)'),
            'required'  => true,
            'name'      => 'animation_speed',
            'value'     => '500'
        ));
        
        $fieldset->addField('pause_time', 'text', array(
            'label'     => Mage::helper('nivoslider')->__('Pause Time (Miliseconds)'),
            'required'  => true,
            'name'      => 'pause_time',
            'value'     => '3000'
        ));
        
        $fieldset->addField('start_slide', 'text', array(
            'label'     => Mage::helper('nivoslider')->__('Start Slide'),
            'required'  => true,
            'name'      => 'start_slide',
            'value'	=> '0'
        ));
        
        $fieldset->addField('direction_nav', 'select', array(
            'label'     => Mage::helper('nivoslider')->__('Direction Nav'),
            'required'  => true,
            'name'      => 'direction_nav',
            'value'	=> '1',
            'values'	=> array(
                array('label' => 'Show', 'value' => '1'),
                array('label' => 'Hide', 'value' => '0')
            )
        ));
        
        $fieldset->addField('direction_nav_hide', 'select', array(
            'label'     => Mage::helper('nivoslider')->__('Direction Nav Hide'),
            'required'  => true,
            'name'      => 'direction_nav_hide',
            'value'     => '1',
            'values'	=> array(
                array('label' => 'Show on Hover', 'value' => '1'),
                array('label' => 'Show Always', 'value' => '0')
            )
        ));
        
        $fieldset->addField('control_nav', 'select', array(
            'label'     => Mage::helper('nivoslider')->__('Control Nav'),
            'required'  => true,
            'name'      => 'control_nav',
            'value'     => '1',
            'values'    => array(
                array('label' => 'Show', 'value' => '1'),
                array('label' => 'Don\'t Show', 'value' => '0')
            )
        ));
        
        $fieldset->addField('control_nav_thumbs', 'select', array(
            'label'     => Mage::helper('nivoslider')->__('Control Nav Thumbs'),
            'required'  => true,
            'name'      => 'control_nav_thumbs',
            'value'	=> '1',
            'values'	=> array(
                array('label' => 'Don\'t Use Thumbnails', 'value' => '0'),
                array('label' => 'Use Thumbnails', 'value' => '1')
            )
        ));
        
        $fieldset->addField('pause_on_hover', 'select', array(
            'label'     => Mage::helper('nivoslider')->__('Pause on Hover'),
            'required'  => true,
            'name'      => 'pause_on_hover',
            'value'	=> '1',
            'values'	=> array(
                array('label' => 'Yes', 'value' => '1'),
                array('label' => 'No', 'value' => '0')
            )
        ));
        
        $fieldset->addField('manual_advance', 'select', array(
            'label'     => Mage::helper('nivoslider')->__('Manual Advance'),
            'required'  => true,
            'name'      => 'manual_advance',
            'value'     => '0',
            'values'    => array(
                array('label' => 'No', 'value' => '0'),
                array('label' => 'Yes', 'value' => '1'),
            )
        ));
        
        $fieldset->addField('prev_text', 'text', array(
            'label'     => Mage::helper('nivoslider')->__('Previous Text'),
            'required'  => true,
            'name'      => 'prev_text',
            'value'     => 'Prev'
        ));
        
        $fieldset->addField('next_text', 'text', array(
            'label'     => Mage::helper('nivoslider')->__('Next Text'),
            'required'  => true,
            'name'      => 'next_text',
            'value'     => 'Next'
        ));
        
        $fieldset->addField('random_start', 'select', array(
            'label'     => Mage::helper('nivoslider')->__('Random Start'),
            'required'  => true,
            'name'      => 'random_start',
            'value'	=> '0',
            'values'	=> array(
                array('label' => 'Yes', 'value' => '1'),
                array('label' => 'No', 'value' => '0')
            )
        ));
        
        if (Mage::registry('nivoslider_data'))
        $form->setValues(Mage::registry('nivoslider_data'));
        $this->setForm($form);
        return parent::_prepareForm();
    }
}