<?php declare(strict_types=1);

namespace ProductsFAQ\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\InheritanceUpdaterTrait;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1623508153Faq extends MigrationStep
{
    use InheritanceUpdaterTrait;
    public function getCreationTimestamp(): int
    {
        return 1623508153;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement('
            CREATE TABLE IF NOT EXISTS `faq` (
              `id` BINARY(16) NOT NULL,
              `question` TEXT(65535) NOT NULL,
              `answer` TEXT(65535) NOT NULL,
              `created_at` DATETIME(3) NOT NULL,
              `updated_at` DATETIME(3) NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');


        $connection->executeStatement('
            CREATE TABLE IF NOT EXISTS `faq_product` (
              `faq_id` BINARY(16) NOT NULL,
              `product_id` BINARY(16) NOT NULL,
              `product_version_id` BINARY(16) NOT NULL,
              `created_at` DATETIME(3) NOT NULL,
              PRIMARY KEY (`faq_id`, `product_id`, `product_version_id`),
              CONSTRAINT `fk.faq_product.faq_id` FOREIGN KEY (`faq_id`)
                REFERENCES `faq` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
              CONSTRAINT `fk.faq_product.product_id__product_version_id` FOREIGN KEY (`product_id`, `product_version_id`)
                REFERENCES `product` (`id`, `version_id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');

        $this->updateInheritance($connection, 'product', 'faqs');
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
