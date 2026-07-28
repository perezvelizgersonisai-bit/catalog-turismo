@extends('layouts.app')

@section('title', 'Catálogo de Destinos - El Salvador Turismo')

@section('content')
<!-- Hero / Header Section -->
<div class="text-center max-w-2xl mx-auto mb-16">
    <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight mb-4">
        Descubre las Maravillas de <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">El Salvador</span>
    </h1>
    <p class="text-lg text-slate-600 font-medium">
        Explora volcanes imponentes, lagos de aguas cristalinas, playas de surf de clase mundial e invaluables joyas arqueológicas.
    </p>
</div>

<!-- Destinations Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse ($sites as $site)
        <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col group">
            <!-- Image Area -->
            <div class="relative overflow-hidden aspect-[4/3] bg-slate-100">
                <img src="{{ $site['image_url'] }}" alt="{{ $site['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-md text-indigo-600 text-xs px-3 py-1.5 rounded-full font-bold shadow-sm border border-slate-100">
                    {{ $site['category'] }}
                </span>
            </div>

            <!-- Content Area -->
            <div class="p-6 flex-grow flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-1.5 text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5 text-indigo-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        {{ $site['department'] }}
                    </div>
                    
                    <h2 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors">
                        {{ $site['title'] }}
                    </h2>
                    
                    <p class="text-sm text-slate-500 line-clamp-3 mb-6 font-normal">
                        {{ $site['description'] }}
                    </p>
                </div>

                <div class="pt-4 border-t border-slate-50 flex items-center justify-between gap-4">
                    <div class="flex flex-col">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Costo aprox.</span>
                        <span class="text-sm font-semibold text-slate-700 truncate max-w-[150px]">{{ $site['price'] }}</span>
                    </div>

                    <a href="{{ route('tourist_sites.show', $site['id']) }}" class="inline-flex items-center gap-1 px-4 py-2 bg-indigo-600 text-white rounded-xl text-xs font-bold shadow-md hover:bg-indigo-700 active:scale-95 transition-all duration-200">
                        Ver Detalles
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-20 bg-white rounded-3xl border border-slate-100">
            <p class="text-slate-500 font-semibold">No se encontraron destinos turísticos registrados.</p>
        </div>
    @endforelse
</div>
@endsection
