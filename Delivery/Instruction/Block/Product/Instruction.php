<?php
namespace Delivery\Instruction\Block\Product;

class Instruction extends \Magento\Framework\View\Element\Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        parent::__construct($context);
    }

    public function sayHello()
    {
        return __('Hello World');
    }
}