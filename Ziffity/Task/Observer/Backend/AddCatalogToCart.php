<?php
 namespace Task\Ziffity\Observer\Backend;
 use Magento\Catalog\Model\Product;
 use Magento\Framework\Event\Observer;
 use Magento\Framework\Event\ObserverInterface;


 class AddCatalogToCart implements ObserverInterface
 {
    public function __construct(
        \Magento\Framework\Message\ManagerInterface $message,
        \Magento\Checkout\Model\Session $session,
        \Ziffity\Task\Model\Custom $Cart,
        \Ziffity\Task\Model\Repository $Repository
        )
        {
            $this->_checkoutSession=$session;
            $this->Cart = $Cart;
        $this->Repository = $Repository;
        }
     public function execute(Observer $observer)
     {
         $sku = $observer->getEvent()->getData('product')->getSku();
         $quote = $this->_checkoutSession->getQuote();
         $this->Cart->setSku($sku);
         $this->Cart->setQuoteId($quote->getId());
         $this->Cart->setCustomerId($quote->getCustomerId());
         $this->Repository->save($this->Cart);
         
         
        
     }
    
 }
