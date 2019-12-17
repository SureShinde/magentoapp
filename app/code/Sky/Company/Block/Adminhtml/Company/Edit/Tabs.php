<?php
namespace Sky\Company\Block\Adminhtml\Company\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
		
        parent::_construct();
        $this->setId('checkmodule_company_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Company Information'));
    }
}