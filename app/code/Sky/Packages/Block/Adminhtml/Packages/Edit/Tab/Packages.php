<?php
namespace Sky\Packages\Block\Adminhtml\Packages\Edit\Tab;
class Packages extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = array()
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
		/* @var $model \Magento\Cms\Model\Page */
        $model = $this->_coreRegistry->registry('packages_packages');
		$isElementDisabled = false;
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => __('Packages')));

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array('name' => 'id'));
        }

		$fieldset->addField(
            'package_name',
            'text',
            array(
                'name' => 'package_name',
                'label' => __('package name'),
                'title' => __('package name'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'total_users',
            'text',
            array(
                'name' => 'total_users',
                'label' => __('total users'),
                'title' => __('total users'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'total_categories',
            'text',
            array(
                'name' => 'total_categories',
                'label' => __('total categories'),
                'title' => __('total categories'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'time_months_package',
            'text',
            array(
                'name' => 'time_months_package',
                'label' => __('time months package'),
                'title' => __('time months package'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'package_price',
            'text',
            array(
                'name' => 'package_price',
                'label' => __('package price'),
                'title' => __('package price'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'state',
            'text',
            array(
                'name' => 'state',
                'label' => __('state'),
                'title' => __('state'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'package_description',
            'text',
            array(
                'name' => 'package_description',
                'label' => __(' package description'),
                'title' => __(' package description'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'total_store',
            'text',
            array(
                'name' => 'total_store',
                'label' => __(' total store'),
                'title' => __(' total store'),
                /*'required' => true,*/
            )
        );
		$fieldset->addField(
            'total_products',
            'text',
            array(
                'name' => 'total_products',
                'label' => __('total products'),
                'title' => __('total products'),
                /*'required' => true,*/
            )
        );
		/*{{CedAddFormField}}*/
        
        if (!$model->getId()) {
            $model->setData('status', $isElementDisabled ? '2' : '1');
        }

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();   
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Packages');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Packages');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
