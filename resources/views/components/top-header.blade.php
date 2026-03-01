<aside class="w-64 h-screen bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 sticky top-0 border-r border-slate-700/50 px-5 py-6 flex flex-col justify-between shadow-2xl">
	<div>
		<!-- Logo Section -->
		<a href="#" class="flex items-center gap-3 mb-8 group">
			<div class="rounded-lg bg-gradient-to-br from-blue-500 to-cyan-500 p-2.5 group-hover:shadow-lg group-hover:shadow-blue-500/50 transition-all duration-300">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5" aria-hidden="true">
					<path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
				</svg>
			</div>
			<div class="flex flex-col">
				<h1 class="text-xl font-bold text-white group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:from-blue-400 group-hover:to-cyan-400 group-hover:bg-clip-text transition-all duration-300">EasyColoc</h1>
				<p class="text-xs text-slate-400">Manage colocations</p>
			</div>
		</a>

		<!-- Navigation Section -->
		<nav class="flex flex-col gap-2">
			{{-- <a href="#" class="group flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700/50 hover:text-white transition-all duration-200 border border-transparent hover:border-slate-600">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 group-hover:text-blue-400 transition-colors" aria-hidden="true">
					<path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path>
					<path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
				</svg>
				<span>Dashboard</span>
			</a>
			<a href="#" class="group flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700/50 hover:text-white transition-all duration-200 border border-transparent hover:border-slate-600">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 group-hover:text-orange-400 transition-colors" aria-hidden="true">
					<circle cx="12" cy="12" r="10"></circle>
					<circle cx="12" cy="10" r="3"></circle>
					<path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"></path>
				</svg>
				<span>Members</span>
			</a> --}}
			<x-list-tile route="colocations.index" prefex="colocations">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5
																																																																																													     group-hover:text-cyan-400
																																																																																									                     {{ request()->routeIs('colocations.*')
	? 'bg-slate-700/50 text-cyan-400 border-slate-600'
	: 'text-slate-300 hover:bg-slate-700/50 hover:text-white border-transparent hover:border-slate-600' }}
																																																																																													     transition-colors" aria-hidden="true">
					<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
					<path d="M16 3.128a4 4 0 0 1 0 7.744"></path>
					<path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
					<circle cx="9" cy="7" r="4"></circle>
				</svg>
				<span>colocation</span>
			</x-list-tile>

			<x-list-tile route="expenses.index" prefex="expenses">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5
																																																																					 group-hover:text-emerald-400
																																																																					  {{ request()->routeIs('expenses.*')
	? 'bg-slate-700/50 text-emerald-400 border-slate-600'
	: 'text-slate-300 hover:bg-slate-700/50 hover:text-white border-transparent hover:border-slate-600' }}
																																																																					  transition-colors" aria-hidden="true">
					<path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"></path>
					<path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"></path>
					<path d="M12 17.5v-11"></path>
				</svg>
				<span>Expenses</span>
			</x-list-tile>


			<x-list-tile route="categories.index" prefex="categories">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5
																								 group-hover:text-pink-400
																								  {{ request()->routeIs('categories.*')
	? 'bg-slate-700/50 text-pink-400 border-slate-600'
	: 'text-slate-300 hover:bg-slate-700/50 hover:text-white border-transparent hover:border-slate-600' }}
																								 transition-colors" aria-hidden="true">
					<path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z"></path>
					<circle cx="7.5" cy="7.5" r=".5" fill="currentColor"></circle>
				</svg>
				<span>Categories</span>
			</x-list-tile>

			<x-list-tile route="profile.edit" prefex="profile">

				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
					<circle cx="12" cy="7" r="4"></circle>
				</svg>
				<span>My Profile</span>

			</x-list-tile>


			@if(auth()->user()->is_admin)
				<div class="my-3 h-px bg-gradient-to-r from-transparent via-slate-700 to-transparent"></div>

				<a href="{{ route("admin.stats") }}" class="group flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm bg-gradient-to-r from-blue-600/20 to-cyan-600/20 text-blue-300 hover:from-blue-600/40 hover:to-cyan-600/40 hover:text-blue-200 transition-all duration-200 border border-blue-500/30 hover:border-blue-500/60 font-medium">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5" aria-hidden="true">
						<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
					</svg>
					<span>Admin Panel</span>
				</a>
			@endif
		</nav>
	</div>

	<!-- User Profile Section -->
	<div
		class="space-y-3">
		<!-- Divider -->
		<div class="h-px bg-gradient-to-r from-transparent via-slate-700 to-transparent"></div>

		<div class="relative group">
			<button class="w-full flex items-center gap-3 p-3 rounded-lg bg-slate-700/30 hover:bg-slate-700/50 transition-all duration-200 border border-slate-600/50 hover:border-slate-500">
				<div class="inline-flex items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 font-bold overflow-hidden w-10 h-10 text-white text-sm shadow-lg">
					<span>{{ substr(auth()->user()->name, 0, 1) }}</span>
				</div>
				<div class="flex-1 text-left">
					<p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
					<p class="text-xs text-slate-400">Account</p>
				</div>
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-slate-400 group-hover:text-slate-300 transition-colors">
					<polyline points="6 9 12 15 18 9"></polyline>
				</svg>
			</button>

			<!-- Dropdown Menu -->
			<div class="absolute bottom-full left-0 right-0 mb-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
				<div class="bg-slate-800 border border-slate-700 rounded-lg shadow-xl overflow-hidden">


					<form action="{{ route("logout") }}" method="POST" class="block">
						@csrf
						<button type="submit" class="w-full flex items-center gap-2 px-4 py-2.5 text-sm text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-colors">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
								<polyline points="16 8 20 12 16 16"></polyline>
								<line x1="12" y1="12" x2="20" y2="12"></line>
							</svg>
							<span>Logout</span>
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</aside>

