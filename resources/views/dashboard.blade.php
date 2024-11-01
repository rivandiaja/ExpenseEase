<x-app-layout>
    <x-slot name="header" class="text-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to your financial journey with ExpenseEase! Keep track of your spending, plan your budget, and achieve your financial goals with ease. Ready to make every expense count?') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <!-- Welcome Message -->
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">
                        {{ __('Welcome to ExpenseEase!') }}
                    </h2>
                    <p class="text-gray-600 mb-8">
                        {{ __('Keep track of your spending, plan your budget, and achieve your financial goals with ease.') }}
                    </p>

                    <!-- Status Message -->
                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Main Button -->
                    <a href="{{ route('expenses.index') }}"
                       class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-8 rounded-full transition duration-300">
                       Start Managing Expenses
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
