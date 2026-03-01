<x-app-layout>


	{{-- <x-top-header/> --}}

	<div class="py-5">

		<div class="flex">
			<x-top-header/>

			<main class="flex-1 py-6">
				<div class="mx-8">
					<div class="bg-white overflow-hidden p-6 shadow-sm sm:rounded-lg">
						<h1 class="text-4xl font-bold">Dashboard</h1>
						<div class="cards mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
							<div class="p-2">
								<div class="bg-primary/10 text-primary rounded-md p-4">
									<div class="flex items-center gap-3">
										<div class="p-3 bg-primary/10 rounded-lg text-primary">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star w-6 h-6" aria-hidden="true">
												<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
											</svg>
										</div>
										<div>
											<p class="text-sm font-medium text-slate-600">Reputation</p>
											<p class="text-3xl font-bold text-slate-800 mt-1">{{ $reputation ?? '4.8' }}</p>
										</div>
									</div>
								</div>
							</div>

							<div class="p-2">
								<div class="bg-green-50 text-green-700 rounded-md p-4">
									<h2 class="text-sm font-medium text-green-700">Total Settlements</h2>
									<p class="text-2xl font-bold text-slate-800 mt-2">{{ $totalSettlements ?? '€ 800' }}</p>

								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
</x-app-layout>

