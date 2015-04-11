<?php


namespace Nagoya\Mondai9\OutputFormatter;


use Nagoya\Mondai9\Entity\Element;

class CliOutputFormatter implements OutputFormatterInterface
{
    public function format(array $tree)
    {
        return $this->formatChildren($tree);
    }

    /**
     * @param Element $element
     * @param int $indent
     * @return string
     */
    private function formatElement(Element $element, $indent = 0)
    {
        return str_repeat(' ', $indent * 2).sprintf('* %s', $element->caption)."\n".$this->formatChildren($element->children, $indent + 1);
    }

    /**
     * @param Element[] $elements
     * @param int $indent
     * @return string
     */
    private function formatChildren(array $elements, $indent = 0)
    {
        $output = '';
        foreach ($elements as $element) {
            $output .= $this->formatElement($element, $indent);
        }

        return $output;
    }
}
