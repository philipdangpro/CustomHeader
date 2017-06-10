<?php
namespace Foo\Customer\Plugin\View\Result;

use Magento\Framework\View\Result\Page as MagentoPage;

class Page 
{
    /**
     * Customer session
     *
     * @var \Magento\Framework\App\Http\Context
     */
    protected $httpContext;
    
	/**
	 * 
	 * @param \Magento\Framework\App\Http\Context $httpContext
	 */ 
    public function __construct(
    	\Magento\Framework\App\Http\Context $httpContext
    ) {
        $this->httpContext = $httpContext;
    }


    /**
     * Add default handle
     *
     * @return $this
     */
	
    public function beforeAddDefaultHandle(MagentoPage $page)
    {
    	if($this->httpContext->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH)){
    		$page->addHandle('customer_logged_in');
    	} else {
    		$page->addHandle('customer_logged_out');
    	}
    	
    }

}