<?php
declare(strict_types=1);
/**
 * This file is part of beotie/lib_test
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.1
 *
 * @category Test
 * @package  Beotie_Lib_Test
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace Beotie\LibTest\Traits;

use PHPUnit\Framework\TestCase;

/**
 * Test case trait
 *
 * This trait is used to wrap test case feature
 *
 * @category Test
 * @package  Beotie_Lib_Test
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait TestCaseTrait
{
    /**
     * Get TestCase
     *
     * Return the current TestCase
     *
     * @return TestCase
     */
    protected function getTestCase() : TestCase
    {
        return $this;
    }
}
