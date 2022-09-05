<?php

/**
 * Require file in /app/views
 * 'folder.file === folder/file
 */
function view(string $file, array $variable = [])
{
    $file = str_replace(['.', '_'], '/', $file) . '.php';
    $file = DIR_VIEW . $file;

    if (file_exists($file)) {
        extract($variable);
        require_once($file);
        return true;
    }
    return false;
}
