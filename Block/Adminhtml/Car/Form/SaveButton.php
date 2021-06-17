<?php

namespace Kirill\FirstModelCar\Block\Adminhtml\Car\Form;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;


class SaveButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [                                
                                'targetName' => 'cars_form.cars_form',
                                'actionName' => 'save'
                            ]
                        ]
                    ]
                ]
            ]            
        ];
    }

}
