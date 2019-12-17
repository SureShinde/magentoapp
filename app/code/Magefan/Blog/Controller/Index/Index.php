<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * See LICENSE.txt for license details (http://opensource.org/licenses/osl-3.0.php).
 *
 * Glory to Ukraine! Glory to the heroes!
 */
namespace Magefan\Blog\Controller\Index;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\Api\SortOrder;
use CodeTheatres\CustomerShippedOrdersGraphQl\Model\Resolver\ShippedOrderDataProvider;
/**
 * Blog home page view
 */
class Index extends \Magefan\Blog\App\Action\Action
{   

    const POSTS_SORT_FIELD_BY_PUBLISH_TIME = 'publish_time';
    const POSTS_SORT_FIELD_BY_POSITION = 'position';
    const POSTS_SORT_FIELD_BY_TITLE = 'title';

   

     public function __construct(
         ShippedOrderDataProvider $customerShippedOrderResolver,
        \Magefan\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory,
        \Magento\Framework\App\Action\Context $context,
         \Magefan\Blog\Model\AuthorFactory $authorFactory,
         \Magento\Store\Model\StoreManagerInterface $storeManager
     ) {
        $this->customerShippedOrderResolver = $customerShippedOrderResolver;
        $this->_postCollectionFactory = $postCollectionFactory;
        $this->_storeManager = $storeManager; 
        $this->_authorFactory = $authorFactory;
        parent::__construct($context);
       
    }

    /**
     * View blog homepage action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
      //   $this->_postCollection = $this->_postCollectionFactory->create()
      //       ->addActiveFilter()
      //       ->addStoreFilter($this->_storeManager->getStore()->getId())
      //       ->setOrder(self::POSTS_SORT_FIELD_BY_PUBLISH_TIME, SortOrder::SORT_DESC);
      //  echo '<pre>';
      
      // $data = array();
   
      //  $_author = $this->_authorFactory->create();
      //  foreach ($this->_postCollection as $value) {
      //     $data['items'][$value->getPostId()]['post_id']  = $value->getPostId();
      //     $data['items'][$value->getPostId()]['content']  = $value->getContent();
      //     $data['items'][$value->getPostId()]['identifire']  = $value->getIndentifire();
      //     $data['items'][$value->getPostId()]['content_heading']  = $value->getContentHeading();
      //     $data['items'][$value->getPostId()]['is_active']  = $value->getPostId();
      //     $data['items'][$value->getPostId()]['author_id']  = $value->getAuthorId();
      //     $author = $_author->load($value->getAuthorId());
      //     if ($_author->getId()) {
      //        $data['items'][$value->getPostId()]['author_details']  = $author->getData();
      //     } else {
      //        $data['items'][$value->getPostId()]['author_details']  = '';
      //     }
      //     // $data['items'][$value->getPostId()]['category']  = $value->getPostId();
      //  }
      //   print_r($data);
      //  die;    
        
        echo '<pre>';
         $_author = $this->_authorFactory->create();
               $author = $_author->load(1);
               $data = $author->getData();
                print_r($data);
               die;
 // $data = $this->customerShippedOrderResolver->getOrdersByCustomerId(1);
 // echo '<pre>';
 // print_r( $data);
 // die;
        if (!$this->moduleEnabled()) {
            return $this->_forwardNoroute();
        }

        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }

  

   

}
