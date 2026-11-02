<?php

class ImageUpload {
    public static function upload($image)
    {
        $extension = strtolower($image->extension());
        $filename = time().rand(1,1000).".".$extension;
        $image->move('uploads',$filename);
        return $filename;
    }
}