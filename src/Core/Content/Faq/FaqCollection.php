<?php declare(strict_types=1);

namespace ProductsFAQ\Core\Content\Faq;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;


/**
 * @method void               add(FaqEntity $entity)
 * @method void               set(string $key, FaqEntity $entity)
 * @method FaqEntity[]    getIterator()
 * @method FaqEntity[]    getElements()
 * @method FaqEntity|null get(string $key)
 * @method FaqEntity|null first()
 * @method FaqEntity|null last()
 */

class FaqCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return FaqEntity::class;
    }
}
