<?php


namespace Nagoya\Mondai9\OutputFormatter;


class HtmlOutputFormatterTest extends AbstractOutputFormatterTestCase
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
}
