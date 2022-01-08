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
 * Class Status
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
 * @property string id - Session id
 */
class Status extends ElementBase implements RequestElementInterface
{
    /**
     * @return array
     */
    public function getFormParamsAttribute(): array
    {
        $res = [];

        $attributes = $this->toArray();
        $res['id'] = $attributes['id'] ?? '';

        return $res;
    }
}
