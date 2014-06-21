<?php

namespace Tavs\Bundle\DataTableBundle;

use Tavs\Bundle\DataTableBundle\DependenceInjection\Compiler\AddColumnTypePass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class DataTableBundle
 * @package Tavs\Bundle\DataTableBundle
 */
class DataTableBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new AddColumnTypePass());
    }
}
