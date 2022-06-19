<?php

declare(strict_types = 1);

namespace App\Services;

use App\Services\Contracts\Upload;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class UploadService implements Upload
{
    public function uploadImage(UploadedFile $file): string
    {
        $path = $file->storeAs('posts', $file->hashName(), 'upload');

        if (!$path) {
            throw new UploadException("File wasn't upload");
        }

        return $path;
    }
}
