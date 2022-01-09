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

namespace Tests\Suzunone\CodeRunner\Entities\Input\StatusEntity;

use PHPUnit\Framework\TestCase;
use Suzunone\CodeRunner\Entities\Input\StatusEntity;

/**
 * Class StatusEntityTest
 *
 * @category   CodeRunner
 * @package    Tests\Suzunone\CodeRunner\Entities\Input\StatusEntity
 * @subpackage Tests\Suzunone\CodeRunner\Entities\Input\StatusEntity
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
class StatusEntityTest extends TestCase
{
    /**
     * @return void
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
     * @covers \Suzunone\CodeRunner\Supports\MutateTrait
     */
    public function testSet()
    {
        $obj = new StatusEntity([]);
        $obj->id = 'hogehoge';

        $this->assertEquals('hogehoge', $obj->id);
    }

    /**
     * @return void
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
     * @covers \Suzunone\CodeRunner\Supports\MutateTrait
     */
    public function testOffsetSet()
    {
        $obj = new StatusEntity([]);
        $obj->offsetSet('id', 'hogehoge');

        $this->assertEquals('hogehoge', $obj->id);
    }

    /**
     * @return void
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
     * @covers \Suzunone\CodeRunner\Supports\MutateTrait
     */
    public function testOffsetUnset()
    {
        $obj = new StatusEntity(['id' => 'hogehoge']);
        $obj->offsetUnset('id');

        $this->assertNull($obj->id);
    }

    /**
     *
     * @return void
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
     * @covers \Suzunone\CodeRunner\Supports\MutateTrait
     */
    public function testIssetUnset()
    {
        $obj = new StatusEntity(['id' => 'hogehoge']);
        $this->assertTrue(isset($obj->id));
        unset($obj->id);
        $this->assertNull($obj->id);
        $this->assertFalse(isset($obi->id));
    }

    /**
     *
     * @return void
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
     * @covers \Suzunone\CodeRunner\Supports\MutateTrait
     */
    public function testToJson()
    {
        $obj = new StatusEntity(['id' => 'hogehoge']);

        $this->assertEquals('{"id":"hogehoge"}', $obj->toJson());
    }

    /**
     *
     * @return void
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
     * @covers \Suzunone\CodeRunner\Supports\MutateTrait
     */
    public function testToString()
    {
        $obj = new StatusEntity(['id' => 'hogehoge']);

        $this->assertEquals('{"id":"hogehoge"}', (string)$obj);
    }

    /**
     * @return void
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
     * @covers \Suzunone\CodeRunner\Supports\MutateTrait
     */
    public function testOffset()
    {
        $obj = new StatusEntity([]);
        $this->assertFalse(isset($obj['id']));
        $obj['id'] = 'hogehoge';
        $this->assertEquals('hogehoge', $obj['id']);
        $this->assertEquals($obj->id, $obj['id']);
        $this->assertTrue(isset($obj['id']));

        unset($obj['id']);
        $this->assertFalse(isset($obj['id']));
    }

    /**
     * @return void
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
     * @covers \Suzunone\CodeRunner\Supports\MutateTrait
     */
    public function testToArray()
    {
        $obj = new StatusEntity(['id' => 'hogehoge']);

        $this->assertEquals(['id' => 'hogehoge'], $obj->toArray());
    }

    /**
     * @return void
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
     * @covers \Suzunone\CodeRunner\Supports\MutateTrait
     */
    public function testJsonSerialize()
    {
        $obj = new StatusEntity(['id' => 'hogehoge']);

        $this->assertEquals(['id' => 'hogehoge'], $obj->jsonSerialize());
    }
}
