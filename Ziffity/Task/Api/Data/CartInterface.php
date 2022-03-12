<?php

namespace Ziffity\Task\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * CartInterface interface
 */
interface CartInterface extends SearchResultsInterface
{
    /**
     * Get Cart list.
     *
     * @return \Ziffity\Task\Api\Data\CustomInterface[]
     */
    public function getItems();

    /**
     * Set Cart list.
     *
     * @param \Ziffity\Task\Api\Data\CustomInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}