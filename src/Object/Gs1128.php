<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 *
 * References:
 *   http://phpforum.de/forum/showthread.php?t=276117
 *   http://forums.zend.com/viewtopic.php?p=125768#p125768
 *   http://framework.zend.com/issues/browse/ZF-10269
 */

namespace Zend\Barcode\Object;

/**
 * Class for generate GS1-128 / EAN128 / UCC128  barcode
 */
class Gs1128 extends Code128
{
    /**
     * Convert string to barcode string
     * @param string $string
     * @return array
     */
    protected function convertToBarcodeChars($string)
    {
        $chars = parent::convertToBarcodeChars($string);

        // Add FNC1 after start sign
        array_splice($chars, 1, 0, 102);

        return $chars;
    }
}
