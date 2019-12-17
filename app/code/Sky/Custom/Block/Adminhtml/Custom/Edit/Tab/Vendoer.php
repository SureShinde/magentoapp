<?php
namespace Sky\Custom\Block\Adminhtml\Custom\Edit\Tab;
class Vendoer extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
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
        $model = $this->_coreRegistry->registry('custom_custom');
		$isElementDisabled = false;
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => __('Vendoer')));

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array('name' => 'id'));
        }

		$fieldset->addField(
            'txtfirstname',
            'text',
            array(
                'name' => 'txtfirstname',
                'label' => __('First Name'),
                'title' => __('First Name'),
                /*'required' => true,*/
            )
        );
        $fieldset->addField(
            'txtlastname',
            'text',
            array(
                'name' => 'txtlastname',
                'label' => __('Last Name'),
                'title' => __('Last Name'),
                /*'required' => true,*/
            )
        );

    //     $fieldset->addField(
    //      'image',
    //      'image',
    //      [
    //         'name' => 'custom_image_field',
    //         'label' => __('Profile Image'),
    //         'title' => __('Profile Image'),
    //         'class' => 'custom_image',
    //         'data-form-part' => $this->getData('target_form'),
    //         'value' => 'customimage/image',
    //         'note' => __('Allowed image types: jpg,png')
    //       ]
    // );
        $fieldset->addField(
            'txtemail',
            'text',
            array(
                'name' => 'txtemail',
                'label' => __('Email'),
                'title' => __('Email'),
                /*'required' => true,*/
            )
        );
        // $fieldset->addField(
        //     'txtpassword',
        //     'text',
        //     array(
        //         'name' => 'txtpassword',
        //         'label' => __('Password'),
        //         'title' => __('Password'),
        //         /*'required' => true,*/
        //     )
        // );
        // $fieldset->addField(
        //     'txtrepeatpassword',
        //     'text',
        //     array(
        //         'name' => 'txtrepeatpassword',
        //         'label' => __('Re-Password'),
        //         'title' => __('Re-Password'),
        //         /*'required' => true,*/
        //     )
        // );
        $fieldset->addField(
            'txtorganization',
            'text',
            array(
                'name' => 'txtorganization',
                'label' => __('Organization'),
                'title' => __('Organization'),
                /*'required' => true,*/
            )
        );
        $fieldset->addField(
            'cbotipoempresa',
            'text',
            array(
                'name' => 'cbotipoempresa',
                'label' => __('cboTipoEmpresa'),
                'title' => __('cboTipoEmpresa'),
                /*'required' => true,*/
            )
        );
        $fieldset->addField(
            'txtmobilephone',
            'text',
            array(
                'name' => 'txtmobilephone',
                'label' => __('Mobile Phone'),
                'title' => __('Mobile Phone'),
                /*'required' => true,*/
            )
        );
        $fieldset->addField(
            'txthomephone',
            'text',
            array(
                'name' => 'txthomephone',
                'label' => __('Home Phone'),
                'title' => __('Home Phone'),
                /*'required' => true,*/
            )
        );
        $fieldset->addField(
            'txtworkphone',
            'text',
            array(
                'name' => 'txtworkphone',
                'label' => __('Work Phone'),
                'title' => __('Work Phone'),
                /*'required' => true,*/
            )
        );
        $fieldset->addField(
            'txtfax',
            'text',
            array(
                'name' => 'txtfax',
                'label' => __('Fax'),
                'title' => __('Fax'),
                /*'required' => true,*/
            )
        );
        $fieldset->addField(
            'cbocountry',
            'text',
            array(
                'name' => 'cbocountry',
                'label' => __('Country'),
                'title' => __('Country'),
                /*'required' => true,*/
            )
        );

        $fieldset->addField(
            'txtzipcode',
            'text',
            array(
                'name' => 'txtzipcode',
                'label' => __('Zip Code'),
                'title' => __('Zip Code'),
                /*'required' => true,*/
            )
        );
        $fieldset->addField(
            'cboregion',
            'text',
            array(
                'name' => 'cboregion',
                'label' => __('Region'),
                'title' => __('Region'),
                /*'required' => true,*/
            )
        );
        $fieldset->addField(
            'cbocity',
            'text',
            array(
                'name' => 'cbocity',
                'label' => __('City'),
                'title' => __('City'),
                /*'required' => true,*/
            )
        );
        $fieldset->addField(
            'txtaddress',
            'text',
            array(
                'name' => 'txtaddress',
                'label' => __('Address'),
                'title' => __('Address'),
                /*'required' => true,*/
            )
        );
         $fieldset->addField(
            'txtaddress2',
            'text',
            array(
                'name' => 'txtaddress2',
                'label' => __('Address 2'),
                'title' => __('Address 2'),
                /*'required' => true,*/
            )
        );
          $fieldset->addField(
            'cbopaquetetmo',
            'text',
            array(
                'name' => 'cbopaquetetmo',
                'label' => __('Paquete tmo'),
                'title' => __('Paquete tmo'),
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
        return __('Vendor');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Vendor');
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
