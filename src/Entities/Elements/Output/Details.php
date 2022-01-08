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

use Suzunone\CodeRunner\Entities\Elements\ElementBase;
use Suzunone\CodeRunner\Entities\Elements\ResponseElementInterface;

/**
 * Class Details
 *
 * @category   CodeRunner
 * @package    Suzunone\CodeRunner\Entities\Elements\Output
 * @subpackage Suzunone\CodeRunner\Entities\Elements\Output
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright  Project CodeRunner
 * @license    BSD 3-Clause License
 * @version    1.0
 * @link       https://github.com/suzunone/CodeRunner
 * @see        https://github.com/suzunone/CodeRunner
 * @since      2022/01/08
 * @property-read string id - Session id
 * @property-read string language - language
 * @property-read string note - note
 * @property-read string status - status('running', 'completed')
 * @property-read null|string build_stdout - build output to stdout
 * @property-read null|string build_stderr - build output to stderr
 * @property-read int build_exit_code - build exit code
 * @property-read null|int build_time - build time(second)
 * @property-read null|int build_memory - build memory usage(bytes)
 * @property-read null|int build_result - build result('success', 'failure', 'error')
 * @property-read null|string stdout - code output to stdout
 * @property-read null|string stderr - code output to stderr
 * @property-read int exit_code - exit code
 * @property-read int time - time to run(seconds)
 * @property-read int memory - code memory usage(bytes)
 * @property-read string result - code result('success', 'failure', 'error')
 */
class Details extends ElementBase implements ResponseElementInterface
{
}
