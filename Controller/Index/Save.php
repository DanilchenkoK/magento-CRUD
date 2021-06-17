<?php
namespace Kirill\FirstModelCar\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Save implements \Magento\Framework\App\ActionInterface
{
    private $resultFactory;
    private $carFactory;
    private $carResource;
    private $request;
    private $messageManager;

    public function __construct(
        ResultFactory $resultFactory,
        \Kirill\FirstModelCar\Model\CarFactory $carFactory,
        \Kirill\FirstModelCar\Model\ResourceModel\Car $carResource,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\Message\ManagerInterface $messageManager){
            $this->resultFactory = $resultFactory;
            $this->carFactory = $carFactory;
            $this->carResource = $carResource;
            $this->request = $request;
            $this->messageManager = $messageManager;
    }

    public function execute()
    {
        $data = $this->request->getParams();         
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
      
        try {          
            $car = $this->carFactory->create();	
            if(isset($data['id'])){
                $this->carResource->load($car, $data['id']);	 
            }     
            $car->setName($data['name']);
            $car->setColor($data['color']);
            $car->setEngine($data['engine']);
            $car->setBodyType($data['body_type']);

            $this->carResource->save($car);
            $this->messageManager->addSuccessMessage(__('Saved success'));
        } catch (\Exception $ex) {
            $this->messageManager->addErrorMessage($ex->getMessage());           
        }

        return $resultRedirect->setUrl('/cars');
    }
  
}