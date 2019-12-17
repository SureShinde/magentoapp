<?php
declare(strict_types=1);

namespace MageFan\Blog\Model;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Query\Resolver\ValueFactory;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\Api\SortOrder;

/**
 * Orders field resolver, used for GraphQL request processing.
 */
class AutherResolver implements ResolverInterface
{
     const POSTS_SORT_FIELD_BY_PUBLISH_TIME = 'publish_time';
    const POSTS_SORT_FIELD_BY_POSITION = 'position';
    const POSTS_SORT_FIELD_BY_TITLE = 'title';

    /**
     * OrdersResolver constructor.
     * @param ShippedOrderDataProvider $customerShippedOrderResolver
     * @param CustomerFactory $customerFactory
     */
    public function __construct(
         \Magefan\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory,
          \Magefan\Blog\Model\AuthorFactory $authorFactory,
          ValueFactory $valueFactory,
          \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
    	$this->valueFactory = $valueFactory;
        $this->_postCollectionFactory = $postCollectionFactory;
        $this->_authorFactory = $authorFactory;
        $this->_storeManager = $storeManager; 
    }

   
    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        try {
            $data = array();
            if (!isset($args['user_id'])) {
              $data[] = '';
            } else {

                $_author = $this->_authorFactory->create();
                $author = $_author->load($args['user_id']);
                $data[0]['user_id'] = $author->getUserId();
                $data[0]['username'] = $author->getUsername();
                $data[0]['firstname'] = $author->getFirstname();
                $data[0]['lastname'] = $author->getLastname();
                $data[0]['email'] = $author->getEmail();
                $this->_postCollection = $this->_postCollectionFactory->create()
                    ->addActiveFilter()
                    ->addFieldToFilter('author_id', $author->getUserId())
                    ->addStoreFilter($this->_storeManager->getStore()->getId())
                    ->setOrder(self::POSTS_SORT_FIELD_BY_PUBLISH_TIME, SortOrder::SORT_DESC);
                $data[0]['blogs'] = $this->_postCollection->getData();

            }

               return !empty($data) ? $data : [];
        
        } catch (NoSuchEntityException $exception) {
            throw new GraphQlNoSuchEntityException(__('Customer id %1 does not exist.', [$blogId]));
        }
    }
}