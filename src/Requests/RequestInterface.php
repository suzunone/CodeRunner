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

namespace Suzunone\CodeRunner\Requests;

use GuzzleHttp\Psr7\Response;
use Suzunone\CodeRunner\Entities\InputEntityInterface;
use Suzunone\CodeRunner\Entities\OutputEntityInterface;

/**
 * Interface RequestInterface
 *
 * @category   CodeRunner
 * @package    Suzunone\CodeRunner\Requests
 * @subpackage Suzunone\CodeRunner\Requests
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright  Project CodeRunner
 * @license    BSD 3-Clause License
 * @version    1.0
 * @link       https://github.com/suzunone/CodeRunner
 * @see        https://github.com/suzunone/CodeRunner
 * @since      2022/01/08
 */
interface RequestInterface
{
    /**
     * @return string apiのurl
     */
    public function getApiURL(): string;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @param \Suzunone\CodeRunner\Entities\InputEntityInterface $element
     * @return \Suzunone\CodeRunner\Entities\OutputEntityInterface
     */
    public function request(InputEntityInterface $element): OutputEntityInterface;

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     * @return \Suzunone\CodeRunner\Entities\OutputEntityInterface
     */
    public function formatResponse(Response $response): OutputEntityInterface;

    /**
     * @param \Suzunone\CodeRunner\Entities\InputEntityInterface $entity
     * @return array
     */
    public function formParams(InputEntityInterface $entity): array;
}
