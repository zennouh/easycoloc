<x-app-layout>

	@if (session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/30 rounded-lg px-4 py-3 flex items-start gap-3 animate-pulse mb-5">
            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
            </svg>
            <span class="text-emerald-700 font-medium">{{ session('success') }}</span>
        </div>
    @endif
	<div class="max-w-lg mx-auto mt-24 bg-white border border-slate-200 rounded-2xl shadow-sm p-12 text-center">
		<div class="w-20 h-20 flex items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 mb-6">
			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewbox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
				<path d="M20 6L9 17l-5-5"/>
			</svg>
		</div>

		<h2 class="text-2xl font-bold text-slate-900 mb-2">Invitation Accepted!</h2>
		<p class="text-slate-600 mb-8">Thanks for joining the colocation. You're all set and can now manage shared expenses with your group.</p>

		<a href="{{ route('colocations.index') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg hover:shadow-lg hover:shadow-indigo-500/50 transition-all duration-200">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
				<path d="M9 18l6-6-6-6"/>
			</svg>
			<span>Go to Colocation</span>
		</a>
	</div>

</x-app-layout>

