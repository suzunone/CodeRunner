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

namespace Suzunone\CodeRunner\Entities\Elements\Input;

use Suzunone\CodeRunner\Entities\Elements\ElementBase;
use Suzunone\CodeRunner\Entities\Elements\RequestElementInterface;

/**
 * Class Create
 *
 * @category   CodeRunner
 * @package    Suzunone\CodeRunner\Entities\Elements\Input
 * @subpackage Suzunone\CodeRunner\Entities\Elements\Input
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright  Project CodeRunner
 * @license    BSD 3-Clause License
 * @version    1.0
 * @link       https://github.com/suzunone/CodeRunner
 * @see        https://github.com/suzunone/CodeRunner
 * @since      2022/01/08
 * @property string source_code - Source code
 * @property string language - Language
 * @property string input - Input data for the program. Program read this data from standard input.
 * @property bool longpoll - Enable long polling(default: false)
 * @property int longpoll_timeout - Longpoll timeout(default: 10)
 */
class Create extends ElementBase implements RequestElementInterface
{
    /**
     * The model's attributes.
     *
     * @var array
     */
    protected array $attributes = [
        'source_code' => '',
        'language' => 'php',
        'input' => '',
        'longpoll' => false,
        'longpoll_timeout' => 10,
    ];

    /**
     * @param $value
     * @return void
     */
    public function setLongpollAttribute($value): void
    {
        $this->attributes['longpoll'] = (bool) $value;
    }

    /**
     * @param $value
     * @return void
     */
    public function setLongpollTimeoutAttribute($value): void
    {
        $this->attributes['longpoll_timeout'] = (int) $value;
    }

    /**
     * @return array
     */
    public function getFormParamsAttribute(): array
    {
        $res = [];

        $attributes = $this->toArray();
        $res['longpoll'] = $attributes['longpoll'] === true ? 'true' : 'false';
        $res['longpoll_timeout'] = (string)$attributes['longpoll_timeout'];
        $res['source_code'] = $attributes['source_code'] ?? '';
        $res['language'] = $attributes['language'] ?? 'php';
        $res['input'] = $attributes['input'] ?? '';

        return $res;
    }
}
