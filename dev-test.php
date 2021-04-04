<?php

use Rix\Lexer\Lexer;

require_once 'vendor/autoload.php';

$lexer = new Lexer();

$code = <<<EOF
@hello_macro('123')
fn main() {
    hello_world({
        a: "abc def",
        b: map!(1, 2, 3) // hello
    });
    0xef
}
EOF;

$rslt = $lexer->tokenize(code: $code);

array_map(fn ($x, $i) => print($i . ': ' . $x . PHP_EOL), $rslt, array_keys($rslt));

var_dump($lexer->standardize($rslt));
