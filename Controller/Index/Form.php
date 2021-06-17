<?php
namespace Kirill\FirstModelCar\Controller\Index;

class Form implements \Magento\Framework\App\ActionInterface
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