<?php


namespace Nagoya\Mondai9\OutputFormatter;


interface OutputFormatterInterface
{
    /**
     * @param array $tree
     * @return string
     */
    public function format(array $tree);
}
