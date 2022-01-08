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

use Suzunone\CodeRunner\Entities\Elements\ResponseElementInterface;
use Suzunone\CodeRunner\Entities\Output\DetailsEntity;
use Suzunone\CodeRunner\Entities\Output\StatusEntity;

/**
 * Interface OutputEntityInterface
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
interface OutputEntityInterface
{
    /**
     * @return \Suzunone\CodeRunner\Entities\Output\StatusEntity
     */
    public function status(): StatusEntity;

    /**
     * @return \Suzunone\CodeRunner\Entities\Output\DetailsEntity
     */
    public function details(): DetailsEntity;

    /**
     * @return \Suzunone\CodeRunner\Entities\Elements\ResponseElementInterface
     */
    public function getResponse() : ResponseElementInterface;

    /**
     * @param \Suzunone\CodeRunner\Entities\Elements\ResponseElementInterface $response
     * @return void
     */
    public function setResponse(ResponseElementInterface $response): void;
}
