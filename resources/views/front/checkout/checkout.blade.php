@extends('layouts.app')

@section('title', 'Checkout - NINUK')

@section('description', 'Securely complete your application and payment for our services.')

@section('content')
    <main class="container mx-auto px-4 sm:px-6 py-12 md:py-16">
        
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold text-center text-nin-green mb-12 page-title">Secure Checkout</h1>
            {{-- MODIFICATION: Increased gap between columns from lg:gap-12 to lg:gap-16 --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16 checkout-grid">

                {{-- Main Content Section --}}
                <div class="bg-white p-6 sm:p-8 rounded-lg shadow-lg checkout-main">

                    {{-- MODIFICATION: Added description box at the top of the form --}}
                    <div class="p-6 bg-gray-50 rounded-lg text-sm text-gray-700 leading-relaxed mb-8 border border-gray-200">
                        <h2 class="font-semibold text-lg text-gray-800 mb-2">About this Application</h2>
                        <p>You are applying for the official {{ $serviceType->name }}. This document is essential for various official purposes, including NIN registration. Please ensure all details provided below are accurate to avoid any delays.</p>
                    </div>

                    <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                        @csrf

                        {{-- 1. User Info Section --}}
                        <div class="section border-b pb-4">
                            <div>
                                <div>1</div>
                            </div>
                            <div>Your Information</div>
                        </div>
                        <div class="py-6 space-y-4">

                            {{-- MODIFICATION: Added display for number of people --}}
                            <div class="form-group">
                                <label for="applying_for_display">Applying For</label>
                                <div id="quantity" class="form-input bg-gray-100 cursor-not-allowed">
                                    {{ $newCustomer['children_count'] }} {{ \Illuminate\Support\Str::plural('person', $newCustomer['children_count'] ) }}
                                </div>
                            </div>

                            {{-- MODIFICATION: Changed value attributes to use variables from $newCustomer --}}
                            <div class="form-group">
                                <label for="full_name">Full Name <span class="form-input-required">*</span></label>
                                <input type="text" id="full_name" name="user_name" value="{{ old('user_name', $newCustomer['user_name']) }}" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address <span class="form-input-required">*</span></label>
                                <input type="email" id="email" name="user_email" value="{{ old('user_email', $newCustomer['user_email']) }}" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number <span class="form-input-required">*</span></label>
                                <input type="tel" id="phone" name="user_phone" value="{{ old('user_phone', $newCustomer['user_phone']) }}" class="form-input" required>
                            </div>
                            <input type="hidden" name="our_service_id" value="{{ $serviceType->ourService->id }}">
                        </div>

                        {{-- 2. Order Details Section --}}
                        <div class="section mt-10 border-b pb-4">
                            <div>
                                <div>2</div>
                            </div>
                            <div>Order Details</div>
                        </div>
                        <div class="py-6">
                           
                            {{-- Price Breakdown --}}
                            <div class="mt-8 border-t pt-6 space-y-3">
                                <h3 class="text-xl font-semibold text-gray-800 mb-4">Price Breakdown</h3>
                                <div class="flex justify-between items-center text-gray-600">
                                    <span>Service</span>
                                    <span class="font-medium">{{ $serviceType->name }}</span>
                                </div>
                                <div class="flex justify-between items-center text-gray-600">
                                    <span>Price per person</span>
                                    {{-- Added ID for JS --}}
                                    <span id="price-per-person" class="font-medium">£{{ $newCustomer['amount']  }}</span>
                                </div>
                                <div class="flex justify-between items-center text-gray-600">
                                    <span>Quantity</span>
                                    {{-- Added ID for JS --}}
                                    <span id="display-quantity" class="font-medium">1 person</span>
                                </div>
                                <div class="flex justify-between items-center text-gray-800 text-lg pt-4 border-t mt-4">
                                    <span class="font-semibold">Subtotal</span>
                                    {{-- Added ID for JS --}}
                                    <span id="display-subtotal" class="font-bold">£80.00</span>
                                </div>
                                <div class="flex justify-between items-center text-gray-800 text-lg">
                                    <span class="font-semibold">Tax (VAT)</span>
                                    {{-- Added ID for JS --}}
                                    <span id="display-tax" class="font-bold">£0.00</span>
                                </div>
                                <div
                                    class="flex justify-between items-center text-gray-900 font-bold text-xl pt-4 border-t mt-4">
                                    <span>Total</span>
                                    {{-- Added ID for JS --}}
                                    <span id="display-total" class="font-bold">£{{ $total }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- 3. Payment Section (No changes here) --}}
                        <div class="section mt-10 border-b pb-4">
                            <div>
                                <div>3</div>
                            </div>
                            <div>Select Payment Method</div>
                        </div>
                        <div class="py-6">
                            <div class="space-y-4">
                                @foreach ($paymentMethods::cases() as $payMethod)
                                    @include('front.payment-gateways.' . $payMethod->value)
                                @endforeach
                            </div>
                            


                            <div class="mt-8 text-center text-sm text-gray-500 flex items-center justify-center space-x-4">
                                <span class="secure-badge bg-green-100 text-green-700">
                                    <i class="fas fa-lock mr-1"></i> SSL Secured Connection
                                </span>
                                <span class="secure-badge bg-blue-100 text-blue-700">
                                    <i class="fas fa-shield-alt mr-1"></i> Verified Payment Gateway
                                </span>
                            </div>

                            <button type="submit" id="submit-button"
                                class="mt-10 w-full mx-auto btn btn-lg btn-nin-green font-bold !text-xl">Pay Now <i
                                    class="fa fa-arrow-right ml-2"></i></button>
                            <p class="text-xs text-gray-500 text-center mt-4">By clicking "Pay Now", you agree to our <a
                                    href="#" class="underline hover:text-nin-green">Terms of Service</a>.</p>
                        </div>
                    </form>
                </div>

                {{-- Sidebar Section (No changes here) --}}
                <div class="space-y-8 checkout-sidebar" style="margin-left: 1rem;">
                    <div class="bg-white p-6 sm:p-8 rounded-lg shadow-md text-center">
                        <img src="https://placehold.co/80x80/0fc55e/ffffff?text=?" alt="Guarantee Badge"
                            class="mx-auto mb-4 rounded-full">
                            <i class="fas fa-handshake"></i>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Our Service Guarantee</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">We guarantee a secure and efficient application
                            process. Our team is committed to ensuring your information is handled with the utmost care and
                            your application is processed correctly.</p>
                    </div>
                    <div class="bg-white p-6 sm:p-8 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Why Choose Our Service?</h3>
                        <ul class="space-y-3 text-sm text-gray-700">
                            <li class="flex items-start"><i
                                    class="fa fa-check-circle text-nin-green mr-2 mt-1"></i><span>Official Accredited
                                    Partner for processing.</span></li>
                            <li class="flex items-start"><i
                                    class="fa fa-check-circle text-nin-green mr-2 mt-1"></i><span>Fast, simple, and secure
                                    online application.</span></li>
                            <li class="flex items-start"><i
                                    class="fa fa-check-circle text-nin-green mr-2 mt-1"></i><span>Dedicated support for
                                    Nigerians in the UK.</span></li>
                            <li class="flex items-start"><i
                                    class="fa fa-check-circle text-nin-green mr-2 mt-1"></i><span>Transparent pricing with
                                    no hidden fees.</span></li>
                        </ul>
                    </div>
                    <div class="bg-nin-green bg-opacity-10 p-6 sm:p-8 rounded-lg text-center">
                        <i class="fa fa-headset text-3xl text-nin-green mb-3"></i>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Need Assistance?</h3>
                        <p class="text-gray-600 text-sm mb-4">Have questions? Our support team is ready to help you with
                            the checkout process.</p>
                        <a href="#" class="text-sm font-medium text-nin-green hover:underline">Contact Support <i
                                class="fa fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('css')
    <style>
        .payment-option {
            border: 1px solid #e5e7eb;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .payment-option:hover,
        .payment-option.selected {
            border-color: #0fc55e;
            box-shadow: 0 0 0 2px rgb(15 197 94 / 0.3);
        }

        .secure-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.8rem;
            font-weight: 500;
        }

        @media (min-width: 1024px) {
            .checkout-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .checkout-main {
                grid-column: span 2 / span 2;
            }

            .checkout-sidebar {
                grid-column: span 1 / span 1;
            }
        }
    </style>
@endsection

@section('js')
    <script>
        // Basic payment selection UI logic
        function selectPayment(method) {
            document.querySelectorAll('.payment-option').forEach(el => el.classList.remove('selected'));
            event.currentTarget.classList.add('selected');
            const stripeCardElement = document.getElementById('stripe-card-element');
            if (method === 'card') {
                stripeCardElement.classList.remove('hidden');
            } else {
                stripeCardElement.classList.add('hidden');
            }
        }

        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', () => {
                document.querySelectorAll('.payment-method').forEach(el => {
                    el.classList.remove('border-blue-500', 'ring', 'ring-blue-300');
                    const input = el.querySelector('input[type="radio"]');
                    if (input) input.checked = false;
                });

                method.classList.add('border-blue-500', 'ring', 'ring-blue-300');
                const selectedInput = method.querySelector('input[type="radio"]');
                if (selectedInput) selectedInput.checked = true;
            });
        });

        // --- NEW SCRIPT FOR AUTOMATIC CALCULATION ---
        document.addEventListener('DOMContentLoaded', function() {
            // --- CONFIGURATION ---
            const PRICE_PER_PERSON = {{ $newCustomer['amount'] }};
            const VAT_RATE = 0.00; // 20% VAT

            // --- SELECT ELEMENTS ---
            const quantityInput = document.getElementById('quantity');
            const displayQuantity = document.getElementById('display-quantity');
            const displaySubtotal = document.getElementById('display-subtotal');
            const displayTax = document.getElementById('display-tax');
            const displayTotal = document.getElementById('display-total');

            // --- CALCULATION FUNCTION ---
            function updateTotals() {
                let quantity = {{ $newCustomer['children_count'] }};

                // Default to 1 if input is empty or invalid
                if (isNaN(quantity) || quantity < 1) {
                    quantity = 1;
                }

                const subtotal = quantity * PRICE_PER_PERSON;
                const tax = subtotal * VAT_RATE;
                const total = subtotal + tax;

                // --- UPDATE DISPLAY ---
                displayQuantity.textContent = quantity + (quantity === 1 ? ' person' : ' people');
                displaySubtotal.textContent = '£' + subtotal.toFixed(2);
                displayTax.textContent = '£' + tax.toFixed(2);
                displayTotal.textContent = '£' + total.toFixed(2);
            }

            // --- EVENT LISTENER ---
            // Listen for any input event on the quantity field
            quantityInput.addEventListener('input', updateTotals);

            // Initial calculation on page load
            updateTotals();
        });
    </script>
@endsection