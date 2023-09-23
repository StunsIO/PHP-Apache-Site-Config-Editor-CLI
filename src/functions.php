<?php
function generate_apache_config($config)
{
    $apache_config = "";
    if (is_string($config)) {
        $config = json_decode($config, true);
    }
    foreach ($config as $directive => $values) {
        $apache_config .= "<$directive>\n";
        foreach ($values as $key => $value) {
            $apache_config .= "    $key $value\n";
        }

        $apache_config .= "</VirtualHost>\n";
    }
    return $apache_config;
}

function edit_apache($config_string, $directive, $key, $value)
{
    $config = $config_string;
    if (isset($config[$directive])) {

        $config[$directive][$key] = $value;
        $new_content = json_encode($config, JSON_PRETTY_PRINT);
        echo "Directive edited successfully.\n--------------------------------------\n";
        return $new_content;
    }
    return false;
}


function parse_apache_config($file_path)
{
    $config = [];
    $current_directive = null;
    $lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return null;
    }
    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line) || $line[0] === '#') {
            continue;
        }
        if ($line[0] . $line[1] === "</") continue;
        if ($line[0] === '<' && $line[strlen($line) - 1] === '>') {
            $current_directive = substr($line, 1, -1);
            $config[$current_directive] = [];
        } elseif ($current_directive !== null) {
            list($key, $value) = explode(' ', $line, 2);
            $config[$current_directive][$key] = $value;
        }
    }
    return $config;
}