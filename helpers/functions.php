<?php

function create_input($name, $type, $label, $value = "", $required = false, $error_message = "")
{
    $required_attr = $required ? "required" : "";
    $error_class = !empty($error_message) ? "border-red-500" : "";
    return "
    <div class='w-full'>
        <label for='{$name}' class='block text-sm font-medium text-gray-700'>{$label}</label>
        <input type='{$type}' name='{$name}' id='{$name}' value='{$value}' class='mt-1 block w-full px-3 py-2 border {$error_class} rounded-md shadow-sm focus:outline-none sm:text-sm' {$required_attr}>
        <p class='text-red-500 text-xs italic'>{$error_message}</p>
    </div>";
}
