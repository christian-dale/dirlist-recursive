<?php

/**
 * Return all files and sub directories as a list.
 * @param String $path - The directory to search in.
 **/
function dirlist_rec($path) {
    $dir_list = [];

    if (!function_exists("recursive_dir_traverse")) {
        function recursive_dir_traverse(&$dir_list, $path) {
            $list = new DirectoryIterator(realpath($path));

            foreach ($list as $item) {
                // Skip bread-crums.
                if ($item == "." || $item == "..") {
                    continue;
                }

                // The string composing the full pathname.
                $pathname_str = $path . "/" . $item;

                if ($item->isFile()) {
                    $dir_list[] = $pathname_str;
                }

                if ($item->isDir()) {
                    recursive_dir_traverse($dir_list, $pathname_str);
                }
            }
        }
    }

    recursive_dir_traverse($dir_list, $path);

    return $dir_list;
}
