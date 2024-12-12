<?php declare(strict_types=1);

namespace Dev\Grid\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Index extends Action implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    private $pageFactory;


    private $membershipCardFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PageFactory $rawFactory
     */
    public function __construct(
        Context $context,
        PageFactory $rawFactory
    ) {
        $this->pageFactory = $rawFactory;

        parent::__construct($context);
    }

    /**
     * Add the main Admin Grid page
     *
     * @return Page
     */
    public function execute(): Page
    {

        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('Dev_Grid::membership_card');
        $resultPage->getConfig()->getTitle()->prepend(__('Membership Cards'));

        return $resultPage;
    }
}
