<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class OptimizePicture implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $path, public $newWidth = 500, public $quality = 75)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Obtener información de la imagen original
        list($width, $height, $imageType) = getimagesize($this->path);

        // Calcular la nueva altura proporcional
        $newHeight = ($height / $width) * $this->newWidth;

        // Crear una imagen desde el archivo original según el tipo
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($this->path);
                break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($this->path);
                break;
            case IMAGETYPE_WEBP:
                $image = imagecreatefromwebp($this->path);
                break;
            default:
                throw new \Exception("Formato de imagen no soportado.");
        }

        // Crear una nueva imagen redimensionada
        $optimizedImage = imagecreatetruecolor($this->newWidth, $newHeight);

        // Preservar la transparencia para PNG
        if ($imageType == IMAGETYPE_PNG) {
            imagealphablending($optimizedImage, false);
            imagesavealpha($optimizedImage, true);
        }

        // Redimensionar la imagen
        imagecopyresampled($optimizedImage, $image, 0, 0, 0, 0, $this->newWidth, $newHeight, $width, $height);

        // Guardar la imagen optimizada
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                imagejpeg($optimizedImage, $this->path, $this->quality);
                break;
            case IMAGETYPE_PNG:
                imagepng($optimizedImage, $this->path, 9); // 0-9, 9 es mayor compresión
                break;
            case IMAGETYPE_WEBP:
                imagewebp($optimizedImage, $this->path, $this->quality);
                break;
        }

        // Liberar memoria
        imagedestroy($image);
        imagedestroy($optimizedImage);
    }
}
