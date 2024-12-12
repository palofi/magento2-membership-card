<?php

namespace Dev\Grid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class MembershipCard extends AbstractDb
{

    /** @noinspection MagicMethodsValidityInspection */
    protected function _construct()
    {
        $this->_init('membership_cards_entity', 'entity_id');
    }
}
