<?php
namespace Kirill\FirstModelCar\Controller\Index;
use Magento\Framework\Controller\ResultFactory;
class Delete implements \Magento\Framework\App\ActionInterface
{	
	private $resultFactory;
	private $messageManager;
	private $request;
	private $carFactory;
	private $carResource;

	public function __construct(
	ResultFactory $resultFactory,
	\Kirill\FirstModelCar\Model\CarFactory $carFactory,
	\Kirill\FirstModelCar\Model\ResourceModel\Car $carResource,
	\Magento\Framework\App\RequestInterface $request,
	\Magento\Framework\Message\ManagerInterface  $messageManager)
	{        
		$this->resultFactory = $resultFactory;
		$this->messageManager = $messageManager;
		$this->request = $request;
		$this->carFactory =$carFactory;
		$this->carResource = $carResource;
	}

	public function execute()
	{  
	
		$resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        try {
			$id = $this->request->getParam('id');
			$car = $this->carFactory->create();	
				
			$this->carResource->load($car, $id);	
			$this->carResource->delete($car);
			$this->messageManager->addSuccessMessage(__('Successfully deleted'));
			
		} catch (\Magento\Framework\Exception\NoSuchEntityException $th) {
			$this->messageManager->addErrorMessage($th->getMessage());			
		}

		return $resultRedirect->setUrl('/cars');		
	}
}