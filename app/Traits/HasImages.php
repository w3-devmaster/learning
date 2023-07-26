<?php

namespace App\Traits;

use App\Models\Gallery;
use Illuminate\Support\Str;

trait HasImages {

    public function getFileName() {
        return Str::upper(md5(uniqid()));
    }

    public function image() {
        return $this->morphOne(Gallery::class,'model');
    }

    public function images() {
        return $this->morphMany(Gallery::class,'model');
    }

    public function saveFromRequest($collection,$images) {

        if(is_array($images)){
            foreach($images as $image) {

                $file_name =  $this->getFileName() . '.' . $image->getClientOriginalExtension();
                $mime = $image->getMimeType();
                $path = $image->storeAs('public/images/' . $collection . '/'.$file_name);

                $this->images()->create([
                    'mimes' => $mime,
                    'file_name' => $file_name,
                    'path' => $path,
                ]);
            }
        }else{
            $file_name = $this->getFileName() . '.' . $images->getClientOriginalExtension();
            $mime = $images->getMimeType();
            $path = $images->storeAs('public/images/' . $collection . '/'.$file_name);

            $this->image()->create([
                'mimes' => $mime,
                'file_name' => $file_name,
                'path' => $path,
            ]);
        }
    }
}
