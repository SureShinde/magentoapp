<?php
/**
 * Copyright © 2015 Sky. All rights reserved.
 */
namespace Sky\Packages\Model\ResourceModel;

/**
 * Packages resource
 */
class Packages extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('packages_packages', 'id');
    }

  
}
