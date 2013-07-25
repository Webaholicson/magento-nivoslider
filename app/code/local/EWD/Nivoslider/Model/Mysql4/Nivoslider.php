<?php
class EWD_Nivoslider_Model_Mysql4_Nivoslider extends Mage_Core_Model_Mysql4_Abstract
{
	protected $_sliderTable;
	
	protected function _construct() {
		$this->_init('nivoslider/nivoslider', 'slider_id');
		$this->_sliderTable = $this->getTable('nivoslider/nivoslider');
	}

}
