<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TouristSite;

class TouristSiteController extends Controller
{
    /**
     * Muestra la lista de todos los lugares turísticos (Catálogo).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sites = TouristSite::all();
        return view('tourist_sites.index', compact('sites'));
    }

    /**
     * Muestra el detalle de un lugar turístico específico y su formulario.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $site = TouristSite::find($id);

        if (!$site) {
            abort(404, 'Destino turístico no encontrado');
        }

        return view('tourist_sites.show', compact('site'));
    }

    /**
     * Procesa la petición POST del formulario de contacto.
     * Mapea el ciclo de vida del flujo de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function submitContact(Request $request)
    {
        // Validar datos de la petición (request)
        $validated = $request->validate([
            'site_id' => 'required|integer',
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'message' => 'required|string|min:10|max:1000',
        ]);

        $site = TouristSite::find($validated['site_id']);

        if (!$site) {
            abort(404, 'Destino turístico no encontrado');
        }

        // Retornamos la vista de éxito con los datos que fluyeron en la petición
        return view('tourist_sites.contact_success', [
            'data' => $validated,
            'site' => $site
        ]);
    }
}
