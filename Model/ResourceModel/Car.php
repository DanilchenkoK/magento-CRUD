<?php
namespace Kirill\FirstModelCar\Model\ResourceModel;


class Car extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('kirill_firstmodelcar_car', 'id');
	}
	
}