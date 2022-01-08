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

namespace Suzunone\CodeRunner\Entities\Output;

use Suzunone\CodeRunner\Entities\Elements\Output\Status;
use Suzunone\CodeRunner\Entities\OutputEntityBase;
use Suzunone\CodeRunner\Entities\OutputEntityInterface;

/**
 * Class StatusEntity
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
 * @property-read string id     - session id(This should be used in get_status/get_details API)
 * @property-read string status - 'running', 'completed'
 * @property-read string error  - error message.
 * @property-read bool is_error - if error is true
 */
class StatusEntity extends OutputEntityBase implements OutputEntityInterface
{
    use OtherRequestTrait;

    /**
     * @param array $attribute
     */
    public function __construct(array $attribute)
    {
        $this->setResponse(new Status($attribute));
    }
}
