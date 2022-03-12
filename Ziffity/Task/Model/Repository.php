<?php

namespace Ziffity\Task\Model;

use Ziffity\Task\Api\RepositoryInterface;
use Ziffity\Task\Api\Data;
use Ziffity\Task\Model\ResourceModel\Custom as ResourceCustomCart;
use Ziffity\Task\Model\ResourceModel\Custom\CollectionFactory as CustomCartCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;



class Repository implements RepositoryInterface
{
   
    protected $resource;

   
    protected $customCartFactory;

    
    protected $customCartCollectionFactory;

   
    protected $searchResultsFactory;

   
    protected $dataObjectHelper;

   
    protected $dataObjectProcessor;

   
    protected $dataCustomCartFactory;

    
    private $collectionProcessor;

  

  
    public function __construct(
        ResourceCustomCart $resource,
        CustomFactory $customCartFactory,
        \Ziffity\Task\Api\Data\CustomInterfaceFactory $dataCustomCartFactory,
        CustomCartCollectionFactory $customCartCollectionFactory,
        Data\CartInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        CollectionProcessorInterface $collectionProcessor 
    ) {
        $this->resource = $resource;
        $this->customCartFactory = $customCartFactory;
        $this->customCartCollectionFactory = $customCartCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataCustomCartFactory = $dataCustomCartFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->collectionProcessor = $collectionProcessor; 
    }

   
    public function save(Data\CustomInterface $Cart)
    {
        
       try {
            $this->resource->save($Cart);
    
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $Cart;
    }

   
    public function getById($CartId)
    {
        $customCart = $this->customCartFactory->create();
        $this->resource->load($customCart, $CartId);
        if (!$customCart->getCustomCartId()) {
            throw new NoSuchEntityException(__(' "%1" ID doesn\'t exist.', $CartId));
        }
        return $customCart;
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
         $collection = $this->customCartCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setItems($collection->getItems());
        return  $searchResults ;
    }

    
    public function delete(Data\CustomInterface $Cart)
    {
        try {
            $this->resource->delete($Cart);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    
    public function deleteById($CartId)
    {
        return $this->delete($this->getById($CartId));
    }

  
}