<?php

namespace App\Helper;

use File;
use Image;

class imageUpload
{
    static function singleUpload($name, $directory, $file)
    {
        $rand = uniqid(); // Önceki sürümden farklı olarak benzersiz bir ID kullanma önerisi
        $dir = 'images/' . $directory . '/' . $rand;
        $dirLarge = $dir . '/large';

        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true); // 0755 izinleri örnektir, ihtiyaca göre ayarlayabilirsiniz
        }

        if (!File::isDirectory($dirLarge)) {
            File::makeDirectory($dirLarge, 0755, true);
        }

        if (!empty($file)) {
            $filename = time() . '_' . rand(1, 10000) . '.' . $file->getClientOriginalExtension();
            $path = public_path($dir . '/' . $filename);
            $path2 = public_path($dirLarge . '/' . $filename);

            Image::make($file->getRealPath())->save($path2);
            Image::make($file->getRealPath())->resize(250, 250)->save($path);

            return $dir . '/' . $filename;
        } else {
            return "";
        }
    }
}
