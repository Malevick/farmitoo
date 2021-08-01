<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude(['var','vendor'])
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        "@Symfony:risky" => true,
        "array_syntax" => ["syntax" => "short"],
        "php_unit_construct" => true,
        "php_unit_strict" => true,
        "strict_param" => true,
        "declare_strict_types" => true,
        "binary_operator_spaces" => false,
        "ordered_imports" => true,
        "no_superfluous_phpdoc_tags" => false,
    ])
    ->setFinder($finder)
;
