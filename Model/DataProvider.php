<?php

namespace Kirill\FirstModelCar\Model;
 
use Kirill\FirstModelCar\Model\ResourceModel\Car\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{  
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $carCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = [],
        PoolInterface $pool = null
    ) {
        $this->collection = $carCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
    }
 
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {    
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();      
        foreach ($items as $item) {
            $this->loadedData[$item->getId()] = $item->getData();
        }
      
        if (!empty($data)) {
            $car = $this->collection->getNewEmptyItem();
            $car->setData($data);
            $this->loadedData[$car->getId()] = $car->getData();          
        }

        return $this->loadedData;        
    }
}