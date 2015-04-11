<?php


namespace Nagoya\Mondai9;


use Nagoya\Mondai9\Entity\Element;

class TreeBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function test_build()
    {
        $element1 = $this->createElement(1);
        $element2 = $this->createElement(2, 1);
        $element3 = $this->createElement(3, 2);
        $element4 = $this->createElement(4);
        $element5 = $this->createElement(5, 1);

        $elements = [$element1, $element2, $element3, $element4, $element5];

        $builder = new TreeBuilder();
        $tree = $builder->build($elements);

        $this->assertCount(2, $tree, '2 root elements');
        $expectedRootIds = [1, 4];
        $actualRootIds = [];
        foreach ($tree as $rootElement) {
            $actualRootIds[] = $rootElement->id;
        }
        $this->assertEquals($expectedRootIds, $actualRootIds, 'rootIds='.implode(',', $expectedRootIds));
        $this->assertChildrenIds([2, 5], $tree[0]);
        $this->assertChildrenIds([3], $tree[0]->children[0]);
    }

    private function createElement($id, $parentId = 0)
    {
        $element = new Element();
        $element->id = $id;
        $element->parentId = $parentId;

        return $element;
    }

    protected function assertChildrenIds(array $expectedIds, Element $element)
    {
        $actualIds = [];
        foreach ($element->children as $childElement) {
            $actualIds[] = $childElement->id;
        }

        $this->assertEquals($expectedIds, $actualIds, 'id='.$element->id.'children_ids='.implode(',', $expectedIds));
    }
}
