<?php 
class EWD_Nivoslider_Block_Adminhtml_Nivoslider_Grid extends Mage_Adminhtml_Block_Widget_Grid 
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('sliderGrid');
        $this->setDefaultSort('slider_name');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }
	
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('nivoslider/nivoslider')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }
    
    protected function _prepareColumns()
    {
        $this->addColumn('slider_id', array(
            'header'    => Mage::helper('nivoslider')->__('ID'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'slider_id',
        ));

        $this->addColumn('slider_name', array(
            'header'    => Mage::helper('nivoslider')->__('Slider Name'),
            'align'     =>'left',
            'index'     => 'slider_name',
        ));

        $this->addColumn('date_created', array(
            'header'    => Mage::helper('nivoslider')->__('Date Created'),
            'width'     => '50px',
            'type'      => 'date',
            'index'     => 'created_at',
        ));

        $this->addColumn('date_modified', array(
            'header'    => Mage::helper('nivoslider')->__('Date Modified'),
            'align'     => 'left',
            'width'     => '120px',
            'type'      => 'date',
            'index'     => 'updated_at',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }	
}
