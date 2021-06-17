<?php

namespace Kirill\FirstModelCar\Controller\Adminhtml\Index;



class Delete extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;

	public function __construct(		
		\Kirill\FirstModelCar\Model\CarFactory $carFactory,
		\Kirill\FirstModelCar\Model\ResourceModel\Car $carResource,
		\Magento\Framework\App\RequestInterface $request,
		\Magento\Framework\Message\ManagerInterface  $messageManager,
	    \Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
		$this->messageManager = $messageManager;
		$this->request = $request;
		$this->carFactory =$carFactory;
		$this->carResource = $carResource;
	}

	public function execute()
	{ 	
		
		if($id = $this->request->getParam('id')){
			try {			
				$car = $this->carFactory->create();						
				$this->carResource->load($car, $id);	
				$this->carResource->delete($car);
				$this->messageManager->addSuccessMessage(__('Successfully deleted'));
				
			}catch (\Magento\Framework\Exception\NoSuchEntityException $th) {
				$this->messageManager->addErrorMessage($th->getMessage());			
			}catch(\Exception $th){
				$this->messageManager->addErrorMessage($th->getMessage());			
			}
				
		}	
		$resultPage = $this->resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend(__('Cars'));	

		return $resultPage;
	}
}