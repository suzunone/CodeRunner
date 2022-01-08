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

namespace Suzunone\CodeRunner\Entities\Input;

use Suzunone\CodeRunner\Entities\Elements\Input\Status;
use Suzunone\CodeRunner\Entities\InputEntityBase;
use Suzunone\CodeRunner\Entities\InputEntityInterface;

/**
 * Class StatusEntity
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
 * @property string id - Session id
 */
class StatusEntity extends InputEntityBase implements InputEntityInterface
{
    /**
     * @param array $attribute
     */
    public function __construct(array $attribute)
    {
        $this->element = new Status($attribute);
    }
}
