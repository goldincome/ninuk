@extends('layouts.app')

@section('title')
    Order Successful - NINUK
@endsection

@section('description')
    Order Successful - NINUK
@endsection

@section('content')
    <main class="container mx-auto px-6 py-6 md:py-24 text-center">
        <div class="bg-white p-4 md:p-12 rounded-lg shadow-xl max-w-2xl mx-auto border border-green-300">
            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-100 mb-4">
                <i class="fas fa-check-circle text-5xl text-green-500"></i>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-green-600 mb-4">Order Successful!</h1>
            <p class="text-gray-700 text-lg mb-6">
                Thank you for your order. Your order is being processed and an email will be sent to you shortly
            </p>
            <p class="text-gray-700 text-sm mb-6">
                Please, copy or note down below Order Ref No, as you will need it in all communication regarding this order.
            </p>

            <div class="bg-blue-50 p-6 rounded-md text-left my-8 border border-blue-200">
                <h2 class="text-xl font-semibold text-blue-700 mb-4">Order Summary</h2>
                <div class="space-y-2 text-gray-600 mb-4" style="text-align: left">
                    <p><strong>Order Ref Number:</strong> #{{ $appointment->ref }}</p>
                    <p><strong>Date:</strong> {{ $appointment->created_at->format('D, M j, Y') }}</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-700 border">
                        <thead class="bg-blue-100 text-blue-800 font-semibold">
                            <tr>
                                <th class="p-3 border">Service</th>
                                <th class="p-3 border">Qty</th>
                                <th class="p-3 border">Price</th>
                                <th class="p-3 border">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr>
                                <td class="p-3 border">{{ json_decode($appointment->details)->name }}</td>
                                <td class="p-3 border">{{ json_decode($appointment->details)->quantity }}</td>
                                <td class="p-3 border">£{{ json_decode($appointment->details)->amount }}</td>
                                <td class="p-3 border">£{{ json_decode($appointment->details)->total_amount }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="mt-6 space-y-1 text-gray-700 text-right">
                    <p><strong>Tax:</strong> £0.00</p>
                    <p class="text-lg font-semibold text-blue-700"><strong>Total:</strong>
                        £{{ $appointment->amount }}</p>
                </div>

                <p class="text-sm text-gray-500 mt-4">You will receive an email confirmation shortly with the full details
                    of your
                    order.</p>
            </div>


            <div class="mt-10 space-y-4 md:space-y-0 md:flex md:justify-center md:space-x-4">
                
                <a href="{{ url('/') }}"
                    class="block w-full md:w-auto hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 shadow-md text-lg" style="background-color: orange;">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Homepage
                </a>
            </div>
            <p class="text-sm text-gray-500 mt-8">
                If you have any questions, please <a href="{{ route('contactUs') }}" class="text-orange-500 hover:underline">contact
                    our support team</a>.
            </p>
        </div>
    </main>
@endsection
