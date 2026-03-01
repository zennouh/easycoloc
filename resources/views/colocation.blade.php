<x-app-layout>
    <div class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">
        <div class="flex">
            <x-top-header />

            <main class="flex-1 overflow-y-auto">
                <div class="p-8">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <div class="flex items-start justify-between">
                            <div>
                                <h1
                                    class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
                                    Colocations</h1>
                                <p class="text-slate-600">Manage your colocation and members</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alerts Section -->
                    <div class="space-y-3 mb-6">
                        @error("noEmail")
                            <div class="bg-red-500/10 border border-red-500/30 rounded-lg px-4 py-3 flex items-start gap-3">
                                <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                                    viewbox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                                </svg>
                                <span class="text-red-700">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    @if (session('success'))
                        <div
                            class="bg-emerald-500/10 border border-emerald-500/30 rounded-lg px-4 py-3 flex items-start gap-3 animate-pulse mb-5">
                            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 24 24" fill="currentColor">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                            </svg>
                            <span class="text-emerald-700 font-medium">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Colocation Section -->
                    @if ($colocation)

                        <div
                            class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 p-8 mb-6">
                            <div class="flex items-start justify-between gap-6">
                                <div class="flex-1">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div
                                            class="w-16 h-16 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                                viewbox="0 0 24 24" fill="white" stroke="white" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path
                                                    d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h2 class="text-3xl font-bold text-slate-900">{{ $colocation->name }}</h2>
                                            <p class="text-slate-500 mt-1">{{ $colocation->address }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 flex-wrap">
                                        <span
                                            class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-emerald-100 text-emerald-700">{{ $colocation->status }}</span>
                                        <span class="text-sm text-slate-600">
                                            {{ $colocation->users_count }}
                                            member{{ $colocation->users_count != 1 ? 's' : '' }}</span>
                                    </div>
                                </div>


                                <div class="flex gap-3 flex-col sm:flex-row" x-data="{ invite: false }">
                                    @if($colocation->membership->role == "owner")
                                        <button @click="invite = true"
                                            class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-lg hover:shadow-lg hover:shadow-indigo-500/50 transition-all duration-200 group whitespace-nowrap">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="w-5 h-5 group-hover:scale-110 transition-transform">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <line x1="19" y1="4" x2="19" y2="10"></line>
                                                <line x1="16" y1="7" x2="22" y2="7"></line>
                                            </svg>
                                            <span>Invite Member</span>
                                        </button>
                                    @endif
                                    @if($colocation->membership->role == "owner")
                                        <form
                                            action="{{ route('colocations.cancel', ["colocation" => $colocation->id, "user" => auth()->id()]) }}"
                                            method="POST">
                                            @csrf
                                            <button
                                                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-red-600 to-orange-600 text-white font-medium rounded-lg hover:shadow-lg hover:shadow-indigo-500/50 transition-all duration-200 group whitespace-nowrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="w-5 h-5 group-hover:scale-110 transition-transform">
                                                    <path d="M16 17 5 6l-5 5"></path>
                                                    <path d="M21 12H9"></path>
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <span>Cancel Colocation</span>
                                            </button>

                                        </form>

                                    @endif
                                    @if ($colocation->membership->role != "owner")
                                        <form
                                            action="{{ route('colocations.leave', ["colocation" => $colocation->id, "user" => auth()->id()]) }}"
                                            method="POST">

                                            @csrf
                                            <button
                                                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-red-500/10 hover:bg-red-500/20 text-red-600 hover:text-red-700 font-medium rounded-lg transition-all duration-200 whitespace-nowrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="m16 17 5-5-5-5"></path>
                                                    <path d="M21 12H9"></path>
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                </svg>
                                                <span>Leave</span>
                                            </button>
                                        </form>

                                    @endif

                                    <!-- Invite Modal -->
                                    <div x-show="invite" x-cloak x-transition.opacity.duration-300ms
                                        class="fixed inset-0 z-50 flex items-center justify-center p-4">
                                        <div class="fixed inset-0 bg-black/50 backdrop-blur-md" @click="invite = false">
                                        </div>
                                        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md relative z-50 p-8"
                                            @keydown.escape.window="invite = false">
                                            <!-- Modal Header -->
                                            <div class="flex items-center justify-between mb-6">
                                                <div>
                                                    <h3 class="text-2xl font-bold text-slate-900">Invite Member</h3>
                                                    <p class="text-sm text-slate-500 mt-1">Add a new member to
                                                        {{ $colocation->name }}
                                                    </p>
                                                </div>
                                                <button @click="invite = false"
                                                    class="text-slate-400 hover:text-slate-600 p-2 hover:bg-slate-100 rounded-lg transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- Form -->
                                            <form
                                                action="{{ route('colocations.invite', ["colocation" => $colocation->id]) }}"
                                                method="POST" class="space-y-5">
                                                @csrf
                                                <div>
                                                    <label for="email"
                                                        class="block text-sm font-semibold text-slate-700 mb-2">Email
                                                        Address</label>
                                                    <input id="email" type="email" name="email" required
                                                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder-slate-400 text-slate-900"
                                                        placeholder="member@example.com">
                                                </div>

                                                <!-- Buttons -->
                                                <div class="flex gap-3 pt-4">
                                                    <button type="button" @click="invite = false"
                                                        class="flex-1 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-lg transition-colors">
                                                        Cancel
                                                    </button>
                                                    <button type="submit"
                                                        class="flex-1 px-4 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 hover:shadow-lg hover:shadow-indigo-500/50 text-white font-medium rounded-lg transition-all">
                                                        Send Invite
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Members Section -->
                        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8 mb-6">
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-slate-900 mb-2">Members</h3>
                                <p class="text-sm text-slate-500">
                                    {{ $colocation->users_count }}
                                    member
                                    {{ $colocation->users_count != 1 ? 's' : '' }}
                                    in this colocation
                                </p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($colocation->users as $user)
                                    @if ($user->membership->deleted_at == null)
                                        <div
                                            class="group p-5 bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200 rounded-xl hover:border-indigo-300 hover:shadow-md transition-all duration-300">
                                            <div class="flex items-center gap-4">
                                                <div
                                                    class="w-14 h-14 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center flex-shrink-0">
                                                    <span
                                                        class="text-white font-bold text-lg">{{ substr($user->name, 0, 1) }}</span>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h4 class="font-semibold text-slate-900 truncate">{{ $user->name }}</h4>
                                                    <span
                                                        class="inline-block mt-2 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-700">{{ ucfirst($user->membership->role) }}
                                                    </span>
                                                    <div class="font-semibold text-slate-900 truncate">
                                                        Reputation:
                                                        {{ $user->reputation }}
                                                    </div>
                                                </div>
                                                <div>
                                                    @if($colocation->membership->role == "owner" && $user->id != auth()->id())
                                                        <form
                                                            action="{{ route('colocations.removeUser', ["colocation" => $colocation->id, "user" => $user->id]) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit"
                                                                class="text-white bg-red-500 hover:text-slate-600 p-2   rounded-lg transition-colors">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                    viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                            </div>



                            <div class="mb-6 mt-6">
                                <h3 class="text-2xl font-bold text-slate-900 mb-2">Old Members</h3>
                                <p class="text-sm text-slate-500">
                                    {{ $colocation->users_count }}
                                    old member
                                    {{ $colocation->users_count != 1 ? 's' : '' }}
                                    in this colocation
                                </p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                                @foreach ($colocation->users as $user)
                                    @if($user->membership->deleted_at != null)
                                        <div
                                            class="group p-5 bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200 rounded-xl hover:border-indigo-300 hover:shadow-md transition-all duration-300">
                                            <div class="flex items-center gap-4">
                                                <div
                                                    class="w-14 h-14 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center flex-shrink-0">
                                                    <span
                                                        class="text-white font-bold text-lg">{{ substr($user->name, 0, 1) }}</span>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h4 class="font-semibold text-slate-900 truncate">{{ $user->name }}</h4>
                                                    <span
                                                        class="inline-block mt-2 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-700">{{ ucfirst($user->membership->role) }}
                                                    </span>

                                                </div>

                                            </div>
                                        </div>

                                    @endif
                                @endforeach

                            </div>
                        </div>

                        <!-- User Settlement Summary Card -->
                        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8 mb-6">
                            <h3 class="text-2xl font-bold text-slate-900 mb-6">Settlement Summary</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Money Paid -->
                                <div
                                    class="p-4 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-lg border border-emerald-200">
                                    <p class="text-sm text-emerald-600 font-semibold mb-1">Amount Paid</p>
                                    <p class="text-lg font-bold text-slate-900">{{ $colocation->user_money_payed ?? '0' }}
                                        DH</p>
                                </div>

                                <!-- Money Needed -->
                                <div
                                    class="p-4 bg-gradient-to-br from-orange-50 to-orange-100 rounded-lg border border-orange-200">
                                    <p class="text-sm text-orange-600 font-semibold mb-1">Amount Owed</p>
                                    <p class="text-lg font-bold text-slate-900">{{ $colocation->user_money_needed ?? '0' }}
                                        DH</p>
                                </div>
                                <div
                                    class="p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg border border-blue-200">
                                    <p class="text-sm text-blue-600 font-semibold mb-1">Amount Taken</p>
                                    <p class="text-lg font-bold text-slate-900">{{ $colocation->user_money_taken ?? '0' }}
                                        DH</p>
                                </div>
                            </div>
                        </div>


                        <!-- Colocation Details Card -->
                        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8">
                            <h3 class="text-2xl font-bold text-slate-900 mb-6">Colocation Details</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <!-- Created Date -->
                                <div
                                    class="p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg border border-blue-200">
                                    <p class="text-sm text-blue-600 font-semibold mb-1">Created</p>
                                    <p class="text-lg font-bold text-slate-900">
                                        {{ $colocation->created_at->format('M d, Y') }}
                                    </p>
                                </div>

                                <!-- Total Members -->
                                <div
                                    class="p-4 bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-lg border border-indigo-200">
                                    <p class="text-sm text-indigo-600 font-semibold mb-1">Total Members</p>
                                    <p class="text-lg font-bold text-slate-900">{{ $colocation->users_count }}</p>
                                </div>

                                <!-- Number of Expenses -->
                                <div
                                    class="p-4 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-lg border border-emerald-200">
                                    <p class="text-sm text-emerald-600 font-semibold mb-1">Expenses</p>
                                    <p class="text-lg font-bold text-slate-900">{{ $colocation->expenses_count }}</p>
                                </div>

                                <!-- Total Expenses Amount -->
                                <div
                                    class="p-4 bg-gradient-to-br from-rose-50 to-rose-100 rounded-lg border border-rose-200">
                                    <p class="text-sm text-rose-600 font-semibold mb-1">Total Amount</p>
                                    <p class="text-lg font-bold text-slate-900">
                                        {{ $colocation->total ?? '0' }}
                                        DH
                                    </p>
                                </div>

                                <!-- Total Categories -->
                                <div
                                    class="p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg border border-purple-200">
                                    <p class="text-sm text-purple-600 font-semibold mb-1">Categories</p>
                                    <p class="text-lg font-bold text-slate-900">{{ $colocation->categories_count }}</p>
                                </div>

                                <!-- Address -->
                                <div
                                    class="p-4 bg-gradient-to-br from-amber-50 to-amber-100 rounded-lg border border-amber-200">
                                    <p class="text-sm text-amber-600 font-semibold mb-1">Address</p>
                                    <p class="text-lg font-bold text-slate-900 truncate">{{ $colocation->address }}</p>
                                </div>
                            </div>
                        </div>

                    @else
                        <!-- Empty State -->
                        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-12 text-center">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500/10 to-purple-500/10 rounded-2xl mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewbox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="text-indigo-600">
                                    <path
                                        d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z">
                                    </path>
                                </svg>
                            </div>

                            <h2 class="text-2xl font-bold text-slate-900 mb-2">No colocation yet</h2>
                            <p class="text-slate-600 mb-8 max-w-sm mx-auto">Create your first colocation to start managing
                                shared expenses with your roommates or friends.</p>

                            <div x-data="{ open: false }">
                                <button @click="open = true"
                                    class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg hover:shadow-lg hover:shadow-indigo-500/50 transition-all duration-200 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                                        <path d="M12 5v14M5 12h14"></path>
                                    </svg>
                                    <span>Create Colocation</span>
                                </button>

                                <!-- Empty State Modal -->
                                <div x-show="open" x-cloak x-transition.opacity.duration-300ms
                                    class="fixed inset-0 z-50 flex items-center justify-center p-4">
                                    <div class="fixed inset-0 bg-black/50 backdrop-blur-md" @click="open = false"></div>
                                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md relative z-50 p-8"
                                        @keydown.escape.window="open = false">
                                        <!-- Modal Header -->
                                        <div class="flex items-center justify-between mb-6">
                                            <div>
                                                <h3 class="text-2xl font-bold text-slate-900">Create Colocation</h3>
                                                <p class="text-sm text-slate-500 mt-1">Start managing shared expenses</p>
                                            </div>
                                            <button @click="open = false"
                                                class="text-slate-400 hover:text-slate-600 p-2 hover:bg-slate-100 rounded-lg transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Form -->
                                        <form action="{{ route('colocations.store') }}" method="POST" class="space-y-5">
                                            @csrf
                                            <div>
                                                <label for="coloc_name"
                                                    class="block text-sm font-semibold text-slate-700 mb-2">Colocation
                                                    Name</label>
                                                <input id="coloc_name" name="name" required
                                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder-slate-400 text-slate-900"
                                                    placeholder="e.g. Downtown Apartment">
                                            </div>

                                            <div>
                                                <label for="coloc_address"
                                                    class="block text-sm font-semibold text-slate-700 mb-2">Address</label>
                                                <input id="coloc_address" name="address" required
                                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder-slate-400 text-slate-900"
                                                    placeholder="e.g. 42 Main Street, Apt 5B">
                                            </div>

                                            <!-- Buttons -->
                                            <div class="flex gap-3 pt-4">
                                                <button type="button" @click="open = false"
                                                    class="flex-1 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-lg transition-colors">
                                                    Cancel
                                                </button>
                                                <button type="submit"
                                                    class="flex-1 px-4 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 hover:shadow-lg hover:shadow-indigo-500/50 text-white font-medium rounded-lg transition-all">
                                                    Create
                                                </button>
                                            </div>
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
    <script>
        window.Echo.private("colocation.update").listen("member.added", () => {
            location.reload();
        },);
    </script>
</x-app-layout>