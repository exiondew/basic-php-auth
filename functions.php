<?php
function create_input(string $name, string $type, string $placeholder = null, string $default_value = null, bool $required = false, string $error_message = null)
{
    return '
    <div class="w-full flex flex-col">
        <input 
        type="' . $type . '" 
        name="' . $name . '" 
        placeholder="' . $placeholder . '" 
        ' . ($required ? 'required' : '') . ' 
        value="' . $default_value . '" 
        class="bg-transparent border-gray-300 duration-200 px-2 py-1 border-b focus:border-black outline-none">

        <span class="text-red-500 text-xs ' . ($error_message ? 'visible' : 'invisible') . '">
            ' . ($error_message ?: '-') . '
        </span>
    </div>
    ';
}