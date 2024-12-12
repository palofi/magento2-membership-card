<?php

namespace Dev\Grid\Ui\DataProvider\MembershipCard\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
    /**
     *
     * @return void
     */
    protected function _initSelect()
    {
        $this->addFilterToMap('entity_id', 'main_table.entity_id');
        $this->addFilterToMap('name', 'devgridname.value');
        parent::_initSelect();

        $this->getSelect()->joinLeft(
            ['customer_entity' => $this->getTable('customer_entity')],
            'main_table.customer_id = customer_entity.entity_id',
            '*'
        );
        $this->addFilterToMap('firstname', 'customer_entity.firstname');
        $this->addFilterToMap('lastname', 'customer_entity.lastname');

    }
}
