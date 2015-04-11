<?php

namespace Nagoya\Mondai9;

use Nagoya\Mondai9\OutputFormatter\OutputFormatterInterface;

class App
{
    /**
     * @var ElementFactory
     */
    private $elementFactory;

    /**
     * @var TreeBuilder
     */
    private $treeBuilder;

    /**
     * @var OutputFormatterInterface
     */
    private $outputFormatter;

    /**
     * @param ElementFactory $factory
     * @param TreeBuilder $builder
     */
    public function __construct(ElementFactory $factory, TreeBuilder $builder)
    {
        $this->elementFactory = $factory;
        $this->treeBuilder = $builder;
    }

    /**
     * @param OutputFormatterInterface $formatter
     */
    public function setOutputFormatter(OutputFormatterInterface $formatter)
    {
        $this->outputFormatter = $formatter;
    }

    public function run(array $configuration)
    {
        $elements = [];
        foreach ($configuration as $config) {
            $elements[] = $this->elementFactory->create($config);
        }

        $tree = $this->treeBuilder->build($elements);

        return $this->outputFormatter->format($tree);
    }
}
