<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait
{
    public function storageTraitUpload($request, $field_name, $folder_name)
    {
        if($request->hasFile($field_name))
        {
            $file = $request->$field_name;
            $file_name = $file->getClientOriginalName();
            $file_name_hash = Str::random(20).'.'.$file->getClientOriginalExtension();
            $file_path = $request->file($field_name)->storeAs(
                $folder_name, $file_name_hash);
            $data_upload_trait = [
                'file_name' => $file_name,
                'file_path' => Storage::url($file_path)
            ];
            return $data_upload_trait;
        }
    }

    public function storageTraitUploadMultiple($file, $folder_name)
    {
        if($file)
        {
            $file_name = $file->getClientOriginalName();
            $file_name_hash = Str::random(20).'.'.$file->getClientOriginalExtension();
            $file_path = $file->storeAs(
                $folder_name, $file_name_hash);
            $data_upload_trait = [
                'file_name' => $file_name,
                'file_path' => Storage::url($file_path)
            ];
            return $data_upload_trait;
        }
    }
}