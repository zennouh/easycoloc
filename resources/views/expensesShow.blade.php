<x-app-layout>
	<div class="bg-gradient-to-br from-slate-50 via-blue-50/30 to-slate-100 min-h-screen">
		<div class="flex">
			<x-top-header/>

			<main class="flex-1 overflow-y-auto">
				<div
					class="p-10">

					<!-- Page Header -->
					<div class="mb-10 flex items-center justify-between">
						<div>
							<div class="flex items-center gap-3 mb-1">
								<div class="w-8 h-8 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center shadow-md shadow-blue-200">
									<svg class="w-4 h-4 text-white" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
										<path d="M9 14l6-6m-5 1h.01M14 13h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</div>
								<h1 class="text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent tracking-tight">
									Settlements
								</h1>
							</div>
							<p class="text-slate-400 mt-1 text-sm pl-11">Organize and manage your expense settlements</p>
						</div>

						<a href="{{ route('expenses.index') }}" class="group inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600 transition-all duration-200 bg-white border border-slate-200 hover:border-blue-200 hover:bg-blue-50/50 px-4 py-2 rounded-xl shadow-sm">
							<svg class="w-4 h-4 transition-transform duration-200 group-hover:-translate-x-0.5" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<path d="M19 12H5m7-7l-7 7 7 7" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							Back to expenses
						</a>
					</div>

					<!-- Alerts -->
					<div class="space-y-4 mb-8">
						@error("noEmail")
                            <div class="bg-red-500/10 border border-red-500/20 backdrop-blur-sm rounded-2xl px-5 py-4 flex items-start gap-3 shadow-sm">
                                <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-red-600" viewbox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-red-700 text-sm font-semibold">Something went wrong</p>
                                    <p class="text-red-600 text-xs mt-0.5">{{ $message }}</p>
                                </div>
                            </div>
                        @enderror

						@if (session('success'))
                            <div class="bg-emerald-500/10 border border-emerald-500/20 rounded-2xl px-5 py-4 flex items-start gap-3 shadow-sm">
                                <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-emerald-600" viewbox="0 0 24 24" fill="currentColor">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-emerald-700 font-semibold text-sm">Success!</p>
                                    <p class="text-emerald-600 text-xs mt-0.5">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif
					</div>

					<!-- Expense Card -->
					<div
						class="bg-white/90 backdrop-blur-sm border border-slate-200 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">

						<!-- Top accent bar -->
						<div class="h-1 bg-gradient-to-r from-blue-500 via-cyan-400 to-blue-400"></div>

						<div
							class="p-10">

							<!-- Header -->
							<div class="flex items-start justify-between mb-10">
								<div class="space-y-2">
									<h2
										class="text-3xl font-bold text-slate-900 tracking-tight">{{ data_get($expense, 'title') }}
									</h2>
									<div
										class="flex items-center gap-2 flex-wrap">
										@if(data_get($expense, 'category.name'))
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 text-blue-600 text-xs font-semibold">
                                                <svg class="w-3 h-3" viewbox="0 0 24 24" fill="currentColor"><path d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 1.99 2 1.99L16 19c.67 0 1.27-.33 1.63-.84L22 12l-4.37-6.16z"/></svg>
                                                {{ data_get($expense, 'category.name') }}
                                            </span>
                                        @endif
										<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-slate-500 text-xs font-medium">
											<svg class="w-3 h-3" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18" stroke-linecap="round"/></svg>
											{{ data_get($expense, 'date') }}
										</span>
									</div>
								</div>
							</div>

							<div
								class="grid grid-cols-1 lg:grid-cols-2 gap-8">

								<!-- Amount Card -->
								<div
									class="relative bg-gradient-to-br from-blue-600 via-blue-500 to-cyan-500 rounded-2xl p-8 overflow-hidden shadow-lg shadow-blue-200">
									<!-- Decorative circles -->
									<div class="absolute -top-6 -right-6 w-32 h-32 rounded-full bg-white/10"></div>
									<div class="absolute -bottom-8 -left-4 w-24 h-24 rounded-full bg-white/5"></div>

									<div class="relative">
										<p class="text-xs uppercase tracking-widest text-blue-100 font-semibold mb-4">Total Amount</p>

										<p
											class="text-5xl font-extrabold text-white leading-none">
											{{ number_format(data_get($expense, 'amount', 0), 2) }}
											<span class="text-xl font-medium text-blue-200 ml-1">DH</span>
										</p>

										<div class="mt-6 pt-6 border-t border-white/20">
											<p class="text-blue-100 text-sm">Paid by</p>
											<div class="flex items-center gap-3 mt-2">
												<div
													class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center text-white font-bold text-sm">{{ strtoupper(substr(data_get($expense, 'user.name', '?'), 0, 1)) }}
												</div>
												<span class="font-bold text-white text-base">{{ data_get($expense, 'user.name') }}</span>
											</div>
										</div>
									</div>
								</div>

								<!-- Participants -->
								<div class="bg-slate-50/60 rounded-2xl p-8 border border-slate-200">
									<div class="flex items-center justify-between mb-6">
										<p class="text-xs uppercase tracking-widest text-slate-500 font-semibold">Participants</p>
										<span
											class="px-2.5 py-1 text-xs font-bold rounded-full bg-slate-200 text-slate-600">{{ count(data_get($expense, 'users', [])) }}
										</span>
									</div>

									<ul class="space-y-3">
										@foreach (data_get($expense, 'users', []) as $participant)
                                            <li class="group bg-white rounded-2xl border border-slate-100 p-4 hover:border-blue-100 hover:shadow-sm transition-all duration-200">
                                                <div
                                                    class="flex items-center justify-between">

                                                    <!-- Left -->
                                                    <div class="flex items-center gap-3">
                                                        <div
                                                            class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold text-sm shadow-md shadow-indigo-200 flex-shrink-0">{{ strtoupper(substr(data_get($participant, 'name'), 0, 1)) }}
                                                        </div>
                                                        <div>
                                                            <div class="text-sm font-semibold text-slate-900 flex items-center gap-2">
                                                                {{ data_get($participant, 'name') }}
                                                                @if(data_get($participant, 'is_payer'))
                                                                    <span class="px-2 py-0.5 text-xs rounded-full bg-emerald-100 text-emerald-700 font-semibold"> Payer</span>
                                                                @endif
                                                            </div>
                                                            <div class="text-xs text-slate-400 mt-0.5">{{ data_get($participant, 'email') ?? '' }}</div>
                                                        </div>
                                                    </div>

                                                    <!-- Right -->
                                                    <div class="flex items-center gap-3">
                                                        <div class="text-right">
                                                            <div
                                                                class="text-sm font-bold text-slate-900">
                                                                {{ number_format(data_get($participant, 'price', 0), 2) }}
                                                                <span class="text-xs text-slate-400 font-normal">DH</span>
                                                            </div>
                                                            <span
                                                                class="inline-block mt-1 px-2 py-0.5 rounded-full text-xs font-semibold text-white   {{ !data_get($participant, 'membership.deleted_at')  ? 'bg-white' : 'bg-red-600' }}">{{ data_get($participant, 'membership.deleted_at') ? 'Leave' : '' }}
                                                            </span>
                                                            @if(!data_get($participant, 'is_payer'))
                                                                <span
                                                                    class="inline-block mt-1 px-2 py-0.5 rounded-full text-xs font-semibold
                                                              {{ data_get($participant, 'pay') ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-600' }}">{{ data_get($participant, 'pay') ? 'Settled' : 'Owes' }}
                                                                </span>
                                                            @endif
                                                        </div>

                                                        @if(!data_get($participant, 'is_payer') && !data_get($participant, 'pay'))
                                                            <form action="{{ route('settlement.pay') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="amount" value="{{ data_get($participant, 'price', 0) }}">
                                                                <input type="hidden" name="expense_id" value="{{ data_get($expense, 'id') }}">
                                                                <input type="hidden" name="from_user_id" value="{{ data_get($participant, 'id') }}">
                                                                <input type="hidden" name="to_user_id" value="{{ auth()->id() }}">
                                                                <input type="hidden" name="paid_at" value="{{ now() }}">
                                                                <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-2 text-xs font-semibold rounded-xl bg-emerald-500 text-white hover:bg-emerald-600 shadow-sm hover:shadow-md hover:shadow-emerald-200 transition-all duration-200 whitespace-nowrap">
                                                                    <svg class="w-3.5 h-3.5" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                                                    Mark paid
                                                                </button>
                                                            </form>
                                                        @elseif(data_get($participant, 'pay'))
                                                            <div class="inline-flex items-center gap-1.5 px-3 py-2 text-xs font-semibold rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200">
                                                                <svg class="w-3.5 h-3.5" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                                                Paid
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
									</ul>


								</div>

							</div>
						</div>
					</div>

				</div>
			</main>
		</div>
	</div>
</x-app-layout>

