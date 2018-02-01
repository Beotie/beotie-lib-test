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
namespace Beotie\LibTest\Tests;

use PHPUnit\Framework\TestCase;
use Beotie\LibTest\Traits\TestCaseTrait;

/**
 * Test case trait test
 *
 * This test case is used to validate the TestCaseTrait logic
 *
 * @category Test
 * @package  Beotie_Lib_Test
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class TestCaseTraitTest extends TestCase
{
    use TestCaseTrait;

    /**
     * Test get TestCase
     *
     * This method is used to validate the TestCaseTrait::getTestCase method logic
     *
     * @return void
     */
    public function testGetTestCase() : void
    {
        $this->assertSame($this, $this->getTestCase());

        return;
    }
}
