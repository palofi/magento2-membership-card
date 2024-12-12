<?php declare(strict_types=1);

namespace Dev\Grid\Model;

use Dev\Grid\Model\ResourceModel\MembershipCard as BaseMembershipCard;
use Magento\Framework\Model\AbstractModel;

class MembershipCard extends AbstractModel
{

    /** @noinspection MagicMethodsValidityInspection */
    protected function _construct()
    {
        $this->_init(BaseMembershipCard::class);
    }

}
