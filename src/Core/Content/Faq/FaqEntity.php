<?php declare(strict_types=1);

namespace ProductsFAQ\Core\Content\Faq;

use Shopware\Core\Content\Product\ProductCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class FaqEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $question;

    /**
     * @var string
     */
    protected $answer;

    /**
     * @var ProductCollection|null
     */
    protected $products;

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param string $question
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     */
    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
    }

    /**
     * @return ProductCollection|null
     */
    public function getProducts(): ?ProductCollection
    {
        return $this->products;
    }

    /**
     * @param ProductCollection|null $products
     */
    public function setProducts(?ProductCollection $products): void
    {
        $this->products = $products;
    }


}
