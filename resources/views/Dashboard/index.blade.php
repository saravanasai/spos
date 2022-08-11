@extends('Layouts.master')

@section('tab_tittle')
    S-POS|Dashboard
@endsection

@section('master-tittle')
    Dashboard
@endsection

@section('content')
    <div class="grid gap-6 mb-8 md:grid-cols-12 xl:grid-cols-12">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Home
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Fuga, cum commodi a omnis numquam quod? Totam exercitationem
                    quos hic ipsam at qui cum numquam, sed amet ratione! Ratione,
                    nihil dolorum.
                </p>
            </div>
        </div>
    </div>
@endsection
