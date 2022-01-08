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

namespace Suzunone\CodeRunner;

use Suzunone\CodeRunner\Entities\Input\CreateEntity;
use Suzunone\CodeRunner\Requests\PaizaIO\CreateRequest;

/**
 * Class CodeRunner
 *
 * @category   CodeRunner
 * @package    Suzunone\CodeRunner
 * @subpackage Suzunone\CodeRunner
 * @author     suzunone<suzunone.eleven@gmail.com>
 * @copyright  Project CodeRunner
 * @license    BSD 3-Clause License
 * @version    1.0
 * @link       https://github.com/suzunone/CodeRunner
 * @see        https://github.com/suzunone/CodeRunner
 * @since      2022/01/08
 */
class CodeRunner
{
    public const LANG_C = 'c';
    public const LANG_CPP = 'cpp';
    public const LANG_OBJECTIVE_C = 'objective-c';
    public const LANG_JAVA = 'java';
    public const LANG_KOTLIN = 'kotlin';
    public const LANG_SCALA = 'scala';
    public const LANG_SWIFT = 'swift';
    public const LANG_CSHARP = 'csharp';
    public const LANG_GO = 'go';
    public const LANG_HASKELL = 'haskell';
    public const LANG_ERLANG = 'erlang';
    public const LANG_PERL = 'perl';
    public const LANG_PYTHON = 'python';
    public const LANG_PYTHON3 = 'python3';
    public const LANG_RUBY = 'ruby';
    public const LANG_PHP = 'php';
    public const LANG_BASH = 'bash';
    public const LANG_R = 'r';
    public const LANG_JAVASCRIPT = 'javascript';
    public const LANG_COFFEESCRIPT = 'coffeescript';
    public const LANG_VB = 'vb';
    public const LANG_COBOL = 'cobol';
    public const LANG_FSHARP = 'fsharp';
    public const LANG_D = 'd';
    public const LANG_CLOJURE = 'clojure';
    public const LANG_ELIXIR = 'elixir';
    public const LANG_MYSQL = 'mysql';
    public const LANG_RUST = 'rust';
    public const LANG_SCHEME = 'scheme';
    public const LANG_COMMONLISP = 'commonlisp';
    public const LANG_NADESIKO = 'nadesiko';
    public const LANG_TYPESCRIPT = 'typescript';
    public const LANG_PLAIN = 'plain';

    public const LANGS = [
        self::LANG_C,
        self::LANG_CPP,
        self::LANG_OBJECTIVE_C,
        self::LANG_JAVA,
        self::LANG_KOTLIN,
        self::LANG_SCALA,
        self::LANG_SWIFT,
        self::LANG_CSHARP,
        self::LANG_GO,
        self::LANG_HASKELL,
        self::LANG_ERLANG,
        self::LANG_PERL,
        self::LANG_PYTHON,
        self::LANG_PYTHON3,
        self::LANG_RUBY,
        self::LANG_PHP,
        self::LANG_BASH,
        self::LANG_R,
        self::LANG_JAVASCRIPT,
        self::LANG_COFFEESCRIPT,
        self::LANG_VB,
        self::LANG_COBOL,
        self::LANG_FSHARP,
        self::LANG_D,
        self::LANG_CLOJURE,
        self::LANG_ELIXIR,
        self::LANG_MYSQL,
        self::LANG_RUST,
        self::LANG_SCHEME,
        self::LANG_COMMONLISP,
        self::LANG_NADESIKO,
        self::LANG_TYPESCRIPT,
        self::LANG_PLAIN,
    ];

    /**
     * @var string
     */
    protected static string $api_key = 'guest';

    /**
     * @param string $source_code
     * @param string $language
     * @param string $input
     * @param bool $longpoll
     * @param int $longpoll_timeout
     * @throws \ErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @return \Suzunone\CodeRunner\Entities\OutputEntityInterface
     */
    public function create(string $source_code, string $language, string $input = '', bool $longpoll = false, int $longpoll_timeout = 10): Entities\OutputEntityInterface
    {
        $entity = new CreateEntity(compact('source_code', 'language', 'input', 'longpoll', 'longpoll_timeout'));

        return (new CreateRequest())->request($entity);
    }

    /**
     * @param string $api_key
     * @return void
     */
    public static function setApiKey(string $api_key): void
    {
        self::$api_key = $api_key;
    }

    /**
     * @return string
     */
    public static function getApiKey(): string
    {
        return self::$api_key;
    }
}
