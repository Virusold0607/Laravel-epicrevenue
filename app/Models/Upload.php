<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;

class Upload extends Model
{
    use HasFactory;

    public function __construct() {
    }

    public function getOriginalFileFullName() {
        return $this->file_original_name . "." . $this->extension;
    }

    public function  getImageOptimizedFullName () {
        if(in_array($this->extension, array('jpeg','jpg','png','bmp')))
            return asset("uploads/" . $this->type . "/" . $this->file_name);
        else
            return asset('images/file.svg');
    }

    public function  getFilePath () {
        return asset("uploads/" . $this->type . "/" . $this->file_name);
    }
}
