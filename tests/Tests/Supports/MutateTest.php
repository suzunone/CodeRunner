<?php

/**
 * This file is part of CodeRunner
 *
 * This source file is subject to the BSD 3-Clause License that is bundled
 * with this source code in the file LICENSE.
 *
 * @category   CodeRunner
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright  Project CodeRunner
 * @license    BSD 3-Clause License
 * @version    1.0
 * @link       https://github.com/suzunone/CodeRunner
 * @see        https://github.com/suzunone/CodeRunner
 */

namespace Tests\Suzunone\CodeRunner\Supports;

use PHPUnit\Framework\TestCase;
use Suzunone\CodeRunner\Supports\MutateTrait;

/**
 * Class MutateTest
 *
 * @category   CodeRunner
 * @package    Tests\Suzunone\CodeRunner\Supports
 * @subpackage Tests\Suzunone\CodeRunner\Supports
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright  Project CodeRunner
 * @license    BSD 3-Clause License
 * @version    1.0
 * @link       https://github.com/suzunone/CodeRunner
 * @see        https://github.com/suzunone/CodeRunner
 * @since      2022/01/09
 *
 * @internal
 * @coversNothing
 * @small
 */
class MutateTest extends TestCase
{
    /**
     * @return void
     * @covers \Suzunone\CodeRunner\Supports\MutateTrait
     */
    public function testGetAttribute()
    {
        $testMutate = new testMutate();
        $testMutate->fill(['id' => 'hogehoge']);

        $this->assertNull($testMutate->getAttribute(''));
    }
}

class testMutate
{
    use MutateTrait;
}
