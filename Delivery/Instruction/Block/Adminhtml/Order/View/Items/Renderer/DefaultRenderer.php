<?php

namespace Delivery\Instruction\Block\Adminhtml\Order\View\Items\Renderer;

use Magento\Sales\Model\Order\Item;

class DefaultRenderer extends \Magento\Sales\Block\Adminhtml\Order\View\Items\Renderer\DefaultRenderer
{
    protected $_messageHelper;

    protected $_checkoutHelper;

    protected $_giftMessage = [];

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry,
        \Magento\CatalogInventory\Api\StockConfigurationInterface $stockConfiguration,
        \Magento\Framework\Registry $registry,
        \Magento\GiftMessage\Helper\Message $messageHelper,
        \Magento\Checkout\Helper\Data $checkoutHelper,
        array $data = []
    ) {
        parent::__construct($context, $stockRegistry, $stockConfiguration, $registry, $messageHelper, $checkoutHelper, $data);
    }

    // Function to get delivery instruction from oder item details
    public function getDeliveryInstruction()
    {
        $array = $this->getItem()->getProductOptions();
        if(array_key_exists('info_buyRequest', $array)){
            if(array_key_exists('delivery_instruction', $array['info_buyRequest'])){
                return $array['info_buyRequest']['delivery_instruction'];
            }   
        }
        return '';
    }    
}
