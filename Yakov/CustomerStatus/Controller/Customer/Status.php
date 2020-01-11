<?php

namespace Yakov\CustomerStatus\Controller\Customer;

use Magento\Framework\App\RequestInterface;

class Status extends \Magento\Framework\App\Action\Action
{
    protected $customerSession;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\Session $customerSession
    ) {
        $this->customerSession = $customerSession;
        parent::__construct($context);
    }

    public function dispatch(RequestInterface $request)
    {
        $loginUrl = $this->_objectManager->get(\Magento\Customer\Model\Url::class)->getLoginUrl();

        if (!$this->customerSession->authenticate($loginUrl)) {
            $this->_actionFlag->set('', self::FLAG_NO_DISPATCH, true);
        }
        return parent::dispatch($request);
    }

    public function execute()
    {
        $this->_view->loadLayout();
        if ($block = $this->_view->getLayout()->getBlock('yakov_customerstatus_status')) {
            $block->setRefererUrl($this->_redirect->getRefererUrl());
        }
        $this->_view->getPage()->getConfig()->getTitle()->set(__('My Status'));
        $this->_view->renderLayout();
    }
}
