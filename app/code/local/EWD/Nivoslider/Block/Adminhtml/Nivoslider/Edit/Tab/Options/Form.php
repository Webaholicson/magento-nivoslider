<?php
class EWD_Nivoslider_Block_Adminhtml_Nivoslider_Edit_Tab_Options_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();

        $fieldset = $form->addFieldset('slider_options', array('legend'=>Mage::helper('nivoslider')->__('Slides')));
        
        $fieldset->addField('slider_data', 'image', array(
            'label'     => Mage::helper('nivoslider')->__('Slide'),
            'class'     => 'required-entry',
            'required'  => false,
            'name'      => 'slider_data',
        ));
        
        $this->setForm($form);
        return parent::_prepareForm();
    }
}