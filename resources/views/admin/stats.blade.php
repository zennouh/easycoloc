@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

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

    {{-- user management could be added here later --}}
</div>
@endsection
