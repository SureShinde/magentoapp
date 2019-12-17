<?php
namespace Sky\Custom\Block\Adminhtml\Custom;


class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Magento\Framework\Module\Manager
     */
    protected $moduleManager;

    /**
     * @var \Magento\Eav\Model\ResourceModel\Entity\Attribute\Set\CollectionFactory]
     */
    protected $_setsFactory;

    /**
     * @var \Magento\Catalog\Model\ProductFactory
     */
    protected $_productFactory;

    /**
     * @var \Magento\Catalog\Model\Product\Type
     */
    protected $_type;

    /**
     * @var \Magento\Catalog\Model\Product\Attribute\Source\Status
     */
    protected $_status;
	protected $_collectionFactory;

    /**
     * @var \Magento\Catalog\Model\Product\Visibility
     */
    protected $_visibility;

    /**
     * @var \Magento\Store\Model\WebsiteFactory
     */
    protected $_websiteFactory;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Magento\Store\Model\WebsiteFactory $websiteFactory
     * @param \Magento\Eav\Model\ResourceModel\Entity\Attribute\Set\CollectionFactory $setsFactory
     * @param \Magento\Catalog\Model\ProductFactory $productFactory
     * @param \Magento\Catalog\Model\Product\Type $type
     * @param \Magento\Catalog\Model\Product\Attribute\Source\Status $status
     * @param \Magento\Catalog\Model\Product\Visibility $visibility
     * @param \Magento\Framework\Module\Manager $moduleManager
     * @param array $data
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Magento\Store\Model\WebsiteFactory $websiteFactory,
		\Sky\Custom\Model\ResourceModel\Custom\Collection $collectionFactory,
        \Magento\Framework\Module\Manager $moduleManager,
        array $data = []
    ) {
		
		$this->_collectionFactory = $collectionFactory;
        $this->_websiteFactory = $websiteFactory;
        $this->moduleManager = $moduleManager;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
		
        $this->setId('productGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(false);
       
    }

    /**
     * @return Store
     */
    protected function _getStore()
    {
        $storeId = (int)$this->getRequest()->getParam('store', 0);
        return $this->_storeManager->getStore($storeId);
    }

    /**
     * @return $this
     */
    protected function _prepareCollection()
    {
		try{
			
			
			$collection =$this->_collectionFactory->load();

		  

			$this->setCollection($collection);

			parent::_prepareCollection();
		  
			return $this;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();die;
		}
    }

    /**
     * @param \Magento\Backend\Block\Widget\Grid\Column $column
     * @return $this
     */
    protected function _addColumnFilterToCollection($column)
    {
        if ($this->getCollection()) {
            if ($column->getId() == 'websites') {
                $this->getCollection()->joinField(
                    'websites',
                    'catalog_product_website',
                    'website_id',
                    'product_id=entity_id',
                    null,
                    'left'
                );
            }
        }
        return parent::_addColumnFilterToCollection($column);
    }

    /**
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            [
                'header' => __('ID'),
                'type' => 'number',
                'index' => 'id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        );
		$this->addColumn(
            'txtfirstname',
            [
                'header' => __('First Name'),
                'index' => 'txtfirstname',
                'class' => 'txtfirstname'
            ]
        );
		$this->addColumn(
            'txtlastname',
            [
                'header' => __('Last Name'),
                'index' => 'txtlastname',
                'class' => 'txtlastname'
            ]
        );
		$this->addColumn(
            'txtemail',
            [
                'header' => __('Email'),
                'index' => 'txtemail',
                'class' => 'txtemail'
            ]
        );
		// $this->addColumn(
  //           'txtpassword',
  //           [
  //               'header' => __('txtpassword'),
  //               'index' => 'txtpassword',
  //               'class' => 'txtpassword'
  //           ]
  //       );
		// $this->addColumn(
  //           'txtrepeatpassword',
  //           [
  //               'header' => __('txtrepeatpassword'),
  //               'index' => 'txtrepeatpassword',
  //               'class' => 'txtrepeatpassword'
  //           ]
  //       );
		$this->addColumn(
            'txtorganization',
            [
                'header' => __('Organization'),
                'index' => 'txtorganization',
                'class' => 'txtorganization'
            ]
        );
		// $this->addColumn(
  //           'cbotipoempresa',
  //           [
  //               'header' => __('cbotipoempresa'),
  //               'index' => 'cbotipoempresa',
  //               'class' => 'cbotipoempresa'
  //           ]
  //       );
		$this->addColumn(
            'txtmobilephone',
            [
                'header' => __('txtmobilephone'),
                'index' => 'txtmobilephone',
                'class' => 'txtmobilephone'
            ]
        );
		$this->addColumn(
            'txthomephone',
            [
                'header' => __('txthomephone'),
                'index' => 'txthomephone',
                'class' => 'txthomephone'
            ]
        );
		// $this->addColumn(
  //           'txtworkphone',
  //           [
  //               'header' => __('txtworkphone'),
  //               'index' => 'txtworkphone',
  //               'class' => 'txtworkphone'
  //           ]
  //       );
		// $this->addColumn(
  //           'txtfax',
  //           [
  //               'header' => __('txtfax'),
  //               'index' => 'txtfax',
  //               'class' => 'txtfax'
  //           ]
  //       );
		// $this->addColumn(
  //           'cbocountry',
  //           [
  //               'header' => __('cbocountry'),
  //               'index' => 'cbocountry',
  //               'class' => 'cbocountry'
  //           ]
  //       );
		// $this->addColumn(
  //           'txtzipcode',
  //           [
  //               'header' => __('txtzipcode'),
  //               'index' => 'txtzipcode',
  //               'class' => 'txtzipcode'
  //           ]
  //       );
		// $this->addColumn(
  //           'cboregion',
  //           [
  //               'header' => __('cboregion'),
  //               'index' => 'cboregion',
  //               'class' => 'cboregion'
  //           ]
  //       );
		// $this->addColumn(
  //           'cbocity',
  //           [
  //               'header' => __('cbocity'),
  //               'index' => 'cbocity',
  //               'class' => 'cbocity'
  //           ]
  //       );
		// $this->addColumn(
  //           'txtaddress',
  //           [
  //               'header' => __('txtaddress'),
  //               'index' => 'txtaddress',
  //               'class' => 'txtaddress'
  //           ]
  //       );
		// $this->addColumn(
  //           'txtaddress2',
  //           [
  //               'header' => __('txtaddress2'),
  //               'index' => 'txtaddress2',
  //               'class' => 'txtaddress2'
  //           ]
  //       );
		$this->addColumn(
            'cbopaquetetmo',
            [
                'header' => __('cbopaquetetmo'),
                'index' => 'cbopaquetetmo',
                'class' => 'cbopaquetetmo'
            ]
        );
		/*{{CedAddGridColumn}}*/

        $block = $this->getLayout()->getBlock('grid.bottom.links');
        if ($block) {
            $this->setChild('grid.bottom.links', $block);
        }

        return parent::_prepareColumns();
    }

     /**
     * @return $this
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('id');

        $this->getMassactionBlock()->addItem(
            'delete',
            array(
                'label' => __('Delete'),
                'url' => $this->getUrl('custom/*/massDelete'),
                'confirm' => __('Are you sure?')
            )
        );
        return $this;
    }

    /**
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('custom/*/index', ['_current' => true]);
    }

    /**
     * @param \Magento\Catalog\Model\Product|\Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl(
            'custom/*/edit',
            ['store' => $this->getRequest()->getParam('store'), 'id' => $row->getId()]
        );
    }
}
