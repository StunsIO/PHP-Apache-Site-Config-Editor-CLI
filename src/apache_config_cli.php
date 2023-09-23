<?php
require 'functions.php';

if ($argc != 5) {
    echo "Usage: php apache_config_cli.php <file_path> <directive> <key> <value>\n";
    exit(1);
}

$file_path = $argv[1];
$directive = $argv[2];
$key = $argv[3];
$value = $argv[4];

$parsed_config = parse_apache_config($file_path);

if ($parsed_config === null) {
    echo "Error reading the file.\n";
    exit(1);
}

$edited = edit_apache($parsed_config, $directive, $key, $value);
if ($edited) {
    $apache_config = generate_apache_config($edited);
    echo $apache_config;
} else {
    echo "Error editing the directive (Directive or key not found).\n";
    exit(1);
}