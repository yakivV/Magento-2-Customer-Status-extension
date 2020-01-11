<?php

namespace Yakov\CustomerStatus\Controller\Status;

use Magento\Customer\Model\Customer;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $customerSession;

    protected $formKeyValidator;

    protected $customerFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator,
        \Magento\Customer\Model\CustomerFactory $customerFactory
    ) {
        $this->formKeyValidator = $formKeyValidator;
        $this->customerSession = $customerSession;
        $this->customerFactory = $customerFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->formKeyValidator->validate($this->getRequest())) {
            return $this->_redirect('customer/account/');
        }

        $customerId = $this->customerSession->getCustomerId();
        $customerStatus = $this->getRequest()->getParam('customer_status');

        $customerModel = $this->customerFactory->create();
        $customerModel->load($customerId);

        try {
            $customerStatus = htmlspecialchars(trim($customerStatus), ENT_QUOTES);

            $customerModel->setCustomerStatus($customerStatus)->save();

            $this->messageManager->addSuccess(__('We have saved your status.'));
        } catch(\Exception $e) {
            $this->messageManager->addError(__('Something went wrong while saving your status.'));
        }
        
        $this->_redirect('yakov/customer/status');
    }
}
