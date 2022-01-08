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

namespace Suzunone\CodeRunner\Supports;

use Suzunone\CodeRunner\Helpers\Str;

/**
 * Trait MutateTrait
 *
 * @category   CodeRunner
 * @package    Suzunone\CodeRunner\Supports
 * @subpackage Suzunone\CodeRunner\Supports
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright  Project CodeRunner
 * @license    BSD 3-Clause License
 * @version    1.0
 * @link       https://github.com/suzunone/CodeRunner
 * @see        https://github.com/suzunone/CodeRunner
 * @since      2022/01/08
 * @mixin \Suzunone\CodeRunner\Entities\Elements\ElementBase
 */
trait MutateTrait
{
    /**
     * The model's attributes.
     *
     * @var array
     */
    protected array $attributes = [];

    /**
     * Determine if a get mutator exists for an attribute.
     *
     * @param string $key
     * @return bool
     */
    public function hasGetMutator(string $key): bool
    {
        return method_exists($this, 'get' . Str::studly($key) . 'Attribute');
    }

    /**
     * Set a given attribute on the model.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function setAttribute(string $key, $value)
    {
        // First we will check for the presence of a mutator for the set operation
        // which simply lets the developers tweak the attribute as it is set on
        // the model, such as "json_encoding" a listing of data for storage.
        if ($this->hasSetMutator($key)) {
            return $this->setMutatedAttributeValue($key, $value);
        }

        $this->attributes[$key] = $value;

        return $this;
    }

    /**
     * Determine if a set mutator exists for an attribute.
     *
     * @param string $key
     * @return bool
     */
    public function hasSetMutator(string $key):bool
    {
        return method_exists($this, 'set' . Str::studly($key) . 'Attribute');
    }

    /**
     * Fill the model with an array of attributes.
     *
     * @param array $attributes
     * @return $this
     */
    public function fill(array $attributes): self
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }

        return $this;
    }

    /**
     * Get a plain attribute (not a relationship).
     *
     * @param string $key
     * @return mixed
     */
    public function getAttributeValue(string $key)
    {
        $value = $this->getAttributeFromArray($key);

        if ($this->hasGetMutator($key)) {
            return $this->mutateAttribute($key, $value);
        }

        return $value;
    }

    /**
     * Convert the model's attributes to an array.
     *
     * @return array
     */
    public function attributesToArray(): array
    {
        return $this->attributes;
    }

    /**
     * Get an attribute from the model.
     *
     * @param string $key
     * @return mixed
     */
    public function getAttribute(string $key)
    {
        if (!$key) {
            return null;
        }

        // If the attribute exists in the attribute array or has a "get" mutator we will
        // get the attribute's value. Otherwise, we will proceed as if the developers
        // are asking for a relationship's value. This covers both types of values.
        if (array_key_exists($key, $this->attributes) ||
            $this->hasGetMutator($key)) {
            return $this->getAttributeValue($key);
        }

        return null;
    }

    /**
     * Get the value of an attribute using its mutator.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    protected function mutateAttribute(string $key, $value)
    {
        return $this->{'get' . Str::studly($key) . 'Attribute'}($value);
    }

    /**
     * Set the value of an attribute using its mutator.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    protected function setMutatedAttributeValue(string $key, $value)
    {
        return $this->{'set' . Str::studly($key) . 'Attribute'}($value);
    }

    /**
     * Get an attribute from the $attributes array.
     *
     * @param string $key
     * @return mixed
     */
    protected function getAttributeFromArray(string $key)
    {
        return $this->attributes[$key] ?? null;
    }
}
