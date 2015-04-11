<?php


namespace Nagoya\Mondai9\Entity;


class Element
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $caption;

    /**
     * @var int
     */
    public $parentId;

    /**
     * @var Element
     */
    public $parent;

    /**
     * @var Element[]
     */
    public $children;

    public function __construct()
    {
        $this->children = [];
    }
}
