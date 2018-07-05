<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\Barcode;

use Zend\ServiceManager\AbstractPluginManager;

/**
 * Plugin manager implementation for barcode parsers.
 *
 * Enforces that barcode parsers retrieved are instances of
 * BarcodeObject\AbstractObject. Additionally, it registers a number of default
 * barcode parsers.
 */
class ObjectPluginManager extends AbstractPluginManager
{
    /**
     * @var bool Ensure services are not shared
     */
    protected $shareByDefault = false;

    /**
     * Default set of barcode parsers
     *
     * @var array
     */
    protected $invokableClasses = array(
        'codabar'           => 'Zend\Barcode\BarcodeObject\Codabar',
        'code128'           => 'Zend\Barcode\BarcodeObject\Code128',
        'gs1128'            => 'Zend\Barcode\BarcodeObject\Gs1128',
        'code25'            => 'Zend\Barcode\BarcodeObject\Code25',
        'code25interleaved' => 'Zend\Barcode\BarcodeObject\Code25interleaved',
        'code39'            => 'Zend\Barcode\BarcodeObject\Code39',
        'ean13'             => 'Zend\Barcode\BarcodeObject\Ean13',
        'ean2'              => 'Zend\Barcode\BarcodeObject\Ean2',
        'ean5'              => 'Zend\Barcode\BarcodeObject\Ean5',
        'ean8'              => 'Zend\Barcode\BarcodeObject\Ean8',
        'error'             => 'Zend\Barcode\BarcodeObject\Error',
        'identcode'         => 'Zend\Barcode\BarcodeObject\Identcode',
        'itf14'             => 'Zend\Barcode\BarcodeObject\Itf14',
        'leitcode'          => 'Zend\Barcode\BarcodeObject\Leitcode',
        'planet'            => 'Zend\Barcode\BarcodeObject\Planet',
        'postnet'           => 'Zend\Barcode\BarcodeObject\Postnet',
        'royalmail'         => 'Zend\Barcode\BarcodeObject\Royalmail',
        'upca'              => 'Zend\Barcode\BarcodeObject\Upca',
        'upce'              => 'Zend\Barcode\BarcodeObject\Upce',
    );

    /**
     * Validate the plugin
     *
     * Checks that the barcode parser loaded is an instance
     * of BarcodeObject\AbstractObject.
     *
     * @param  mixed $plugin
     * @return void
     * @throws Exception\InvalidArgumentException if invalid
     */
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof BarcodeObject\AbstractBarcodeObject) {
            // we're okay
            return;
        }

        throw new Exception\InvalidArgumentException(sprintf(
            'Plugin of type %s is invalid; must extend %s\BarcodeObject\AbstractObject',
            (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
            __NAMESPACE__
        ));
    }
}
