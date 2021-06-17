<?php
namespace Kirill\FirstModelCar\Controller\Adminhtml\Index;
 
use Magento\Framework\Controller\ResultFactory;
 
class Form extends \Magento\Backend\App\Action
{

    public function execute()
    {        
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}