@props(["route" => "colocations.index", "prefex" => "colocations"])

<a href="{{ route($route) }}" class="button active group flex items-center gap-3 px-4 py-2.5
												rounded-lg text-sm text-slate-300 hover:bg-slate-700/50 hover:text-white transition-all
										         duration-200 border border-transparent hover:border-slate-600 {{ request()->routeIs($prefex . '.*')
    ? 'bg-slate-700/50 text-white border-slate-600'
    : 'text-slate-300 hover:bg-slate-700/50 hover:text-white border-transparent hover:border-slate-600' }}">
{{ $slot }}
</a>
