<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class TouristSite
{
    /**
     * Obtiene todos los lugares turísticos desde el archivo JSON.
     *
     * @return array
     */
    public static function all()
    {
        $path = database_path('data/tourist_sites.json');

        if (!File::exists($path)) {
            return [];
        }

        $json = File::get($path);
        return json_decode($json, true);
    }

    /**
     * Busca un lugar turístico específico por su ID.
     *
     * @param int $id
     * @return array|null
     */
    public static function find($id)
    {
        $sites = self::all();

        foreach ($sites as $site) {
            if ($site['id'] == $id) {
                return $site;
            }
        }

        return null;
    }
}
