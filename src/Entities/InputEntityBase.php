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

namespace Suzunone\CodeRunner\Entities;

use ArrayAccess;
use JsonSerializable;
use Suzunone\CodeRunner\Entities\Traits\ReadMutateTrait;
use Suzunone\CodeRunner\Supports\Arrayable;
use Suzunone\CodeRunner\Supports\Jsonable;

/**
 * Class InputEntityBase
 *
 * @category   CodeRunner
 * @package    Suzunone\CodeRunner\Entities
 * @subpackage Suzunone\CodeRunner\Entities
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright  Project CodeRunner
 * @license    BSD 3-Clause License
 * @version    1.0
 * @link       https://github.com/suzunone/CodeRunner
 * @see        https://github.com/suzunone/CodeRunner
 * @since      2022/01/08
 */
abstract class InputEntityBase implements ArrayAccess, Arrayable, Jsonable, JsonSerializable
{
    use ReadMutateTrait;

    /**
     * @var \Suzunone\CodeRunner\Entities\Elements\ElementBase|\Suzunone\CodeRunner\Entities\Elements\RequestElementInterface
     */
    protected $element;

    /**
     * Dynamically set attributes on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function __set(string $key, $value)
    {
        $this->element->__set($key, $value);
    }

    /**
     * Unset an attribute on the model.
     *
     * @param  string  $key
     * @return void
     */
    public function __unset($key)
    {
        $this->element->__unset($key);
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->element->form_params;
    }

    /**
     * Set the value for a given offset.
     *
     * @param  mixed  $offset
     * @param  mixed  $value
     * @return void
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    public function offsetSet($offset, $value)
    {
        $this->element->offsetSet($offset, $value);
    }

    /**
     * Unset the value for a given offset.
     *
     * @param  mixed  $offset
     * @return void
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    public function offsetUnset($offset)
    {
        $this->element->offsetUnset($offset);
    }
}
