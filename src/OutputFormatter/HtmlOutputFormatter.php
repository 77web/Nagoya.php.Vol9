<?php


namespace Nagoya\Mondai9\OutputFormatter;


use Nagoya\Mondai9\Entity\Element;

class HtmlOutputFormatter implements OutputFormatterInterface
{
    public function format(array $tree)
    {
        return $this->formatChildren($tree);
    }

    private function formatElement(Element $element)
    {
        return sprintf('<li>%s</li>', $element->caption.$this->formatChildren($element->children));
    }

    private function formatChildren(array $elements)
    {
        $output = '';
        if (0 !== count($elements)) {
            $output .= '<ul>';
            foreach ($elements as $element) {
                $output .= $this->formatElement($element);
            }
            $output .= '</ul>';
        }

        return $output;
    }
}
