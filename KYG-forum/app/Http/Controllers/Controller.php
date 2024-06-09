<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

/**
 * All methods are protected so they can be used only by the same class calling the method, not an instance.
 */
abstract class Controller
{
    /**
     * Get image object.
     * 
     * @param string Path to the image
     */
    protected function getImage(string $path_to_image){
        return Storage::disk('public')->get($path_to_image);
    }

    /**
     * Store an image in a public storage path.
     *  
     * @param object Image object.
     * @param array Values validated before the call of the function. ['title', 'img'] are required.
     * @param string Path relative to Storage/app/public.
     * @return string Path that asset can use to access the stored image.
     */
    protected function storeImage(object $image, array $validated, string $storage_path){

        // Generar un nombre de imagen, si les parece, la convencion aca es
        // {nombre-juego}-{tiempoCreacion}.{extensionImagen}
        // Se podria hacer un hash o un UUID, no se que cambio en performance tendria por la cantidad de caracteres.
        $imageName = $this->createNameImage($validated['title'], $validated['img']->extension());

        // Store in 'storage/app/games/images/**'
        

        Storage::disk('public')->putFileAs($storage_path, $image, $imageName);
        dd();
        exit();
        return $storage_path . $imageName;
    }

    /**
     * Update name of the image related to the parent table's name.
     * 
     * @param object Parent's object instance.
     * @param array Values validated before the call of the function. ['title', 'img'] are required.
     * @param string Path relative to Storage/app/public.
     * @return string Path that asset can use to access the stored image.
     */
    protected function updateStoredName(object $parent_table, array $validated, string $storage_path){
        $image_path = $storage_path . $this->createNameImage($validated['title'], pathinfo($parent_table->img)['extension']);
        Storage::disk('public')->move($parent_table->img, $image_path);
        return $image_path;
    }

    /**
     * Create a name for the image stored.
     * 
     * @param string Name of the parent table.
     * @param string Extension of the image.
     * @return string Generated name for the stored image file.
     */
    protected function createNameImage(string $name, string $imgExtension){
        return str_replace(' ', '-', str_replace(':', '', $name)) . '-' . time() . '.' . $imgExtension;
    }

    /**
     * Delete stored image.
     * 
     * @param string Path to the file from the Storage/app/public/ directory.
     */
    protected function deleteImage(string $path_to_image){
        Storage::disk('public')->delete($path_to_image);
    }
}
