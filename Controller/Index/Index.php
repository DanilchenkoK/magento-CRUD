<?php
namespace Kirill\FirstModelCar\Controller\Index;

class Index implements \Magento\Framework\App\ActionInterface
{
	protected $_pageFactory; 

	public function __construct(\Magento\Framework\View\Result\PageFactory $pageFactory)
	{        
		$this->_pageFactory = $pageFactory;	
	}

	public function execute()
	{    
		return $this->_pageFactory->create();
	}
}