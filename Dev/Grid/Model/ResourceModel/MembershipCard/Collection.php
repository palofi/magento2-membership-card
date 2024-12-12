<?php declare(strict_types=1);

namespace Dev\Grid\Model\ResourceModel\MembershipCard;

use Dev\Grid\Model\MembershipCard as ModelMembershipCard;
use Dev\Grid\Model\ResourceModel\MembershipCard;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /** @noinspection MagicMethodsValidityInspection */
    protected function _construct()
    {
        $this->_init(ModelMembershipCard::class, MembershipCard::class);
    }
}
