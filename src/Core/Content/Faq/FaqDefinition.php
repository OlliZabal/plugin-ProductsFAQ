<?php declare(strict_types=1);

namespace ProductsFAQ\Core\Content\Faq;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class FaqDefinition extends EntityDefinition
{

    public function getEntityName(): string
    {
        return 'faq';
    }

    public function getEntityClass(): string
    {
        return FaqEntity::class;
    }

    public function getCollectionClass(): string
    {
        return FaqCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        /**
         * uuid IdField -> primary, required
         * question LongTextField -> required
         * answer LongTextField -> required
         * ManyToManyAssociationField (optional because we can add it to products later)
         */

        return new FieldCollection([
            (new IdField('id','id'))->addFlags(new Required(), new PrimaryKey()),

            (new LongTextField('question','question'))->addFlags(new Required()),

            (new LongTextField('answer', 'answer'))->addFlags(new Required()),

            new ManyToManyAssociationField('products', ProductDefinition::class, FaqDefinition::class, 'faq_id', 'product_id')
        ]);
    }
}
