<?php
/**
 * Copyright © 2015 Sky. All rights reserved.
 */
namespace Sky\Company\Model\ResourceModel;

/**
 * Company resource
 */
class Company extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('company_company', 'id');
    }

  
}
