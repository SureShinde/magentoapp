<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) 2019 Amasty (https://www.amasty.com)
 * @package Amasty_Rolepermissions
 */


namespace Amasty\Rolepermissions\Plugin\Framework\App;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\Categories;

class Cache
{
    const ATTRIBUTE_METADATA_CACHE_PREFIX = 'ATTRIBUTE_METADATA_INSTANCES_CACHE';

    /**
     * @var \Amasty\Rolepermissions\Helper\Data
     */
    private $ruleHelper;

    /**
     * Cache constructor.
     * @param \Amasty\Rolepermissions\Helper\Data\Proxy $ruleHelper
     */
    public function __construct(\Amasty\Rolepermissions\Helper\Data\Proxy $ruleHelper)
    {
        $this->ruleHelper = $ruleHelper;
    }

    /**
     * @param \Magento\Framework\App\Cache $subject
     * @param string $identifier
     * @return string
     */
    public function beforeLoad(\Magento\Framework\App\Cache $subject, $identifier)
    {
        if (defined('Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\Categories::CATEGORY_TREE_ID')) {
            if (false !== strpos($identifier, Categories::CATEGORY_TREE_ID)) {
                $rule = $this->ruleHelper->currentRule();
                if ($rule) {
                    $identifier = $identifier . '_' . $rule->getRoleId();
                }
            }
        }

        if ($identifier == self::ATTRIBUTE_METADATA_CACHE_PREFIX . 'customerall') {
            $rule = $this->ruleHelper->currentRule();
            if ($rule) {
                $identifier = $identifier . '_' . $rule->getRoleId();
            }
        }

        return [$identifier];
    }

    /**
     * @param \Magento\Framework\App\Cache $subject
     * @param string $data
     * @param string $identifier
     * @param array $tags
     * @param null $lifeTime
     * @return array
     */
    public function beforeSave(\Magento\Framework\App\Cache $subject, $data, $identifier, $tags = [], $lifeTime = null)
    {
        if (defined('Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\Categories::CATEGORY_TREE_ID')) {
            if (false !== strpos($identifier, Categories::CATEGORY_TREE_ID)) {
                $rule = $this->ruleHelper->currentRule();
                if ($rule) {
                    $identifier = $identifier . '_' . $rule->getRoleId();
                }
            }
        }

        if ($identifier == self::ATTRIBUTE_METADATA_CACHE_PREFIX . 'customerall') {
            $rule = $this->ruleHelper->currentRule();
            if ($rule) {
                $identifier = $identifier . '_' . $rule->getRoleId();
            }
        }

        return [$data, $identifier, $tags, $lifeTime];
    }
}
