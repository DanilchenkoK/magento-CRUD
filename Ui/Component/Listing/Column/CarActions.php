<?php

namespace Kirill\FirstModelCar\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;


class CarActions extends Column
{
    const URL_PATH_FORM = 'cars/index/form';
    const URL_PATH_DELETE = 'cars/index/delete';
   
    private $urlBuilder;


    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
   
    public function prepareDataSource(array $dataSource)
    {
             
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                

                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => $this->urlBuilder->getUrl( 
                            $this::URL_PATH_FORM,
                            [
                                'id' => $item['id'],
                            ]),
                        'label' => __('Edit')
                    ],
                    'remove' => [
                        'href' => $this->urlBuilder->getUrl(
                            $this::URL_PATH_DELETE,
                            [
                                'id' => $item['id'],
                            ]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete '),
                            'message' => __('Are you sure you want to delete this car?'),
                        ]
                    ]                   
                ];
            }
        }

        return $dataSource;
    }
}