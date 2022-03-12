<?php 
namespace Ziffity\Task\Model\ResourceModel\Custom;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        
        $this->_init("Ziffity\Task\Model\Custom", "Ziffity\Task\Model\ResourceModel\Custom");
    }
}
?>