<?php

function getVariableName($var)
{
    foreach ($GLOBALS as $varName => $value) {
        if ($value === $var) {
            return '$' . $varName;
        }
    }
    return;
}

function echo_br($input)
{
    echo "<br>" . $input . "<br>";
}

function print_t($input)
{
    $out = '<h1>' . getVariableName($input) . ' var_type: ' . gettype($input) . '</h1>';
    $out .= '<table>';
    foreach ($input as $value) {
        $out .= '<tr>';
        $out .= '<td>' . key($input);
        $out .= '</td><td>';
        $out .= $value . '</td>';
        $out .= '</tr>';
        next($input);
    }
    $out .= '</table>';
    echo $out;
    return;
}

