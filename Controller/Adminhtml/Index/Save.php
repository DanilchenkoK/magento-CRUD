<?php

namespace Kirill\FirstModelCar\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
	private $resultPageFactory;
    private $request;
	private $carFactory;
	private $carResource;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Kirill\FirstModelCar\Model\CarFactory $carFactory,
		\Kirill\FirstModelCar\Model\ResourceModel\Car $carResource,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\App\RequestInterface $request)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
        $this->request =$request;
		$this->carFactory = $carFactory;
		$this->carResource = $carResource;
	}

	public function execute()
	{   
    
		try {

			$params = $this->request->getParams();
			$car = $this->carFactory->create();
	
			if(isset($params['id']) and !empty($params['id'])){
				$this->carResource->load($car, $params['id']);	
			}
			
			$car->setName($params['name']);
			$car->setColor($params['color']);
			$car->setEngine($params['engine']);
			$car->setBodyType($params['body_type']);

			$this->carResource->save($car);
			$this->messageManager->addSuccessMessage(__('Saved success'));

		} catch (\Exception $th) {
			$this->messageManager->addErrorMessage($th->getMessage());
		} finally {
			$resultPage = $this->resultPageFactory->create();
			$resultPage->getConfig()->getTitle()->prepend((__('Cars')));
			return $resultPage;
		}    


		
	}
}