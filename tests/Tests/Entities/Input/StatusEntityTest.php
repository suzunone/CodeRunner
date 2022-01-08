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
 * @internal
 * @coversNothing
 */
class StatusEntityTest extends TestCase
{
    /**
     * @return void
     */
    public function testSet()
    {
        $obj = new StatusEntity([]);
        $obj->id = 'hogehoge';

        $this->assertEquals('hogehoge', $obj->id);
    }

    /**
     * @return void
     */
    public function testOffsetSet()
    {
        $obj = new StatusEntity([]);
        $obj->offsetSet('id', 'hogehoge');

        $this->assertEquals('hogehoge', $obj->id);
    }

    /**
     * @return void
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
     */
    public function testIssetUnset()
    {
        $obj = new StatusEntity(['id' => 'hogehoge']);
        $this->assertTrue(isset($obj->id));
        $obj->id = null;
        $this->assertNull($obj->id);
        $this->assertFalse(isset($obi->id));
    }

    /**
     *
     * @return void
     */
    public function testToJson()
    {
        $obj = new StatusEntity(['id' => 'hogehoge']);

        $this->assertEquals('{"id":"hogehoge"}', $obj->toJson());
    }

    /**
     *
     * @return void
     */
    public function testToString()
    {
        $obj = new StatusEntity(['id' => 'hogehoge']);

        $this->assertEquals('{"id":"hogehoge"}', (string)$obj);
    }

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

    public function testToArray()
    {
        $obj = new StatusEntity(['id' => 'hogehoge']);

        $this->assertEquals(['id' => 'hogehoge'], $obj->toArray());
    }

    public function testJsonSerialize()
    {
        $obj = new StatusEntity(['id' => 'hogehoge']);

        $this->assertEquals(['id' => 'hogehoge'], $obj->jsonSerialize());
    }
}
