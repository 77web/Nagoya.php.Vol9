<?php


namespace Nagoya\Mondai9;


use Nagoya\Mondai9\OutputFormatter\CliOutputFormatter;
use Nagoya\Mondai9\OutputFormatter\HtmlOutputFormatter;

class AppTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $data
     * @param string $expectedOutputPath
     * @dataProvider provideData
     */
    public function test_html(array $data, $expectedOutputPath)
    {
        $app = new App(new ElementFactory(), new TreeBuilder());
        $app->setOutputFormatter(new HtmlOutputFormatter());
        $output = $app->run($data);

        $this->assertEqualsFile($expectedOutputPath.'_html_output.txt', $output, true);
    }

    /**
     * @param array $data
     * @param string $expectedOutputPath
     * @dataProvider provideData
     */
    public function test_cli(array $data, $expectedOutputPath)
    {
        $app = new App(new ElementFactory(), new TreeBuilder());
        $app->setOutputFormatter(new CliOutputFormatter());
        $output = $app->run($data);

        $this->assertEqualsFile($expectedOutputPath.'_cli_output.txt', $output);
    }

    /**
     * @param string $expectPath
     * @param string $content
     * @param bool $ignoreIndent
     */
    private function assertEqualsFile($expectPath, $content, $ignoreIndent = false)
    {
        $expect = file_get_contents(__DIR__.'/data/'.$expectPath);
        if ($ignoreIndent) {
            $expect = preg_replace('/[\r\n]+\s*/u', '', $expect);
        }

        $this->assertEquals($expect, $content);
    }

    public function provideData()
    {
        $data1 = [
            [
                'id' => 1,
                'parent_id' => 0,
                'value' => '親1',
            ],
            [
                'id' => 2,
                'parent_id' => 0,
                'value' => '親2',
            ],
            [
                'id' => 3,
                'parent_id' => 1,
                'value' => '子1-1',
            ],
            [
                'id' => 4,
                'parent_id' => 1,
                'value' => '子1-2',
            ],
            [
                'id' => 5,
                'parent_id' => 2,
                'value' => '子2-1',
            ],
        ];
        $data2 = [
            [
                'id' => 1,
                'parent_id' => 0,
                'value' => '親1',
            ],
            [
                'id' => 2,
                'parent_id' => 0,
                'value' => '親2',
            ],
            [
                'id' => 3,
                'parent_id' => 1,
                'value' => '子1-1',
            ],
            [
                'id' => 4,
                'parent_id' => 1,
                'value' => '子1-2',
            ],
            [
                'id' => 5,
                'parent_id' => 2,
                'value' => '子2-1',
            ],
            [
                'id' => 6,
                'parent_id' => 4,
                'value' => '孫1-2-1',
            ],
            [
                'id' => 7,
                'parent_id' => 3,
                'value' => '孫1-1-1',
            ],
            [
                'id' => 8,
                'parent_id' => 7,
                'value' => 'ひ孫1-1-1-1',
            ],
            [
                'id' => 9,
                'parent_id' => 5,
                'value' => '孫2-1-1',
            ],
            [
                'id' => 10,
                'parent_id' => 5,
                'value' => '孫2-1-2',
            ],
            [
                'id' => 11,
                'parent_id' => 2,
                'value' => '子2-2',
            ],
            [
                'id' => 12,
                'parent_id' => 4,
                'value' => '孫1-2-2',
            ],
            [
                'id' => 13,
                'parent_id' => 9,
                'value' => 'ひ孫2-1-1-1',
            ],
            [
                'id' => 14,
                'parent_id' => 5,
                'value' => '孫2-1-3',
            ],
            [
                'id' => 15,
                'parent_id' => 2,
                'value' => '子2-3',
            ],
        ];

        return [
            [$data1, 'data1'],
            [$data2, 'data2'],
        ];
    }
}
