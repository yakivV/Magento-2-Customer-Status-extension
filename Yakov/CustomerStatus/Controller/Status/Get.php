<?php

namespace Yakov\CustomerStatus\Controller\Status;

use Magento\Framework\App\RequestInterface;

class Get extends \Magento\Framework\App\Action\Action
{
    protected $customerSession;

    protected $customerFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Customer\Model\CustomerFactory $customerFactory
    ) {
        $this->customerSession = $customerSession;
        $this->customerFactory = $customerFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        if ($this->customerSession->isLoggedIn()) {
            $customerModel = $this->customerFactory->create();
            $customerModel->load($this->customerSession->getCustomerId());

            echo htmlspecialchars_decode($customerModel->getCustomerStatus(), ENT_QUOTES);
            exit;
        }

        echo '';
        exit;
    }
}
