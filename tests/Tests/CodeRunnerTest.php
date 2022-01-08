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
 * @internal
 * @coversNothing
 */
class CodeRunnerTest extends TestCase
{
    /**
     * @throws \ErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @return \Suzunone\CodeRunner\Entities\Output\CreateEntity|\Suzunone\CodeRunner\Entities\OutputEntityInterface
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
     * @throws \ErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @return void
     * @depends testCreate
     */
    public function testStatus($outputCreate)
    {
        $outputStatus = $outputCreate->status();
        var_dump($outputStatus);
        $this->assertInstanceOf(StatusEntity::class, $outputStatus);

        while ($outputStatus = $outputStatus->status()) {
            var_dump($outputStatus);

            if ($outputStatus->status !== 'running') {
                break;
            }
            sleep(0.1);
        }

        $this->assertInstanceOf(StatusEntity::class, $outputStatus);

        $this->assertFalse($outputStatus->is_error);

        return $outputStatus;
    }

    /**
     * @param $outputCreate
     * @param mixed $outputStatus
     * @throws \ErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @return void
     * @depends testStatus
     */
    public function testDetail($outputStatus)
    {
        $outputDetails = $outputStatus->details();

        $this->assertInstanceOf(DetailsEntity::class, $outputDetails);
        $this->assertEquals("aa\n", $outputDetails->stdout);
        $this->assertInstanceOf(Details::class, $outputDetails->getResponse());
    }

    public function testApiKey()
    {
        $api_key = CodeRunner::getApiKey();
        CodeRunner::setApiKey('aaaa');
        $this->assertEquals('aaaa', CodeRunner::getApiKey());

        CodeRunner::setApiKey($api_key);
        $this->assertEquals($api_key, CodeRunner::getApiKey());
        $this->assertEquals('guest', CodeRunner::getApiKey());
    }
}
