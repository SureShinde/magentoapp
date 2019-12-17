<?php
namespace Sky\Packages\Block\Adminhtml\Packages\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
		
        parent::_construct();
        $this->setId('checkmodule_packages_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Packages Information'));
    }
}