CodeRunner
=========================================
![example workflow](https://github.com/suzunone/CodeRunner/actions/workflows/php.yml/badge.svg)

Introduction
-----------------------------------------
[paiza.io](https://paiza.io/ja) API unofficial wrapper. Using
the [Paiza API](http://api.paiza.io/docs/swagger/#!/runners/), compile and execute arbitrary code in a variety of
programming languages.


Notice for using
-----------------------------------------

This package use [paiza.io](https://paiza.io/ja) API. 
So please read [term of use (Japanese only)](http://paiza.jp/guide/kiyaku).


Installation Instructions
=========================================

Composer
------------------------------------------

```
composer require suzunone/code-runner
```

Example
=========================================

Example1
------------------------------------------

### Source code
``` .php
<?php

use Suzunone\CodeRunner\CodeRunner;

$source_code = 'console.log("Hello, world...");';

$CodeRunner = new CodeRunner;

$entity = $CodeRunner->create($source_code, CodeRunner::LANG_JAVASCRIPT);
while ($entity->is_running) {
    $entity = $entity->status();
    sleep(1);
}

var_dump($entity->details()->toArray());
```

### Results
```
array(17) {
  ["id"]=>
  string(22) ""
  ["language"]=>
  string(10) "javascript"
  ["note"]=>
  NULL
  ["status"]=>
  string(9) "completed"
  ["build_stdout"]=>
  NULL
  ["build_stderr"]=>
  NULL
  ["build_exit_code"]=>
  int(0)
  ["build_time"]=>
  NULL
  ["build_memory"]=>
  NULL
  ["build_result"]=>
  NULL
  ["stdout"]=>
  string(16) "Hello, world...
"
  ["stderr"]=>
  string(0) ""
  ["exit_code"]=>
  int(0)
  ["time"]=>
  string(4) "0.07"
  ["memory"]=>
  int(32408000)
  ["connections"]=>
  int(0)
  ["result"]=>
  string(7) "success"

```


API Reference
=========================================

Suzunone\CodeRunner\CodeRunner
------------------------------------------

### constants.

#### CodeRunner::LANG_C ***(string)***

**C** Language constant

#### CodeRunner::LANG_CPP ***(string)***

**C++** Language constant

#### CodeRunner::LANG_OBJECTIVE_C ***(string)***

**Objective-C** Language constant

#### CodeRunner::LANG_JAVA ***(string)***

**Java** Language constant

#### CodeRunner::LANG_KOTLIN ***(string)***

**Kotlin** Language constant

#### CodeRunner::LANG_SCALA ***(string)***

**Scala** Language constant

#### CodeRunner::LANG_SWIFT ***(string)***

**Swift** Language constant

#### CodeRunner::LANG_CSHARP ***(string)***

**C#** Language constant

#### CodeRunner::LANG_GO ***(string)***

**GO** Language constant

#### CodeRunner::LANG_HASKELL ***(string)***

**Haskell** Language constant

#### CodeRunner::LANG_ERLANG ***(string)***

**Erlang** Language constant

#### CodeRunner::LANG_PERL ***(string)***

**Perl** Language constant

#### CodeRunner::LANG_PYTHON ***(string)***

**Python2** Language constant ***(string)***

#### CodeRunner::LANG_PYTHON3 ***(string)***

**Python3** Language constant

#### CodeRunner::LANG_RUBY ***(string)***

**Ruby** Language constant

#### CodeRunner::LANG_PHP ***(string)***

**PHP** Language constant

#### CodeRunner::LANG_BASH ***(string)***

**Bash** Language constant

#### CodeRunner::LANG_R ***(string)***

**R** Language constant

#### CodeRunner::LANG_JAVASCRIPT ***(string)***

**JavaScript** Language constant

#### CodeRunner::LANG_COFFEESCRIPT ***(string)***

**CoffeeScript** Language constant

#### CodeRunner::LANG_VB ***(string)***

**VB** Language constant

#### CodeRunner::LANG_COBOL ***(string)***

**Cobol** Language constant

#### CodeRunner::LANG_FSHARP ***(string)***

**F#** Language constant

#### CodeRunner::LANG_D ***(string)***

**D** Language constant

#### CodeRunner::LANG_CLOJURE ***(string)***

**Clojure** Language constant

#### CodeRunner::LANG_ELIXIR ***(string)***

**Elixir** Language constant

#### CodeRunner::LANG_MYSQL ***(string)***

**MySQL** Language constant

#### CodeRunner::LANG_RUST ***(string)***

**Rust** Language constant

#### CodeRunner::LANG_SCHEME ***(string)***

**Scheme** Language constant

#### CodeRunner::LANG_COMMON_LISP ***(string)***

**Common Lisp** Language constant

#### CodeRunner::LANG_NADESIKO ***(string)***

**なでしこ** Language constant

#### CodeRunner::LANG_TYPESCRIPT ***(string)***

**TypeScript** Language constant

#### CodeRunner::LANG_PLAIN ***(string)***

**PlainText** Language constant

#### CodeRunner::LANGS ***(array)***

#### CodeRunner::EXTENSIONS ***(array)***

#### CodeRunner::STATUS_RUNNING ***(string)***

is status already running.

#### CodeRunner::STATUS_COMPLETED ***(string)***

is status already completed.

### CodeRunner::create()

Start compiling and executing the program code.

``` .php

CodeRunner::create(string $source_code, string $language, string $input = '', bool $longpoll = false, int $longpoll_timeout = 10): Suzunone\CodeRunner\Entities\OutputEntityInterface

```

#### **Parameters:**

| Parameter           | Type       | Description                                     |
|---------------------|------------|-------------------------------------------------|
| `$source_code`      | **string** | program code                                    |
| `$language`         | **string** | language constant                               |
| `$input`            | **string** | string passed in standard input                 |
| `$longpoll`         | **bool**   | Wait for compilation and execution to complete. |
| `$longpoll_timeout` | **int**    | longpoll timeout time.                          |

#### **Return:**

``` .php
\Suzunone\CodeRunner\Entities\OutputEntityInterface
```

### CodeRunner::getTemplate()

Returns a template of the program code according to the language constants.

``` .php
CodeRunner::getTemplate(string $language): string
```

#### **Parameters:**

| Parameter   | Type       | Description       |
|-------------|------------|-------------------|
| `$language` | **string** | language constant |

#### **Return:**

``` .php
string
```

### CodeRunner::getLanguageName()

Get the program name according to the language constant.

``` .php
CodeRunner::getLanguageName(string $language): string
```

#### **Parameters:**

| Parameter   | Type       | Description       |
|-------------|------------|-------------------|
| `$language` | **string** | language constant |

#### **Return:**

``` .php
string
```

### CodeRunner::getLangExtension()

Get the program file extension according to the language constant.

``` .php
CodeRunner::getLangExtension(string $language): string
```

#### **Parameters:**

| Parameter   | Type       | Description       |
|-------------|------------|-------------------|
| `$language` | **string** | language constant |

#### **Return:**

``` .php
string
```

### CodeRunner::getApiKey()

Get the API Key.

``` .php
CodeRunner::getApiKey(): string
```

#### **Parameters:**

#### **Return:**

``` .php
string
```

### CodeRunner::setApiKey()

Set the API Key.

``` .php
CodeRunner::setApiKey(string $api_key): void
```

#### **Parameters:**

| Parameter  | Type       | Description |
|------------|------------|-------------|
| `$api_key` | **string** | API KEY     |

#### **Return:**

``` .php
string
```

\Suzunone\CodeRunner\Entities\OutputEntityInterface
-----------------------------------------------------

Get the compilation and execution status of a program

### OutputEntityInterface::status()

``` .php

OutputEntityInterface::status(): StatusEntity;

```

#### **Parameters:**

#### **Return:**

``` .php
Suzunone\CodeRunner\Entities\Input|StatusEntity
```

### OutputEntityInterface::details()

Get the results of compiling and executing a program.

``` .php
OutputEntityInterface::details(): StatusEntity;

```

#### **Parameters:**

#### **Return:**

``` .php
Suzunone\CodeRunner\Entities\Input|StatusEntity
```

### OutputEntityInterface::getResponse()

Get Response data.

``` .php
getResponse() : ResponseElementInterface
```

#### **Parameters:**

#### **Return:**

``` .php
Suzunone\CodeRunner\Entities\Elements\Input|ResponseElementInterface
```

\Suzunone\CodeRunner\Entities\Output\CreateEntity
-----------------------------------------------------

### properties

| Properties        | Type                        | Description                                                   |
|-------------------|-----------------------------|---------------------------------------------------------------|
| **$id**           | **string** ***[readonly]*** | session id(This should be used in get_status/get_details API) |
| **$status**       | **string** ***[readonly]*** | running', 'completed'                                         |
| **$error**        | **string** ***[readonly]*** | error message.                                                |
| **$is_error**     | **bool** ***[readonly]***   | if error is true                                              |
| **$is_completed** | **bool** ***[readonly]***   | if completed is true                                          |
| **$is_running**   | **bool** ***[readonly]***   | if running is true                                            |

\Suzunone\CodeRunner\Entities\Output\StatusEntity
-----------------------------------------------------

### properties

| Properties        | Type                        | Description                                                   |
|-------------------|-----------------------------|---------------------------------------------------------------|
| **$id**           | **string** ***[readonly]*** | session id(This should be used in get_status/get_details API) |
| **$status**       | **string** ***[readonly]*** | running', 'completed'                                         |
| **$is_error**     | **bool** ***[readonly]***   | if error is true                                              |
| **$is_completed** | **bool** ***[readonly]***   | if completed is true                                          |
| **$is_running**   | **bool** ***[readonly]***   | if running is true                                            |

\Suzunone\CodeRunner\Entities\Output\DetailsEntity
-----------------------------------------------------

### properties

| Properties          | Type                      | Description                                 |
|---------------------|---------------------------|---------------------------------------------|
| **id**              | **string**                | Session id                                  |
| **language**        | **string**                | language                                    |
| **note**            | **string**                | note                                        |
| **status**          | **string**                | status('running', 'completed')              |
| **build_stdout**    | **?string**               | build output to stdout                      |
| **build_stderr**    | **?string**               | build output to stderr                      |
| **build_exit_code** | **int**                   | build exit code                             |
| **build_time**      | **?int**                  | build time(second)                          |
| **build_memory**    | **?int**                  | build memory usage(bytes)                   |
| **build_result**    | **?int**                  | build result('success', 'failure', 'error') |
| **stdout**          | **?string**               | code output to stdout                       |
| **stderr**          | **?string**               | code output to stderr                       |
| **exit_code**       | **int**                   | exit code                                   |
| **time**            | **int**                   | time to run(seconds)                        |
| **memory**          | **int**                   | code memory usage(bytes)                    |
| **result**          | **string**                | code result('success', 'failure', 'error')  |
| **$is_completed**   | **bool** ***[readonly]*** | if completed is true                        |
| **$is_running**     | **bool** ***[readonly]*** | if running is true                          |

<!--
\Suzunone\CodeRunner\Entities\OutputEntityInterface
-----------------------------------------------------

### OutputEntityInterface::()


``` .php

```

#### **Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$source_code` | **** |  |

#### **Return:**
``` .php

```
-->
