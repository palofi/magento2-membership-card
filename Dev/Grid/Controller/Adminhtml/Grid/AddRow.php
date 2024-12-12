<?php declare(strict_types=1);

namespace Dev\Grid\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Registry;

class AddRow extends Action
{
    /**
     * @var Registry
     */
    private $coreRegistry;


    /**
     * @param Context $context
     * @param Registry $coreRegistry,

     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;

    }

    /**
     * Mapped Grid List page.
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('id');

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Row Data ').$rowId : __('Add Row Data');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }
}
