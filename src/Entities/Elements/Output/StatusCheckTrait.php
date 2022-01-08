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

namespace Suzunone\CodeRunner\Entities\Elements\Output;

use Suzunone\CodeRunner\CodeRunner;

/**
 * Trait StatusCheckTrait
 *
 * @category   CodeRunner
 * @package    Suzunone\CodeRunner\Entities\Output
 * @subpackage Suzunone\CodeRunner\Entities\Output
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright  Project CodeRunner
 * @license    BSD 3-Clause License
 * @version    1.0
 * @link       https://github.com/suzunone/CodeRunner
 * @see        https://github.com/suzunone/CodeRunner
 * @since      2022/01/08
 * @mixin \Suzunone\CodeRunner\Entities\Output\StatusEntity
 * @property-read bool is_completed
 * @property-read bool is_running
 */
trait StatusCheckTrait
{
    /**
     * @return bool
     */
    public function getIsCompletedAttribute(): bool
    {
        return $this->status === CodeRunner::STATUS_COMPLETED;
    }

    /**
     * @return bool
     */
    public function getIsRunningAttribute(): bool
    {
        return $this->status === CodeRunner::STATUS_RUNNING;
    }
}
