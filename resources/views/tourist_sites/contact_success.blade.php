@extends('layouts.app')

@section('title', 'Solicitud enviada - El Salvador Turismo')

@section('content')

<div class="max-w-xl mx-auto text-center">
    <div class="w-20 h-20 mx-auto mb-8 rounded-full bg-green-50 border border-green-100 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-10 h-10 text-green-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
        </svg>
    </div>

    <h1 class="text-3xl font-extrabold text-slate-900 mb-3">¡Solicitud enviada con éxito!</h1>
    <p class="text-slate-600 mb-10">
        Gracias, <span class="font-semibold text-slate-800">{{ $data['name'] }}</span>. Hemos recibido tu mensaje sobre
        <span class="font-semibold text-slate-800">{{ $site['title'] }}</span> y te contactaremos pronto a
        <span class="font-semibold text-slate-800">{{ $data['email'] }}</span>.
    </p>

    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 text-left mb-10">
        <span class="text-xs text-slate-400 font-bold uppercase tracking-wider">Resumen de tu solicitud</span>

        <div class="mt-4 space-y-4">
            <div>
                <p class="text-xs text-slate-400 font-semibold">Destino</p>
                <p class="text-sm font-semibold text-slate-800">{{ $site['title'] }} — {{ $site['department'] }}</p>
            </div>
            <div>
                <p class="text-xs text-slate-400 font-semibold">Nombre</p>
                <p class="text-sm font-semibold text-slate-800">{{ $data['name'] }}</p>
            </div>
            <div>
                <p class="text-xs text-slate-400 font-semibold">Correo</p>
                <p class="text-sm font-semibold text-slate-800">{{ $data['email'] }}</p>
            </div>
            <div>
                <p class="text-xs text-slate-400 font-semibold">Mensaje</p>
                <p class="text-sm text-slate-600">{{ $data['message'] }}</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-3 justify-center">
        <a href="{{ route('tourist_sites.show', $site['id']) }}"
            class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border border-slate-200 text-slate-700 rounded-xl text-sm font-bold hover:bg-slate-50 transition-all duration-200">
            Volver al destino
        </a>
        <a href="{{ route('tourist_sites.index') }}"
            class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-indigo-600 text-white rounded-xl text-sm font-bold shadow-md hover:bg-indigo-700 active:scale-95 transition-all duration-200">
            Explorar más destinos
        </a>
    </div>
</div>
@endsection
