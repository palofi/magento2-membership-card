<?php


namespace Dev\Grid\Plugin;

use Dev\Grid\Ui\DataProvider\MembershipCard\MembershipCardDataProvider;
use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Framework\App\ProductMetadataInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class AddAttributesToUiDataProvider
{
    /** @var AttributeRepositoryInterface */
    private $attributeRepository;

    /** @var ProductMetadataInterface */
    private $productMetadata;

    /**
     * Constructor
     *
     * @param AttributeRepositoryInterface $attributeRepository
     * @param ProductMetadataInterface $productMetadata
     */
    public function __construct(
        AttributeRepositoryInterface $attributeRepository,
        ProductMetadataInterface $productMetadata
    ) {
        $this->attributeRepository = $attributeRepository;
        $this->productMetadata = $productMetadata;
    }

    /**
     * Get Search Result after plugin
     *
     * @param MembershipCardDataProvider $subject
     * @param SearchResult $result
     * @return SearchResult
     */
    public function afterGetSearchResult(MembershipCardDataProvider $subject, SearchResult $result)
    {
        if ($result->isLoaded()) {
            return $result;
        }

        $edition = $this->productMetadata->getEdition();

        $column = 'entity_id';

        if ($edition == 'Enterprise') {
            $column = 'row_id';
        }

        $attribute = $this->attributeRepository->get('catalog_category', 'name');

        $result->getSelect()->joinLeft(
            ['membersip' => $attribute->getBackendTable()],
            'membersip.' . $column . ' = main_table.' . $column . ' AND membersip.attribute_id = '
            . $attribute->getAttributeId(),
            ['name' => 'membersip.value']
        );

        $result->getSelect()->where('membersip.value LIKE "B%"');



        return $result;
    }
}
