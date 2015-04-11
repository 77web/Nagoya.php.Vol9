<?php


namespace Nagoya\Mondai9;


use Nagoya\Mondai9\Entity\Element;

class ElementFactory
{
    public function create(array $config)
    {
        $element = new Element();
        $element->id = $config['id'];
        $element->caption = $config['value'];
        $element->parentId = $config['parent_id'];

        return $element;
    }
}
