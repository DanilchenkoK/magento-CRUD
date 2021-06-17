<?php
namespace Kirill\FirstModelCar\Block;
class Car extends \Magento\Framework\View\Element\Template
{
    private   $request;   
    private   $carFactory;  
    private   $carResource; 

    public function __construct( 
        \Magento\Framework\App\RequestInterface $request,     
        \Kirill\FirstModelCar\Model\CarFactory $carFactory,  
        \Kirill\FirstModelCar\Model\ResourceModel\Car $carResource,  
        \Magento\Framework\View\Element\Template\Context $context
    )
    {
        $this->carResource = $carResource;
        $this->carFactory = $carFactory;
        $this->request = $request;
        parent::__construct($context);
    }

    public function getCollectionCars()
    {
        $car =  $this->carFactory->create();	
        $collection = $car->getCollection();	
        return $collection;
    }

    public function getEntity()
    {
        $car = $this->carFactory->create();	
        if($id = $this->request->getParam('id')){           	
			$this->carResource->load($car, $id);	
        }
        return $car;        
    }

}