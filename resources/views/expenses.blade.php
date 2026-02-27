<x-app-layout>
	<div class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">
		<div class="flex">
			<x-top-header/>

			<main class="flex-1 overflow-y-auto">
				<div
					class="p-8">
					<!-- Page Header -->
					<div class="mb-8">
						<div class="flex items-start justify-between">
							<div>
								<h1 class="text-4xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent mb-2">Expenses</h1>
								<p class="text-slate-600">Track and manage your shared expenses</p>
							</div>
						</div>
					</div>

					<!-- Alerts Section -->
					<div class="space-y-3 mb-6">
						@error("noEmail")
                            <div class="bg-red-500/10 border border-red-500/30 rounded-lg px-4 py-3 flex items-start gap-3">
                                <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                </svg>
                                <span class="text-red-700">{{ $message }}</span>
                            </div>
                        @enderror

						@if (session('success'))
                            <div class="bg-emerald-500/10 border border-emerald-500/30 rounded-lg px-4 py-3 flex items-start gap-3 animate-pulse">
                                <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                </svg>
                                <span class="text-emerald-700 font-medium">{{ session('success') }}</span>
                            </div>
                        @endif
					</div>

                    @if (!$colocation)
                           <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-12 text-center">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-500/10 to-teal-500/10 rounded-2xl mb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-600">
                                        <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"></path>
                                        <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"></path>
                                        <path d="M12 17.5v-11"></path>
                                    </svg>
                                </div>

                                <h2 class="text-2xl font-bold text-slate-900 mb-2">No expenses yet</h2>
                                <p class="text-slate-600 mb-8 max-w-sm mx-auto">Start tracking shared expenses by adding your first expense. This helps everyone see who paid for what.</p>

                                <div x-data="{ modalOpen: false }">
                                    <a href="{{ route("colocations.index") }}" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-lg hover:shadow-lg hover:shadow-emerald-500/50 transition-all duration-200 group">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                                            <path d="M12 5v14M5 12h14"></path>
                                        </svg>
                                        <span>Add First colocation</span>
                                    </a>


                                </div>
                            </div>


                    @elseif ($colocation->expenses_count > 0)
                        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 p-8">
                            <div
                                class="space-y-6">
                                <!-- Header with Add Button -->
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h2 class="text-2xl font-bold text-slate-900">Recent Expenses</h2>
                                        <p
                                            class="text-sm text-slate-500 mt-1">
                                            {{ $colocation->expenses_count }}
                                            expense
                                            {{ $colocation->expenses_count == 1 ? '' : 's' }}
                                            recorded</p>
                                    </div>
                                    <div x-data="{ modalOpen: false }">
                                        <button @click="modalOpen = true" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:shadow-lg hover:shadow-emerald-500/50 transition-all duration-200 group">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 group-hover:scale-110 transition-transform">
                                                <path d="M12 5v14M5 12h14"></path>
                                            </svg>
                                            <span>Add Expense</span>
                                        </button>

                                        <!-- Modernized Modal -->
                                        <div x-show="modalOpen" x-cloak x-transition.opacity.duration-300ms class="fixed inset-0 z-50 flex items-center justify-center p-4">
                                            <div class="fixed inset-0 bg-black/50 backdrop-blur-md" @click="modalOpen = false"></div>
                                            <div
                                                class="bg-white rounded-2xl shadow-2xl w-full max-w-md relative z-50 p-8 max-h-[90vh] overflow-y-auto" @keydown.escape.window="modalOpen = false">
                                                <!-- Modal Header -->
                                                <div class="flex items-center justify-between mb-6 sticky top-0 bg-white pb-4 border-b border-slate-200">
                                                    <div>
                                                        <h3 class="text-2xl font-bold text-slate-900">Add New Expense</h3>
                                                        <p class="text-sm text-slate-500 mt-1">Record a shared expense</p>
                                                    </div>
                                                    <button @click="modalOpen = false" class="text-slate-400 hover:text-slate-600 p-2 hover:bg-slate-100 rounded-lg transition-colors flex-shrink-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                    </button>
                                                </div>

                                                <!-- Form -->
                                                <form action="{{ route('expenses.store') }}" method="POST" class="space-y-5">
                                                    @csrf
                                                    <input type="hidden" value="{{ $colocation->id }}" name="colocation_id">

                                                    <div>
                                                        <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Title</label>
                                                        <input id="title" name="title" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all placeholder-slate-400 text-slate-900" placeholder="e.g. Grocery shopping">
                                                    </div>

                                                    <div class="grid grid-cols-2 gap-4">
                                                        <div>
                                                            <label for="amount" class="block text-sm font-semibold text-slate-700 mb-2">Amount</label>
                                                            <div class="relative">
                                                                <input id="amount" name="amount" type="number" step="0.01" value="0.01" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all placeholder-slate-400 text-slate-900" placeholder="0.00">
                                                                <span class="absolute right-4 top-3.5 text-slate-500 font-medium">DH</span>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <label for="date" class="block text-sm font-semibold text-slate-700 mb-2">Date</label>
                                                            <input id="date" name="date" type="date" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all placeholder-slate-400 text-slate-900">
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <label for="user_id" class="block text-sm font-semibold text-slate-700 mb-2">Payer</label>
                                                        <select name="user_id" id="user_id" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all text-slate-900">
                                                            @foreach ($colocation->users as $user)
                                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($colocation->users_count <= 1)
                                                            <p class="text-red-500 text-sm mt-2 flex items-center gap-2">
                                                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                                                                Add more members first
                                                            </p>
                                                        @endif
                                                    </div>

                                                    <div>
                                                        <label for="category_id" class="block text-sm font-semibold text-slate-700 mb-2">Category</label>
                                                        <select name="category_id" id="category_id" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all text-slate-900">
                                                            @foreach ($colocation->categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($colocation->categories_count === 0)
                                                            <p class="text-red-500 text-sm mt-2 flex items-center gap-2">
                                                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                                                                Create a category first
                                                            </p>
                                                        @endif
                                                    </div>

                                                    <!-- Buttons -->
                                                    @if ($colocation->users_count <= 1 || $colocation->categories_count === 0)
                                                        <div class="flex gap-3 pt-4">
                                                            <button type="button" @click="modalOpen = false" class="flex-1 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-lg transition-colors">
                                                                Cancel
                                                            </button>
                                                            <button type="submit" disabled class="flex-1 px-4 py-2.5 bg-gray-300 text-gray-500 font-medium rounded-lg cursor-not-allowed">
                                                                Create
                                                            </button>
                                                        </div>
                                                    @else
                                                        <div class="flex gap-3 pt-4">
                                                            <button type="button" @click="modalOpen = false" class="flex-1 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-lg transition-colors">
                                                                Cancel
                                                            </button>
                                                            <button type="submit" class="flex-1 px-4 py-2.5 bg-gradient-to-r from-emerald-600 to-teal-600 hover:shadow-lg hover:shadow-emerald-500/50 text-white font-medium rounded-lg transition-all">
                                                                Add Expense
                                                            </button>
                                                        </div>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Expenses Grid -->
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                                    @foreach ($colocation->expenses as $expense)
                                        <div class="group bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200 rounded-xl hover:border-emerald-300 hover:shadow-md transition-all duration-300 p-6">
                                            <div
                                                class="space-y-4">
                                                <!-- Header -->
                                                <div class="flex items-start justify-between">
                                                    <div class="flex-1">
                                                        <h4 class="font-bold text-slate-900 text-lg line-clamp-2">{{ $expense->title }}</h4>
                                                        <span class="inline-block mt-2 px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full">{{ $expense->category->name }}</span>
                                                    </div>
                                                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-emerald-500 to-teal-500 flex items-center justify-center flex-shrink-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="white" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"></path>
                                                            <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"></path>
                                                            <path d="M12 17.5v-11"></path>
                                                        </svg>
                                                    </div>
                                                </div>

                                                <!-- Amount -->
                                                <div class="bg-white rounded-lg p-3 border border-slate-200">
                                                    <p class="text-xs text-slate-500 font-medium uppercase tracking-wider mb-1">Amount</p>
                                                    <p
                                                        class="text-2xl font-bold text-emerald-600">
                                                        {{ number_format($expense->amount, 2) }}
                                                        DH</p>
                                                </div>

                                                <!-- Details -->
                                                <div class="space-y-2 text-sm">
                                                    <div class="flex items-center justify-between">
                                                        <span class="text-slate-600">Payer:</span>
                                                        <span class="font-semibold text-slate-900">{{ $expense->user->name }}</span>
                                                    </div>
                                                    <div class="flex items-center justify-between">
                                                        <span class="text-slate-600">Date:</span>
                                                        <span class="font-semibold text-slate-900">{{ \Carbon\Carbon::parse($expense->date)->format('M d, Y') }}</span>
                                                    </div>
                                                    <div class="flex items-center justify-between">
                                                        <span class="text-slate-600">Added:</span>
                                                        <span class="font-semibold text-slate-900">{{ $expense->created_at->format('M d') }}</span>
                                                    </div>
                                                </div>


                                                <div class="pt-2 border-t border-slate-200  group-hover:opacity-100 transition-opacity">
                                                    <a href="{{ route('expenses.show', ["id"=>$expense->id]) }}" class="w-full px-3 py-2 bg-green-500/10 hover:bg-green-500/20 text-green-600 hover:text-green-700 font-medium rounded-lg transition-colors text-sm flex items-center justify-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        </svg>
                                                            Details
                                                    </a>
                                                </div>
                                                <div class="pt-2 border-t border-slate-200 opacity-0 group-hover:opacity-100 transition-opacity">
                                                    <button class="w-full px-3 py-2 bg-red-500/10 hover:bg-red-500/20 text-red-600 hover:text-red-700 font-medium rounded-lg transition-colors text-sm flex items-center justify-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    @else
                        <!-- Empty State -->
                        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-12 text-center">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-emerald-500/10 to-teal-500/10 rounded-2xl mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-600">
                                    <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"></path>
                                    <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"></path>
                                    <path d="M12 17.5v-11"></path>
                                </svg>
                            </div>

                            <h2 class="text-2xl font-bold text-slate-900 mb-2">No expenses yet</h2>
                            <p class="text-slate-600 mb-8 max-w-sm mx-auto">Start tracking shared expenses by adding your first expense. This helps everyone see who paid for what.</p>

                            <div x-data="{ modalOpen: false }">
                                <button @click="modalOpen = true" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-lg hover:shadow-lg hover:shadow-emerald-500/50 transition-all duration-200 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                                        <path d="M12 5v14M5 12h14"></path>
                                    </svg>
                                    <span>Add First Expense</span>
                                </button>

                                <!-- Empty State Modal -->
                                <div x-show="modalOpen" x-cloak x-transition.opacity.duration-300ms class="fixed inset-0 z-50 flex items-center justify-center p-4">
                                    <div class="fixed inset-0 bg-black/50 backdrop-blur-md" @click="modalOpen = false"></div>
                                    <div
                                        class="bg-white rounded-2xl shadow-2xl w-full max-w-md relative z-50 p-8 max-h-[90vh] overflow-y-auto" @keydown.escape.window="modalOpen = false">
                                        <!-- Modal Header -->
                                        <div class="flex items-center justify-between mb-6 sticky top-0 bg-white pb-4 border-b border-slate-200">
                                            <div>
                                                <h3 class="text-2xl font-bold text-slate-900">Add New Expense</h3>
                                                <p class="text-sm text-slate-500 mt-1">Record a shared expense</p>
                                            </div>
                                            <button @click="modalOpen = false" class="text-slate-400 hover:text-slate-600 p-2 hover:bg-slate-100 rounded-lg transition-colors flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Form -->
                                        <form action="{{ route('expenses.store') }}" method="POST" class="space-y-5">
                                            @csrf
                                            <input type="hidden" value="{{ $colocation->id }}" name="colocation_id">

                                            <div>
                                                <label for="expense_title" class="block text-sm font-semibold text-slate-700 mb-2">Title</label>
                                                <input id="expense_title" name="title" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all placeholder-slate-400 text-slate-900" placeholder="e.g. Grocery shopping">
                                            </div>

                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label for="expense_amount" class="block text-sm font-semibold text-slate-700 mb-2">Amount</label>
                                                    <div class="relative">
                                                        <input id="expense_amount" name="amount" type="number" step="0.01" value="0.01" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all placeholder-slate-400 text-slate-900" placeholder="0.00">
                                                        <span class="absolute right-4 top-3.5 text-slate-500 font-medium">DH</span>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="expense_date" class="block text-sm font-semibold text-slate-700 mb-2">Date</label>
                                                    <input id="expense_date" name="date" type="date" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all placeholder-slate-400 text-slate-900">
                                                </div>
                                            </div>

                                            <div>
                                                <label for="expense_user" class="block text-sm font-semibold text-slate-700 mb-2">Payer</label>
                                                <select name="user_id" id="expense_user" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all text-slate-900">
                                                    @foreach ($colocation->users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($colocation->users_count <= 1)
                                                    <p class="text-red-500 text-sm mt-2 flex items-center gap-2">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                                                        Add more members first
                                                    </p>
                                                @endif
                                            </div>

                                            <div>
                                                <label for="expense_category" class="block text-sm font-semibold text-slate-700 mb-2">Category</label>
                                                <select name="category_id" id="expense_category" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all text-slate-900">
                                                    @foreach ($colocation->categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($colocation->categories_count === 0)
                                                    <p class="text-red-500 text-sm mt-2 flex items-center gap-2">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                                                        Create a category first
                                                    </p>
                                                @endif
                                            </div>

                                            <!-- Buttons -->
                                            @if ($colocation->users_count <= 1 || $colocation->categories_count === 0)
                                                <div class="flex gap-3 pt-4">
                                                    <button type="button" @click="modalOpen = false" class="flex-1 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-lg transition-colors">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" disabled class="flex-1 px-4 py-2.5 bg-gray-300 text-gray-500 font-medium rounded-lg cursor-not-allowed">
                                                        Add Expense
                                                    </button>
                                                </div>
                                            @else
                                                <div class="flex gap-3 pt-4">
                                                    <button type="button" @click="modalOpen = false" class="flex-1 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-lg transition-colors">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="flex-1 px-4 py-2.5 bg-gradient-to-r from-emerald-600 to-teal-600 hover:shadow-lg hover:shadow-emerald-500/50 text-white font-medium rounded-lg transition-all">
                                                        Add Expense
                                                    </button>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
				</div>
			</main>
		</div>
	</div>
</x-app-layout>

