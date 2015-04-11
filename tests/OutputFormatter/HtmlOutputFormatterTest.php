<?php


namespace Nagoya\Mondai9\OutputFormatter;


use Nagoya\Mondai9\Entity\Element;

class HtmlOutputFormatterTest extends \PHPUnit_Framework_TestCase
{
    public function test_format()
    {
        $element1 = $this->createElement(1);
        $element2 = $this->createElement(2, [3,4]);
        $tree = [$element1, $element2];

        $formatter = new HtmlOutputFormatter();
        $output = $formatter->format($tree);

        $this->assertContains('<li>element1</li>', $output);
        $this->assertContains('<li>element2<ul><li>element3</li><li>element4</li></ul></li>', $output);
    }

    private function createElement($id, $childrenIds = [])
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
