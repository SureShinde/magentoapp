<?php
namespace Sky\Packages\Block\Adminhtml;
class Packages extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
		
        $this->_controller = 'adminhtml_packages';/*block grid.php directory*/
        $this->_blockGroup = 'Sky_Packages';
        $this->_headerText = __('Packages');
        $this->_addButtonLabel = __('Add New Entry'); 
        parent::_construct();
		
    }
}
