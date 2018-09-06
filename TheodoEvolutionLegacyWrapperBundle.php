<?php

namespace Theodo\Evolution\Bundle\LegacyWrapperBundle;

use Composer\Autoload\ClassLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Theodo\Evolution\Bundle\LegacyWrapperBundle\DependencyInjection\Compiler\KernelConfigurationPass;
use Theodo\Evolution\Bundle\LegacyWrapperBundle\DependencyInjection\Compiler\LoaderInjectorPass;
use Theodo\Evolution\Bundle\LegacyWrapperBundle\DependencyInjection\Compiler\ReplaceRouterPass;

class TheodoEvolutionLegacyWrapperBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new LoaderInjectorPass());
        $container->addCompilerPass(new KernelConfigurationPass());
        $container->addCompilerPass(new ReplaceRouterPass());
    }
}
