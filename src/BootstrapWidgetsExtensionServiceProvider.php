<?php namespace Fritzandandre\BootstrapWidgetsExtension;

use Anomaly\Streams\Platform\Addon\AddonCollection;
use Anomaly\Streams\Platform\Addon\AddonIntegrator;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

class BootstrapWidgetsExtensionServiceProvider extends AddonServiceProvider
{

    protected $plugins = [];

    protected $commands = [];

    protected $routes = [];

    protected $middleware = [];

    protected $listeners = [];

    protected $aliases = [];

    protected $bindings = [];

    protected $providers = [];

    protected $singletons = [];

    protected $overrides = [];

    protected $mobile = [];

    /**
     * Register the addon.
     *
     * @param AddonIntegrator $integrator
     * @param AddonCollection $addons
     */
    public function register(AddonIntegrator $integrator, AddonCollection $addons)
    {
        $addon = $integrator->register(
            __DIR__ . '/../addons/fritzandandre/two_column_wysiwyg_widget-extension/',
            'fritzandandre.extension.two_column_wysiwyg_widget',
            true,
            true
        );

        $addons->push($addon);

        $addon = $integrator->register(
            __DIR__ . '/../addons/fritzandandre/three_column_wysiwyg_widget-extension/',
            'fritzandandre.extension.three_column_wysiwyg_widget',
            true,
            true
        );

        $addons->push($addon);

        $addon = $integrator->register(
            __DIR__ . '/../addons/fritzandandre/half_wysiwyg_half_image_widget-extension/',
            'fritzandandre.extension.half_wysiwyg_half_image_widget',
            true,
            true
        );

        $addons->push($addon);

        $addon = $integrator->register(
            __DIR__ . '/../addons/fritzandandre/half_image_half_wysiwyg_widget-extension/',
            'fritzandandre.extension.half_image_half_wysiwyg_widget',
            true,
            true
        );

        $addons->push($addon);
    }

    public function map()
    {
    }

}
