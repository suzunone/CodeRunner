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

use Suzunone\CodeRunner\Entities\Input\DetailsEntity;
use Suzunone\CodeRunner\Entities\Input\StatusEntity;
use Suzunone\CodeRunner\Entities\Output\DetailsEntity as OutputDetailsEntity;
use Suzunone\CodeRunner\Entities\Output\StatusEntity as OutputStatusEntity;
use Suzunone\CodeRunner\Requests\PaizaIO\DetailsRequest;
use Suzunone\CodeRunner\Requests\PaizaIO\StatusRequest;

/**
 * Trait OtherRequestTrait
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
 * @property-read string id
 */
trait OtherRequestTrait
{
    /**
     * @throws \ErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @return \Suzunone\CodeRunner\Entities\Output\StatusEntity
     */
    public function status(): OutputStatusEntity
    {
        $entity = new StatusEntity(['id' => $this->id]);

        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return (new StatusRequest())->request($entity);
    }

    /**
     * @throws \ErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @return \Suzunone\CodeRunner\Entities\Output\DetailsEntity
     */
    public function details(): OutputDetailsEntity
    {
        $entity = new DetailsEntity(['id' => $this->id]);

        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return (new DetailsRequest())->request($entity);
    }
}
