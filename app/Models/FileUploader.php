<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;

class FileUploader extends Model
{
    public static function upload($uploaded_file, $upload_to, $width = null, $height = null, $optimized_width = 320, $optimized_height = null)
    {
        try {
            if (!$uploaded_file) {
                return 'No file provided';
            }

            // Validate file
            if (!$uploaded_file->isValid()) {
                return 'Invalid file upload';
            }

            // Check if file exists and is readable
            if (!file_exists($uploaded_file->path()) || !is_readable($uploaded_file->path())) {
                return 'Uploaded file is not accessible';
            }

            // Determine upload path and filename
            if (is_dir($upload_to)) {
                $file_name = time() . '-' . random(30) . '.' . $uploaded_file->extension();
            } else {
                $uploaded_path_arr = explode('/', $upload_to);
                $file_name = end($uploaded_path_arr);
                $upload_to = str_replace('/' . $file_name, "", $upload_to);

                if (!is_dir($upload_to)) {
                    // Try to create directory
                    if (!mkdir($upload_to, 0755, true)) {
                        return "Cannot create upload directory: " . $upload_to;
                    }
                }
            }

            // Ensure upload directory is writable
            if (!is_writable($upload_to)) {
                return 'Upload directory is not writable: ' . $upload_to;
            }

            $destination_path = $upload_to . '/' . $file_name;

            if ($width == null) {
                // Simple file move
                if (!$uploaded_file->move($upload_to, $file_name)) {
                    return 'Failed to move uploaded file';
                }
            } else {
                // Image processing
                try {
                    $image = ImageManager::gd()->read($uploaded_file->path());
                    $image->resize($width, $height, function ($constraint) {
                        $constraint->upsize();
                        $constraint->aspectRatio();
                    });
                    $image->save($destination_path);

                    // Ultra Image optimization
                    $optimized_path = $upload_to . '/optimized';
                    if ($optimized_width && is_dir($optimized_path)) {
                        $optimized_image = ImageManager::gd()->read($uploaded_file->path());
                        $optimized_image->resize($optimized_width, $optimized_height, function ($constraint) {
                            $constraint->upsize();
                            $constraint->aspectRatio();
                        });
                        $optimized_image->save($optimized_path . '/' . $file_name);
                    }
                } catch (\Exception $imageException) {
                    Log::error('Image processing failed: ' . $imageException->getMessage());
                    return 'Image processing failed: ' . $imageException->getMessage();
                }
            }

            // Verify file was created
            if (!file_exists($destination_path)) {
                return 'File was not saved successfully';
            }

            return $file_name;
        } catch (\Exception $e) {
            Log::error('File upload failed: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return 'Upload failed: ' . $e->getMessage();
        }
    }
}
