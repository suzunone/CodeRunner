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

namespace Tests\Suzunone\CodeRunner;

use PHPUnit\Framework\TestCase;
use Suzunone\CodeRunner\CodeRunner;
use Suzunone\CodeRunner\Entities\Output\CreateEntity;

/**
 * Class CordTemplateTest
 *
 * @category   CodeRunner
 * @package    Tests\Suzunone\CodeRunner
 * @subpackage Tests\Suzunone\CodeRunner
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
class CordTemplateTest extends TestCase
{
    public function getTemplateDataProvider()
    {
        // return ['Lisp' => [CodeRunner::LANG_COMMONLISP]];
        $res = [];

        foreach (CodeRunner::LANGS as $lang => $val) {
            if ($lang === CodeRunner::LANG_MYSQL) {
                $res[$val] = [$lang, ''];
            } else {
                $res[$val] = [$lang, 'Hello World!'];
            }
        }

        return $res;
    }

    /**
     * @param $lang
     * @param mixed $stdin
     * @return void
     * @dataProvider getTemplateDataProvider
     * @large
     */
    public function testGetTemplate($lang, $stdin)
    {
        $obj = new CodeRunner();

        $code = $obj->getTemplate($lang);

        $obj = new CodeRunner();

        $outputCreate = $obj->create($code, $lang, $stdin, true, 200);
        while ($outputCreate->is_running) {
            $outputCreate = $outputCreate->status();
            sleep(1);
        }

        var_dump($outputCreate);
        $this->assertInstanceOf(CreateEntity::class, $outputCreate);

        $this->assertFalse($outputCreate->is_error);

        $details = $outputCreate->details();

        var_dump($details);
        $this->assertStringContainsString('Hello World!', $details->stdout);
    }
}
