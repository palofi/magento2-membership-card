<?php declare(strict_types=1);

namespace Dev\Grid\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpDeleteActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class MassDelete extends Action implements HttpDeleteActionInterface
{

    public function execute(): ResponseInterface|ResultInterface
    {


        var_dump("XXX ide");
        die;
    }
}
