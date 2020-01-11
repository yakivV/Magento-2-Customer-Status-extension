<?php

namespace Yakov\CustomerStatus\Block;

class Status extends \Magento\Framework\View\Element\Template
{
    public function getSaveStatusUrl()
    {
        return $this->getUrl('yakov/status/save');
    }

    public function getBackUrl()
    {
        if ($this->getRefererUrl()) {
            return $this->getRefererUrl();
        }
        return $this->getUrl('customer/account/');
    }
}
