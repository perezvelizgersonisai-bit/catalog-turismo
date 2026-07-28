@extends('layouts.app')

@section('title', $site['title'] . ' - El Salvador Turismo')

@section('content')

<!-- Breadcrumb / Back link -->
<div class="mb-8">
    <a href="{{ route('tourist_sites.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-indigo-600 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        Volver al catálogo
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-5 gap-10">

    <!-- Left column: site details -->
    <div class="lg:col-span-3">
        <div class="rounded-3xl overflow-hidden aspect-[16/10] bg-slate-100 mb-8 shadow-sm">
            <img src="{{ $site['image_url'] }}" alt="{{ $site['title'] }}" class="w-full h-full object-cover">
        </div>

        <span class="inline-block bg-indigo-50 text-indigo-600 text-xs px-3 py-1.5 rounded-full font-bold border border-indigo-100 mb-4">
            {{ $site['category'] }}
        </span>

        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-3">
            {{ $site['title'] }}
        </h1>

        <div class="flex items-center gap-1.5 text-sm font-bold text-slate-400 uppercase tracking-wider mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-indigo-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
            Departamento de {{ $site['department'] }}
        </div>

        <p class="text-slate-600 leading-relaxed mb-8">
            {{ $site['description'] }}
        </p>

        <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm">
            <span class="text-xs text-slate-400 font-bold uppercase tracking-wider">Costo aproximado</span>
            <p class="text-lg font-semibold text-slate-800 mt-1">{{ $site['price'] }}</p>
        </div>
    </div>

    <!-- Right column: contact form -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 sticky top-24">
            <h2 class="text-xl font-bold text-slate-900 mb-1">Solicitar más información</h2>
            <p class="text-sm text-slate-500 mb-6">Escríbenos y te contactamos sobre {{ $site['title'] }}.</p>

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-100 text-red-600 text-sm rounded-xl p-4">
                    <p class="font-bold mb-1">Revisa los siguientes datos:</p>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tourist_sites.contact') }}" method="POST" class="space-y-5">
                @csrf
                <input type="hidden" name="site_id" value="{{ $site['id'] }}">

                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-1.5">Nombre completo</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        placeholder="Tu nombre">
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">Correo electrónico</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        placeholder="tucorreo@ejemplo.com">
                </div>

                <div>
                    <label for="message" class="block text-sm font-semibold text-slate-700 mb-1.5">Mensaje</label>
                    <textarea id="message" name="message" rows="4"
                        class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        placeholder="Cuéntanos qué te gustaría saber...">{{ old('message') }}</textarea>
                </div>

                <button type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-indigo-600 text-white rounded-xl text-sm font-bold shadow-md hover:bg-indigo-700 active:scale-95 transition-all duration-200">
                    Enviar solicitud
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.126A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.876L5.999 12Zm0 0h7.5" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
