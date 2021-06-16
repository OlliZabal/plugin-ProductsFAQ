<?php declare(strict_types=1);

namespace ProductsFAQ\Storefront\Page\Product\Subscriber;

use Shopware\Storefront\Page\Product\ProductPageCriteriaEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductPageCriteriaSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            ProductPageCriteriaEvent::class => 'onProductCriteriaLoaded',
        ];
    }

    public function onProductCriteriaLoaded(ProductPageCriteriaEvent $event): void
    {
        $event->getCriteria()->addAssociation('faqs.products.cover');
    }
}
