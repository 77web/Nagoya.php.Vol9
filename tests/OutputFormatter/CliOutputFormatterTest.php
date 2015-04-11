<?php


namespace Nagoya\Mondai9\OutputFormatter;


class CliOutputFormatterTest extends AbstractOutputFormatterTestCase
{
    public function test_format()
    {
        $element1 = $this->createElement(1);
        $element2 = $this->createElement(2, [3,4]);
        $tree = [$element1, $element2];

        $formatter = new CliOutputFormatter();
        $output = $formatter->format($tree);

        $this->assertContains("* element1", $output);
        $this->assertContains("* element2\n  * element3\n  * element4\n", $output);
    }
}
