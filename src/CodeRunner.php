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

use ErrorException;
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
    public const LANG_COMMON_LISP = 'commonlisp';
    public const LANG_NADESIKO = 'nadesiko';
    public const LANG_TYPESCRIPT = 'typescript';
    public const LANG_PLAIN = 'plain';

    /**
     * @var array - language constant => program language name
     */
    public const LANGS = [
        self::LANG_C => 'C',
        self::LANG_CPP => 'C++',
        self::LANG_OBJECTIVE_C => 'Objective-C',
        self::LANG_JAVA => 'Java',
        self::LANG_KOTLIN => 'Kotlin',
        self::LANG_SCALA => 'Scala',
        self::LANG_SWIFT => 'Swift',
        self::LANG_CSHARP => 'C#',
        self::LANG_GO => 'GO',
        self::LANG_HASKELL => 'Haskell',
        self::LANG_ERLANG => 'Erlang',
        self::LANG_PERL => 'Perl',
        self::LANG_PYTHON => 'Python2',
        self::LANG_PYTHON3 => 'Python3',
        self::LANG_RUBY => 'Ruby',
        self::LANG_PHP => 'PHP',
        self::LANG_BASH => 'Bash',
        self::LANG_R => 'R',
        self::LANG_JAVASCRIPT => 'JavaScript',
        self::LANG_COFFEESCRIPT => 'CoffeeScript',
        self::LANG_VB => 'VB',
        self::LANG_COBOL => 'Cobol',
        self::LANG_FSHARP => 'F#',
        self::LANG_D => 'D',
        self::LANG_CLOJURE => 'Clojure',
        self::LANG_ELIXIR => 'Elixir',
        self::LANG_MYSQL => 'MySQL',
        self::LANG_RUST => 'Rust',
        self::LANG_SCHEME => 'Scheme',
        self::LANG_COMMON_LISP => 'CommonLisp',
        self::LANG_NADESIKO => 'なでしこ',
        self::LANG_TYPESCRIPT => 'TypeScript',
        self::LANG_PLAIN => 'PlainText',
    ];

    /**
     * @var array - language constant => extension
     */
    public const EXTENSIONS = [
        self::LANG_C => '.c',
        self::LANG_CPP => '.cpp',
        self::LANG_OBJECTIVE_C => '.m',
        self::LANG_JAVA => '.java',
        self::LANG_KOTLIN => '.kt',
        self::LANG_SCALA => '.scala',
        self::LANG_SWIFT => '.swift',
        self::LANG_CSHARP => '.cs',
        self::LANG_GO => '.go',
        self::LANG_HASKELL => '.hs',
        self::LANG_ERLANG => '.erl',
        self::LANG_PERL => '.pl',
        self::LANG_PYTHON => '.py',
        self::LANG_PYTHON3 => '.py',
        self::LANG_RUBY => '.rb',
        self::LANG_PHP => '.php',
        self::LANG_BASH => '.sh',
        self::LANG_R => '.R',
        self::LANG_JAVASCRIPT => '.js',
        self::LANG_COFFEESCRIPT => '.coffee',
        self::LANG_VB => '.vb',
        self::LANG_COBOL => '.cob',
        self::LANG_FSHARP => '.fs',
        self::LANG_D => '.d',
        self::LANG_CLOJURE => '.clj',
        self::LANG_ELIXIR => '.exs',
        self::LANG_MYSQL => '.sql',
        self::LANG_RUST => '.rs',
        self::LANG_SCHEME => '.scm',
        self::LANG_COMMON_LISP => '.lisp',
        self::LANG_NADESIKO => '.nako3',
        self::LANG_TYPESCRIPT => '.ts',
        self::LANG_PLAIN => '.txt',
    ];

    /**
     * @var array - language constant => mimetype
     */
    public const CODE_MIME = [
        self::LANG_C => 'text/x-csrc',
        self::LANG_CPP => 'text/x-c++src',
        self::LANG_OBJECTIVE_C => 'text/x-objectivec',
        self::LANG_JAVA => 'text/x-java',
        self::LANG_KOTLIN => 'Kotlin',
        self::LANG_SCALA => 'text/x-scala',
        self::LANG_SWIFT => 'text/x-swift',
        self::LANG_CSHARP => 'text/x-csharp',
        self::LANG_GO => 'text/x-go',
        self::LANG_HASKELL => 'text/x-haskell',
        self::LANG_ERLANG => 'text/x-erlang',
        self::LANG_PERL => 'text/x-perl',
        self::LANG_PYTHON => 'text/x-python',
        self::LANG_PYTHON3 => 'text/x-python',
        self::LANG_RUBY => 'text/x-ruby',
        self::LANG_PHP => 'text/x-php',
        self::LANG_BASH => 'text/x-sh',
        self::LANG_R => 'text/x-rsrc',
        self::LANG_JAVASCRIPT => 'text/javascript',
        self::LANG_COFFEESCRIPT => 'text/javascript',
        self::LANG_VB => 'text/x-vb',
        self::LANG_COBOL => 'text/x-cobol"',
        self::LANG_FSHARP => 'text/x-fsharp',
        self::LANG_D => 'text/x-d',
        self::LANG_CLOJURE => 'text/x-clojure',
        self::LANG_ELIXIR => 'text/x-elixir',
        self::LANG_MYSQL => 'text/x-mysql',
        self::LANG_RUST => 'text/x-rustsrc',
        self::LANG_SCHEME => 'text/x-scheme',
        self::LANG_COMMON_LISP => 'text/x-common-lisp',
        self::LANG_NADESIKO => 'text/x-nadeshiko',
        self::LANG_TYPESCRIPT => 'text/typescript',
        self::LANG_PLAIN => 'text/plain',
    ];

    /**
     * @var string - status running
     */
    public const STATUS_RUNNING = 'running';

    /**
     * @var string - status completed
     */
    public const STATUS_COMPLETED = 'completed';

    /**
     * @var string - paiza api key
     */
    protected static string $api_key = 'guest';

    /**
     * Start compiling and executing the program code.
     *
     * @param string $source_code - program code
     * @param string $language - language constant
     * @param string $input - String passed in standard input
     * @param bool $longpoll - Wait for compilation and execution to complete.
     * @param int $longpoll_timeout - longpoll timeout time.
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \ErrorException
     * @return \Suzunone\CodeRunner\Entities\OutputEntityInterface
     */
    public function create(string $source_code, string $language, string $input = '', bool $longpoll = false, int $longpoll_timeout = 10): Entities\OutputEntityInterface
    {
        $entity = new CreateEntity(compact('source_code', 'language', 'input', 'longpoll', 'longpoll_timeout'));

        return (new CreateRequest())->request($entity);
    }

    /**
     * Set the API Key.
     * @param string $api_key
     * @return void
     */
    public static function setApiKey(string $api_key): void
    {
        self::$api_key = $api_key;
    }

    /**
     * Get the API Key.
     * @return string
     */
    public static function getApiKey(): string
    {
        return self::$api_key;
    }

    /**
     * Returns a template of the program code according to the language constants.
     *
     * @param string $language - language constants
     * @throws \ErrorException
     * @return string - program code
     */
    public function getTemplate(string $language): string
    {
        $tpl_dir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'code_template' . DIRECTORY_SEPARATOR;

        $ext = $this->getLangExtension($language);
        if ($ext === '') {
            // @codeCoverageIgnoreStart
            throw new ErrorException('fatal: can not use lang ' . $language . '.');
            // @codeCoverageIgnoreEnd
        }

        return file_get_contents($tpl_dir . $language . self::EXTENSIONS[$language]);
    }

    /**
     * Get the program name according to the language constant.
     * @param string $language
     * @return string
     */
    public function getLanguageName(string $language): string
    {
        return self::LANGS[$language] ?? '';
    }

    /**
     * Get the program file extension according to the language constant.
     * @param string $language
     * @return string
     */
    public function getLangExtension(string $language): string
    {
        return self::EXTENSIONS[$language] ?? '';
    }
}
