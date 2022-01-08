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

namespace Suzunone\CodeRunner\Entities\Traits;

/**
 * ReadMutateTrait.php
 *
 * Class ReadMutateTrait
 *
 * @category   CodeRunner
 * @subpackage ${NAMESPACE}
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright  Project CodeRunner
 * @license    BSD 3-Clause License
 * @version    1.0
 * @link       https://github.com/suzunone/CodeRunner
 * @see        https://github.com/suzunone/CodeRunner
 * @since      2022/01/08
 * @mixin \Suzunone\CodeRunner\Entities\OutputEntityBase
 * @mixin \Suzunone\CodeRunner\Entities\InputEntityBase
 */
trait ReadMutateTrait
{
    /**
     * Dynamically retrieve attributes on the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get(string $key)
    {
        return $this->element->__get($key);
    }

    /**
     * Determine if an attribute or relation exists on the model.
     *
     * @param  string  $key
     * @return bool
     * @noinspection PhpMissingParamTypeInspection
     */
    public function __isset($key)
    {
        return $this->element->__isset($key);
    }

    /**
     * Convert the model to its string representation.
     *
     * @throws \JsonException
     * @throws \JsonException
     * @return string
     */
    public function __toString()
    {
        return $this->element->__toString();
    }
    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->element->toArray();
    }

    /**
     * Convert the model instance to JSON.
     *
     * @throws \JsonException
     * @return string
     *
     */
    public function toJson(): string
    {
        return $this->element->toJson();
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     * @noinspection ReturnTypeCanBeDeclaredInspection
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function jsonSerialize()
    {
        return $this->element->jsonSerialize();
    }

    /**
     * Determine if the given attribute exists.
     *
     * @param  mixed  $offset
     * @return bool
     * @noinspection ReturnTypeCanBeDeclaredInspection
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function offsetExists($offset)
    {
        return $this->element->offsetExists($offset);
    }

    /**
     * Get the value for a given offset.
     *
     * @param  mixed  $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->element->offsetGet($offset);
    }
}
