<?php 
namespace Ziffity\Task\Model\ResourceModel;

class Custom extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    protected function _construct()
    {

        $this->_init("crud_data", "id");
    }

}
?>