<?php

namespace Yakov\CustomerStatus\Block;

class HeaderStatus extends \Magento\Framework\View\Element\Template
{
    public function getCustomerStatusUrl()
    {
        return $this->getUrl('yakov/status/get');
    }
}
