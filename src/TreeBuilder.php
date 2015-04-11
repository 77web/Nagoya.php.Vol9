<?php


namespace Nagoya\Mondai9;


class TreeBuilder
{
    /**
     * @param \Nagoya\Mondai9\Entity\Element[] $elementList
     * @return \Nagoya\Mondai9\Entity\Element[]
     */
    public function build(array $elementList)
    {
        // elementsのkeyをidにする
        $elements = [];
        foreach ($elementList as $element) {
            $elements[$element->id] = $element;
        }

        $tree = [];
        foreach ($elements as $element) {
            if ($element->parentId == 0) {
                $tree[] = $element;
            } else {
                $elements[$element->parentId]->children[] = $element;
            }
        }

        return $tree;
    }
}
