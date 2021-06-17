<?php
namespace Kirill\FirstModelCar\Model;
class Car extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'kirill_firstmodelcar_car';

	protected $_cacheTag = 'kirill_firstmodelcar_car';

	protected $_eventPrefix = 'kirill_firstmodelcar_car';

	protected function _construct()
	{
		$this->_init('Kirill\FirstModelCar\Model\ResourceModel\Car');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];
		return $values;
	}
}