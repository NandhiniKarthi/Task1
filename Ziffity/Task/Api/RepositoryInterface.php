<?php
namespace Ziffity\Task\Api;
interface RepositoryInterface
{
    /**
     * Save Cart.
     *
     * @param \Ziffity\Task\Api\Data\CustomInterface $Cart
     * @return \Ziffity\Task\Api\Data\CustomInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\CustomInterface $Cart);

    /**
     * Retrieve Cart.
     *
     * @param string $CartId
     * @return \Ziffity\Task\Api\Data\CustomInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($CartId);

    /**
     * Retrieve customCarts matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Ziffity\Task\Api\Data\CartInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Cart.
     *
     * @param \Ziffity\Task\Api\Data\CustomInterface $Cart
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\CustomInterface $Cart);

    /**
     * Delete Cart by ID.
     *
     * @param string $CartId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($CartId);
}