<?php
namespace Kirill\FirstModelCar\Model\ResourceModel\Car;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'kirill_firstmodelcar_car_collection';
	protected $_eventObject = 'car_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Kirill\FirstModelCar\Model\Car', 'Kirill\FirstModelCar\Model\ResourceModel\Car');
	}

}
