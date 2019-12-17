<?php
/**
 * Copyright © 2015 Sky. All rights reserved.
 */
namespace Sky\Custom\Model\ResourceModel;

/**
 * Custom resource
 */
class Custom extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('custom_custom', 'id');
    }

  
}
