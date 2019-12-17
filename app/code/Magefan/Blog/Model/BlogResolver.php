<?php
declare(strict_types=1);

namespace MageFan\Blog\Model;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\Api\SortOrder;

/**
 * Orders field resolver, used for GraphQL request processing.
 */
class BlogResolver implements ResolverInterface
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
          \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
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
            if (!isset($args['post_id'])) {
                 $this->_postCollection = $this->_postCollectionFactory->create()
                ->addActiveFilter()
                ->addStoreFilter($this->_storeManager->getStore()->getId())
                ->setOrder(self::POSTS_SORT_FIELD_BY_PUBLISH_TIME, SortOrder::SORT_DESC);
             } else {
                 $this->_postCollection = $this->_postCollectionFactory->create()
                ->addActiveFilter()
                ->addFieldToFilter('post_id', $args['post_id'])
                ->addStoreFilter($this->_storeManager->getStore()->getId())
                ->setOrder(self::POSTS_SORT_FIELD_BY_PUBLISH_TIME, SortOrder::SORT_DESC);
             }

              $data = array();
   
               $_author = $this->_authorFactory->create();
               foreach ($this->_postCollection as $value) {
                  $data[$value->getPostId()]['post_id']  = $value->getPostId();
                  $data[$value->getPostId()]['content']  = $value->getContent();
                  $data[$value->getPostId()]['identifire']  = $value->getIndentifire();
                  $data[$value->getPostId()]['content_heading']  = $value->getContentHeading();
                  $data[$value->getPostId()]['is_active']  = $value->getPostId();
                  $data[$value->getPostId()]['author_id']  = $value->getAuthorId();
                  $author = $_author->load($value->getAuthorId());
                  if ($_author->getId()) {
                     $data[$value->getPostId()]['author'][]  = $author->getData();
                  } else {
                     $data[$value->getPostId()]['author'][]  = '';
                  }
                  // $data['items'][$value->getPostId()]['category']  = $value->getPostId();
               }
            
        

            return !empty($data) ? $data : [];
        } catch (NoSuchEntityException $exception) {
            throw new GraphQlNoSuchEntityException(__('Customer id %1 does not exist.', [$blogId]));
        }
    }
}

var DefaultComp = React.createClass({
getDefaultProps : function(){
    return {
        name : «Mike»
}
}
render : function(){
    return (
<h1>Hello {this.props.name}</h1>
)
}
});
var DefaultComp = React.createClass({
getDefaultProps : function(){
    return {
        name = «Mike»
}
},
render : function(){
    return (
<p>Hello {this.props.name}</p>
)
}
});
 var DefaultComp = React.createClass({
getDefaultProps : function(){
    return {
        name : «Mike»
}
},
render : function(){
    return (
<p>Hello {this.props.name}</p>
)
}
});
 var DefaultComp = React.createClass({
getDefaultProps : function(){
    return {
        name => «Mike»
}
},
render : function(){
    return (
<h1>Hello {this.props.name}</h1>
)
}
})