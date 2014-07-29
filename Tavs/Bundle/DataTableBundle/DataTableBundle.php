<?php

namespace Tavs\Bundle\DataTableBundle;

use Tavs\Bundle\DataTableBundle\DependencyInjection\Compiler\AddColumnTypePass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Tavs\Bundle\DataTableBundle\DependencyInjection\Compiler\AddDataTableTypePass;
use Tavs\Bundle\DataTableBundle\DependencyInjection\Compiler\AddTwigResourcePass;

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
        $container->addCompilerPass(new AddDataTableTypePass());
        $container->addCompilerPass(new AddTwigResourcePass());
    }
}
