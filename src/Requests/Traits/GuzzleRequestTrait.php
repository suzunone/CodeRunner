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

namespace Suzunone\CodeRunner\Requests\Traits;

use ErrorException;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Suzunone\CodeRunner\Entities\InputEntityInterface;
use Suzunone\CodeRunner\Entities\OutputEntityInterface;

/**
 * Trait GuzzleRequestTrait
 *
 * @category   CodeRunner
 * @package    Suzunone\CodeRunner\Requests\Traits
 * @subpackage Suzunone\CodeRunner\Requests\Traits
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright  Project CodeRunner
 * @license    BSD 3-Clause License
 * @version    1.0
 * @link       https://github.com/suzunone/CodeRunner
 * @see        https://github.com/suzunone/CodeRunner
 * @since      2022/01/08
 * @mixin \Suzunone\CodeRunner\Requests\RequestInterface
 */
trait GuzzleRequestTrait
{
    /**
     * @param \Suzunone\CodeRunner\Entities\InputEntityInterface $element
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \ErrorException
     * @return \Suzunone\CodeRunner\Entities\OutputEntityInterface
     */
    public function request(InputEntityInterface $element): OutputEntityInterface
    {
        $client = new Client(
            [RequestOptions::VERIFY => false]
        );

        $method = strtoupper($this->getMethod());

        if ($method === 'POST') {
            $res = $client->request(
                $method,

                // ここにはレスポンスを返却してくれるURL(API)を設定
                $this->getApiURL(),
                [
                    'form_params' => $this->formParams($element),
                ]
            );
        } elseif ($method === 'GET') {
            $res = $client->request(
                $method,
                $this->getApiURL() . '?' . http_build_query($this->formParams($element))
            );
        } else {
            // @codeCoverageIgnoreStart
            throw new ErrorException('fatal: can not use method ' . $this->getMethod() . '.');
            // @codeCoverageIgnoreEnd
        }

        return $this->formatResponse($res);
    }
}
