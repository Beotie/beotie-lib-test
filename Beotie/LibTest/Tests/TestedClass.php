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

/**
 * Tested class
 *
 * This class is used to validate the TestTrait logic
 *
 * @category Test
 * @package  Beotie_Lib_Test
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class TestedClass extends TestClass
{
    use TestedTrait;

    /**
     * Property
     *
     * A class property
     *
     * @var mixed
     */
    private $property;

    /**
     * Construct
     *
     * The class constructor
     *
     * @param mixed $val A value
     */
    public function __construct($val)
    {
        $this->property = $val;
    }
}
