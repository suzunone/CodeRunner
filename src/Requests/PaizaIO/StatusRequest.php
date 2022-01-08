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

namespace Suzunone\CodeRunner\Requests\PaizaIO;

use GuzzleHttp\Psr7\Response;
use Suzunone\CodeRunner\CodeRunner;
use Suzunone\CodeRunner\Entities\InputEntityInterface;
use Suzunone\CodeRunner\Entities\Output\StatusEntity;
use Suzunone\CodeRunner\Entities\OutputEntityInterface;
use Suzunone\CodeRunner\Requests\RequestInterface;
use Suzunone\CodeRunner\Requests\Traits\GuzzleRequestTrait;

/**
 * Class StatusRequest
 *
 * @category   CodeRunner
 * @package    Suzunone\CodeRunner\Requests\PaizaIO
 * @subpackage Suzunone\CodeRunner\Requests\PaizaIO
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright  Project CodeRunner
 * @license    BSD 3-Clause License
 * @version    1.0
 * @link       https://github.com/suzunone/CodeRunner
 * @see        https://github.com/suzunone/CodeRunner
 * @since      2022/01/08
 */
class StatusRequest implements RequestInterface
{
    use GuzzleRequestTrait;

    public function getApiURL(): string
    {
        /** @noinspection HttpUrlsUsage */
        return 'http://api.paiza.io:80/runners/get_status';
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     * @throws \JsonException
     * @return \Suzunone\CodeRunner\Entities\OutputEntityInterface
     */
    public function formatResponse(Response $response): OutputEntityInterface
    {
        return new StatusEntity(json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR));
    }

    /**
     * @param \Suzunone\CodeRunner\Entities\InputEntityInterface $entity
     * @return array
     */
    public function formParams(InputEntityInterface $entity): array
    {
        return $entity->getParameters() + ['api_key' => CodeRunner::getApiKey()];
    }
}
