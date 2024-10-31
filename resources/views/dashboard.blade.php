<x-app-layout>
    <x-slot name="header" class="text-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Welcome to your financial journey with ExpenseEase! Keep track of your spending, plan your budget, and achieve your financial goals with ease. Ready to make every expense count?') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('') }}</div>
                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{ route('expenses.index') }}" class="btn btn-primary btn-lg mt-3" style="background-color: #5cb85c; border-color: #5cb85c; color: white; border-radius: 50px; padding: 15px 30px;">
                            <i class="fas fa-wallet"></i> Go to ExpenseEase
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
