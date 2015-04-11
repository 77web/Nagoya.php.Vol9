<?php


namespace Nagoya\Mondai9\OutputFormatter;

use Nagoya\Mondai9\Entity\Element;

abstract class AbstractOutputFormatterTestCase extends \PHPUnit_Framework_TestCase
{
    abstract public function test_format();

    /**
     * @param int $id
     * @param array $childrenIds
     * @return Element
     */
    protected function createElement($id, $childrenIds = [])
    {
        $element = new Element();
        $element->id = $id;
        $element->caption = 'element'.$id;
        foreach ($childrenIds as $childrenId) {
            $element->children[] = $this->createElement($childrenId);
        }

        return $element;
    }
}
