<?php

namespace GuilleGF\Lifx\Domain\Product;

/**
 * Class Product
 * @package GuilleGF\Lifx\Domain\Product
 */
class Product
{
    /** @var string */
    private $name;
    /** @var string */
    private $identifier;
    /** @var string */
    private $company;
    /** @var Capabilities */
    private $capabilities;

    /**
     * Product constructor.
     * @param string $name
     * @param string $identifier
     * @param string $company
     */
    public function __construct(string $name, string $identifier, string $company, Capabilities $capabilities)
    {
        $this->name = $name;
        $this->identifier = $identifier;
        $this->company = $company;
        $this->capabilities = $capabilities;
    }
}
