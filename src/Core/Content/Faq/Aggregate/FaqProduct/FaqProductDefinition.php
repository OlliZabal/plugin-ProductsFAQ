<?php declare(strict_types=1);


namespace ProductsFAQ\Core\Content\Faq\Aggregate\FaqProduct;

use ProductsFAQ\Core\Content\Faq\FaqDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\MappingEntityDefinition;

class FaqProductDefinition extends MappingEntityDefinition
{

    public function getEntityName(): string
    {
        return 'faq_product';
    }

    protected function defineFields(): FieldCollection
    {
        /*
         * @todo Create and return a field collection and define the entity fields. Following fields are required
         *
         * FkField faq_id -> PrimaryKey
         * FkField product_id -> PrimaryKey
         * ReferenceVersionField (ProductDefinition) -> PrimaryKey
         * ManyToOneAssociationField faq
         * ManyToOneAssociationField product
         * CreatedAtField
         *
         * Following fields should be required: reference_id, faq_id, product_id
         */

        return new FieldCollection([
            (new FkField('faq_id', 'faqId', FaqDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new FkField('product_id', 'productId', ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            (new ReferenceVersionField(ProductDefinition::class))->addFlags(new PrimaryKey(), new Required()),
            new ManyToOneAssociationField('faq', 'faq_id', FaqDefinition::class),
            new ManyToOneAssociationField('product', 'product_id', ProductDefinition::class),
            new CreatedAtField(),
        ]);
    }
}
