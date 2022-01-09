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

namespace Tests\Suzunone\CodeRunner\Helpers;

use PHPUnit\Framework\TestCase;
use Suzunone\CodeRunner\Helpers\Str;

/**
 * Class StrTest
 *
 * @category   CodeRunner
 * @package    Tests\Suzunone\CodeRunner\Helpers
 * @subpackage Tests\Suzunone\CodeRunner\Helpers
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright  Project CodeRunner
 * @license    BSD 3-Clause License
 * @version    1.0
 * @link       https://github.com/suzunone/CodeRunner
 * @see        https://github.com/suzunone/CodeRunner
 * @since      2022/01/09
 * @internal
 * @coversNothing
 * @small
 */
class StrTest extends TestCase
{
    /**
     * @return void
     * @covers \Suzunone\CodeRunner\Helpers\Str
     */
    public function testStudly()
    {
        $this->assertSame('SuzunoneCODERunner', Str::studly('suzunone_c_o_d_e_runner'));
        $this->assertSame('SuzunoneCodeRunner', Str::studly('suzunone_code_runner'));
        $this->assertSame('SuzunoneCoDeRunner', Str::studly('suzunone-coDe-runner'));
        $this->assertSame('SuzunoneCodeRunner', Str::studly('suzunone  -_-  code   -_-   runner   '));

        $this->assertSame('FooBar', Str::studly('fooBar'));
        $this->assertSame('FooBar', Str::studly('foo_bar'));
        $this->assertSame('FooBar', Str::studly('foo_bar')); // test cache
        $this->assertSame('FooBarBaz', Str::studly('foo-barBaz'));
        $this->assertSame('FooBarBaz', Str::studly('foo-bar_baz'));
    }
}
