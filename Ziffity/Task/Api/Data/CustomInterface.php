<?php

namespace Ziffity\Task\Api\Data;

/**
 * CustomCartInterface interface
 */
interface CustomInterface
{

    const CUSTOMCART_ID         = 'id';
    const SKU                   = 'sku';
    const CUSTOMER_ID           = 'customerid';
    const QUOTE_ID              = 'quoteid';
    const CREATED_AT            = 'createdat';
    
    /**
     * GetCustomCartId
     *
     * @return int|null
     */
    public function getCustomCartId();

    /**
     * Set CustomCart Id
     *
     * @param  [int] $customcart_id
     * @return CustomInterface
     */
    public function setCustomCartId($customcart_id);

    /**
     * Get Sku
     *
     * @return string
     */
    public function getSku();

    /**
     * Set Sku
     *
     * @param  [string] $sku
     * @return CustomCartInterface
     */
    public function setSku($sku);

    /**
     * Get Customer Id
     *
     * @return int
     */
    public function getCustomerId();

    /**
     * Set Customer Id
     *
     * @param  [int] $customer_id
     * @return CustomCartInterface
     */
    public function setCustomerId($customer_id);

    /**
     * Get Quote Id
     *
     * @return string
     */
    public function getQuoteId();

    /**
     * Undocumented function
     *
     * @param  [string] $quote_id
     * @return CustomCartInterface
     */
    public function setQuoteId($quote_id);

    /**
     * Get Created At 
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * Set Created At
     *
     * @param  [type] $created_at
     * @return CustomCartInterface
     */
    public function setCreatedAt($created_at);
}
?>
