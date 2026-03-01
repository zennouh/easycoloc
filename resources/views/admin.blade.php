<x-app-layout>
    <div class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">
        <div class="flex">
            <x-top-header/>

            <main class="flex-1 overflow-y-auto">
                <div class="p-8">
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent mb-4">Admin Dashboard</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="p-6 bg-white border border-slate-200 rounded-lg shadow">
                            <p class="text-sm text-slate-500">Total colocations</p>
                            <p class="text-2xl font-bold">{{ $totalColocations }}</p>
                        </div>
                        <div class="p-6 bg-white border border-slate-200 rounded-lg shadow">
                            <p class="text-sm text-slate-500">Total users</p>
                            <p class="text-2xl font-bold">{{ $totalUsers }}</p>
                        </div>
                        <div class="p-6 bg-white border border-slate-200 rounded-lg shadow">
                            <p class="text-sm text-slate-500">Expenses count</p>
                            <p class="text-2xl font-bold">{{ $totalExpenses }}</p>
                        </div>
                        <div class="p-6 bg-white border border-slate-200 rounded-lg shadow">
                            <p class="text-sm text-slate-500">Total amount spent</p>
                            <p class="text-2xl font-bold">{{ number_format($sumExpenses,2) }} DH</p>
                        </div>
                    </div>

                    <!-- user management section -->
                    <div class="mt-10">
                        <h2 class="text-2xl font-semibold mb-4">User management</h2>
                        <div class="space-y-4">
                            @foreach ($users as $user)
                                <div class="flex items-center justify-between p-4 bg-white border border-slate-200 rounded-lg shadow">
                                    <div>
                                        <span class="font-medium text-slate-900">{{ $user->name }}</span>
                                        <span class="text-xs text-slate-500 ml-2">({{ $user->email }})</span>
                                        @if($user->banned_at)
                                            <span class="text-xs text-red-600 ml-2">banned</span>
                                        @endif
                                    </div>
                                    <form action="{{ route('admin.users.toggleBan', ['user' => $user->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-3 py-1 text-sm font-medium rounded-lg transition-colors 
                                            {{ $user->banned_at ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-red-100 text-red-700 hover:bg-red-200' }}">
                                            {{ $user->banned_at ? 'Unban' : 'Ban' }}
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>