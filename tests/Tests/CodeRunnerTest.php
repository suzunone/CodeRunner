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
use Suzunone\CodeRunner\Entities\Elements\Output\Details;
use Suzunone\CodeRunner\Entities\Output\CreateEntity;
use Suzunone\CodeRunner\Entities\Output\DetailsEntity;
use Suzunone\CodeRunner\Entities\Output\StatusEntity;

/**
 * Class CodeRunnerTest
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
 */
class CodeRunnerTest extends TestCase
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \ErrorException
     * @return \Suzunone\CodeRunner\Entities\Output\CreateEntity|\Suzunone\CodeRunner\Entities\OutputEntityInterface
     * @covers \Suzunone\CodeRunner\CodeRunner
     * @covers \Suzunone\CodeRunner\Entities\Elements\ElementBase
     * @covers \Suzunone\CodeRunner\Entities\Elements\Input\Create
     * @covers \Suzunone\CodeRunner\Entities\Elements\Output\Create
     * @covers \Suzunone\CodeRunner\Entities\Elements\Output\StatusCheckTrait
     * @covers \Suzunone\CodeRunner\Entities\Input\CreateEntity
     * @covers \Suzunone\CodeRunner\Entities\InputEntityBase
     * @covers \Suzunone\CodeRunner\Entities\Output\CreateEntity
     * @covers \Suzunone\CodeRunner\Entities\OutputEntityBase
     * @covers \Suzunone\CodeRunner\Requests\PaizaIO\CreateRequest
     * @covers \Suzunone\CodeRunner\Supports\MutateTrait
     */
    public function testCreate()
    {
        $obj = new CodeRunner();

        $outputCreate = $obj->create('<?php echo fgets(STDIN);', CodeRunner::LANG_PHP, "aa\nbb\n");
        var_dump($outputCreate);
        $this->assertInstanceOf(CreateEntity::class, $outputCreate);

        $this->assertFalse($outputCreate->is_error);

        return $outputCreate;
    }

    /**
     * @param $outputCreate
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \ErrorException
     * @return void
     * @depends testCreate
     * @return \Suzunone\CodeRunner\Entities\Output\CreateEntity|\Suzunone\CodeRunner\Entities\OutputEntityInterface
     * @covers \Suzunone\CodeRunner\CodeRunner
     * @covers \Suzunone\CodeRunner\Entities\Elements\ElementBase
     * @covers \Suzunone\CodeRunner\Entities\Elements\Input\Create
     * @covers \Suzunone\CodeRunner\Entities\Elements\Input\Status
     * @covers \Suzunone\CodeRunner\Entities\Elements\Output\Create
     * @covers \Suzunone\CodeRunner\Entities\Elements\Output\Status
     * @covers \Suzunone\CodeRunner\Entities\Elements\Output\StatusCheckTrait
     * @covers \Suzunone\CodeRunner\Entities\Input\CreateEntity
     * @covers \Suzunone\CodeRunner\Entities\Input\StatusEntity
     * @covers \Suzunone\CodeRunner\Entities\InputEntityBase
     * @covers \Suzunone\CodeRunner\Entities\Output\CreateEntity
     * @covers \Suzunone\CodeRunner\Entities\Output\StatusEntity
     * @covers \Suzunone\CodeRunner\Entities\OutputEntityBase
     * @covers \Suzunone\CodeRunner\Requests\PaizaIO\StatusRequest
     * @covers \Suzunone\CodeRunner\Supports\MutateTrait
     */
    public function testStatus($outputCreate)
    {
        $outputStatus = $outputCreate->status();
        var_dump($outputStatus);
        $this->assertInstanceOf(StatusEntity::class, $outputStatus);

        while ($outputStatus = $outputStatus->status()) {
            var_dump($outputStatus);

            if ($outputStatus->is_completed) {
                break;
            }
            sleep(0.1);
        }

        $this->assertInstanceOf(StatusEntity::class, $outputStatus);

        $this->assertFalse($outputStatus->is_error);
        $this->assertTrue($outputStatus->is_completed);
        $this->assertFalse($outputStatus->is_running);

        return $outputStatus;
    }

    /**
     * @param $outputCreate
     * @param mixed $outputStatus
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \ErrorException
     * @return void
     * @depends testStatus
     * @return \Suzunone\CodeRunner\Entities\Output\CreateEntity|\Suzunone\CodeRunner\Entities\OutputEntityInterface
     * @covers \Suzunone\CodeRunner\CodeRunner
     * @covers \Suzunone\CodeRunner\Entities\Elements\ElementBase
     * @covers \Suzunone\CodeRunner\Entities\Elements\Input\Create
     * @covers \Suzunone\CodeRunner\Entities\Elements\Input\Details
     * @covers \Suzunone\CodeRunner\Entities\Elements\Input\Status
     * @covers \Suzunone\CodeRunner\Entities\Elements\Output\Create
     * @covers \Suzunone\CodeRunner\Entities\Elements\Output\Details
     * @covers \Suzunone\CodeRunner\Entities\Elements\Output\Status
     * @covers \Suzunone\CodeRunner\Entities\Elements\Output\StatusCheckTrait
     * @covers \Suzunone\CodeRunner\Entities\Input\CreateEntity
     * @covers \Suzunone\CodeRunner\Entities\Input\DetailsEntity
     * @covers \Suzunone\CodeRunner\Entities\Input\StatusEntity
     * @covers \Suzunone\CodeRunner\Entities\InputEntityBase
     * @covers \Suzunone\CodeRunner\Entities\Output\CreateEntity
     * @covers \Suzunone\CodeRunner\Entities\Output\DetailsEntity
     * @covers \Suzunone\CodeRunner\Entities\Output\StatusEntity
     * @covers \Suzunone\CodeRunner\Entities\OutputEntityBase
     * @covers \Suzunone\CodeRunner\Requests\PaizaIO\DetailsRequest
     * @covers \Suzunone\CodeRunner\Supports\MutateTrait
     */
    public function testDetail($outputStatus)
    {
        $outputDetails = $outputStatus->details();

        $this->assertInstanceOf(DetailsEntity::class, $outputDetails);
        $this->assertEquals("aa\n", $outputDetails->stdout);
        $this->assertInstanceOf(Details::class, $outputDetails->getResponse());
    }

    /**
     * @return void
     * @covers \Suzunone\CodeRunner\CodeRunner
     */
    public function testApiKey()
    {
        $api_key = CodeRunner::getApiKey();
        CodeRunner::setApiKey('aaaa');
        $this->assertEquals('aaaa', CodeRunner::getApiKey());

        CodeRunner::setApiKey($api_key);
        $this->assertEquals($api_key, CodeRunner::getApiKey());
        $this->assertEquals('guest', CodeRunner::getApiKey());
    }

    /**
     * @return array
     * @covers \Suzunone\CodeRunner\CodeRunner
     */
    public function getTemplateDataProvider()
    {
        $res = [];

        foreach (CodeRunner::LANGS as $lang => $val) {
            $res[$val] = [$lang];
        }

        return $res;
    }

    /**
     * @param $lang
     * @return void
     * @dataProvider getTemplateDataProvider
     * @covers \Suzunone\CodeRunner\CodeRunner
     */
    public function testGetTemplate($lang)
    {
        $obj = new CodeRunner();

        $res = $obj->getTemplate($lang);

        $this->assertStringContainsString(' Please enter your some code here!', $res);
    }

    /**
     * @return void
     * @covers \Suzunone\CodeRunner\CodeRunner
     */
    public function testLangToName()
    {
        $obj = new CodeRunner();

        $res = $obj->getLanguageName('php');

        $this->assertEquals('PHP', $res);
    }
}
