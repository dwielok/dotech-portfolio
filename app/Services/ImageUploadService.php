<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadService
{
    public function upload(
        UploadedFile $file,
        string $directory = 'uploads',
        int $maxWidth = 1920
    ): string {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $directory . '/' . $filename;

        // Store the file
        $file->storeAs($directory, $filename, 'public');

        return $path;
    }

    public function delete(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    public function uploadMultiple(array $files, string $directory = 'uploads'): array
    {
        $paths = [];
        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $paths[] = $this->upload($file, $directory);
            }
        }
        return $paths;
    }
}
