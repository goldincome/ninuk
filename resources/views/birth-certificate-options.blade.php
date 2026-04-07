@extends('layouts.app')

@section('title')
    Birth Certificate Options
@endsection

@section('description')
    Choose your birth certificate option to continue the NIN registration process.
@endsection

@section('content')
    <div class="container my-10">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-10">
                <h1 class="page-title">
                    Choose Your Birth Certificate Option
                </h1>
                <p class="mt-2 text-lg text-gray-700">
                    To proceed with your NIN registration, please select the option that best describes your situation
                    regarding the National Population Commission (NPC) Birth Certificate.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Card: Have NPC Birth Certificate -->
                <div id="npc-card"
                    class="box p-6 cursor-pointer flex flex-col items-center justify-center text-center transition-colors duration-200 hover:bg-gray-200">
                    <span class="fa fa-file-invoice fa-4x mb-4 text-nin-green"></span>
                    <h2 class="text-xl font-bold">
                        Are You Born In Nigeria?
                    </h2>
                    <p class="mt-2 text-sm text-gray-700">
                        Select this option if you are born in Nigerian.
                    </p>
                </div>

                <!-- Right Card: Don't Have NPC Birth Certificate -->
                <div id="no-npc-card"
                    class="box p-6 cursor-pointer flex flex-col items-center justify-center text-center transition-colors duration-200 hover:bg-gray-200">
                    <span class="fa fa-file-circle-xmark fa-4x mb-4 text-nin-green"></span>
                    <h2 class="text-xl font-bold">
                        Are You Born Outside Nigeria?
                    </h2>
                    <p class="mt-2 text-sm text-gray-700">
                        Choose this option if you are born ouside Nigeria.
                    </p>
                </div>
            </div>

            <!-- Content for "Have NPC" option -->
            <div id="npc-certificate-details" class="mt-10 box p-6">
                <h3 class="text-2xl font-bold text-nin-green">
                    Do you have National Population Commission(NPC) Attestation Of Birth Certificate?
                </h3>

                <div class="mt-4 text-gray-900 prose">
                    <p>
                        For all applicants born in Nigeria, it is <strong>mandatory</strong> to have National Population
                        Commission(NPC) Attestation of Birth Certificate to process your NIN registration:
                    </p>
                    <div class="flex items-start space-x-4 mt-4 ">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-nin-green flex items-center justify-center text-white font-bold">
                            Yes
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900">I have my NPC Attestation of Birth Certificate
                            </h4>
                            <p class="mt-1 text-gray-700">
                                Before you proceed, <button id="openModalBtn"
                                    class="text-blue-600 hover:text-blue-800 font-medium underline focus:outline-none"
                                    aria-controls="confirmationModal" aria-expanded="false">
                                    click here
                                </button>
                                to confirm if what you have matches this.
                            </p>
                            <a href="{{ route('bookings.index') }}" class="btn btn-nin-green btn-md"
                                style="font-size: 1rem; font-weight: 500;">
                                Click here to Proceed to NIN Application Booking
                            </a>
                            {{-- <p class="mt-1 text-gray-700">
                                    An official Attestation of birth certificate issued by the National Population Commission (NPC) at birth in Nigeria.
                                    </p>
                                    --}}
                        </div>

                    </div>
                    <br />
                    <div class="flex items-start space-x-4 mt-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-nin-green flex items-center justify-center text-white font-bold">
                            No
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900">I do not have NPC Attestation of Birth
                                Certificate</h4>
                            <p class="mt-1 text-gray-700">
                                We assist you in applying for your NPC Attestation of Birth Certificate, so you can proceed
                                with your NIN Registration. Once your NPC Attestation of Birth Certificate is ready, we will
                                inform you to come or book an appointment for your NIN registration.
                                @if (!is_null($attestationBirthCertificate))
                                    <br />The cost to assist for NPC Attestation of Birth Certificate application is
                                    <strong>£{{ $attestationBirthCertificate->ourService->price }}</strong> per person.
                                @endif
                            </p>
                            <a href="{{ route('pre-checkout.show', $attestationBirthCertificate ? $attestationBirthCertificate->slug : '') }}"
                                class="btn btn-nin-orange btn-md" style="font-size: 1rem; font-weight: 500;">
                                Click to Apply for NPC Attestation of Birth Certificate.
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Content for "Don't Have NPC" option -->
            <div id="no-npc-certificate-details" class="mt-10 box p-6">
                <h3 class="text-2xl font-bold text-nin-green">
                    Do you have National Population Commission(NPC) Notification Of Birth Certificate?
                </h3>

                <div class="mt-4 text-gray-900">
                    <p class="mb-6">
                        For all applicants <strong>born outside Nigeria</strong>, it is <strong>mandatory</strong> to have
                        National Population
                        Commission(NPC) Notification of Birth Certificate to process your NIN registration:
                    </p>

                    <div class="space-y-8">
                        <!-- Step 1 -->
                        <div class="flex items-start space-x-4">
                            <div
                                class="flex-shrink-0 w-10 h-10 rounded-full bg-nin-green flex items-center justify-center text-white font-bold">
                                Yes
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900">I have my NPC Notification of Birth
                                    Certificate</h4>
                                <a href="{{ route('bookings.index') }}" class="btn btn-nin-green btn-md"
                                    style="font-size: 1rem; font-weight: 500;">
                                    Click here to Proceed to NIN Application Booking
                                </a>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex items-start space-x-4">
                            <div
                                class="flex-shrink-0 w-10 h-10 rounded-full bg-nin-green flex items-center justify-center text-white font-bold">
                                No
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900">I do not have NPC Notification of Birth
                                    Certificate</h4>
                                <p class="mt-1 text-gray-700">
                                    We assist you in applying for your NPC Notification of Birth Certificate, so you can
                                    proceed with your NIN Registration. Once your NPC Notification of Birth Certificate is
                                    ready, we will inform you to come or book an appointment for your NIN registration.
                                    @if (!is_null($notificationBirthCertificate))
                                        <br />The cost to assist for NPC Notification of Birth Certificate application is
                                        <strong>£{{ $notificationBirthCertificate->ourService->price }}</strong> per person.
                                    @endif
                                </p>
                                <a href="{{ route('pre-checkout.show', $notificationBirthCertificate ? $notificationBirthCertificate->slug : '') }}"
                                    class="btn btn-nin-orange btn-md" style="font-size: 1rem; font-weight: 500;">
                                    Click to Apply for NPC Notification of Birth Certificate.
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>



    </div>
    <div id="confirmationModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-75 z-50 flex items-center justify-center p-4 transition-opacity duration-300"
        style="display: none;" role="dialog" aria-modal="true" aria-labelledby="modal-title">
        <div
             class="bg-white rounded-lg shadow-xl w-full **max-w-4xl** mx-auto overflow-hidden transform transition-all sm:my-8 sm:align-middle sm:w-full">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 id="modal-title" class="text-xl font-bold text-gray-900">
                    Confirm Your NPC Document
                </h3>
                <button id="closeModalBtn"
                    class="text-gray-400 hover:text-gray-600 transition duration-150 focus:outline-none"
                    aria-label="Close modal">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="p-6">
                <p class="text-gray-700 mb-4">
                    Please ensure your document looks like the example below:
                </p>
                <div
                    class="w-full h-96 bg-gray-200 flex items-center justify-center rounded-lg border-2 border-dashed border-gray-400">
                    
                        <img src="{{ asset('img/bgs/attestation-cert.png') }}" alt="NPC Attestation Sample"
                            class="w-auto h-auto max-w-full max-h-[80vh] object-contain shadow-lg border border-gray-300">
                    
                </div>
            </div>

            <div class="px-6 py-3 bg-gray-50 text-right">
                <button id="closeModalBtnFooter"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                    Close
                </button>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // Initially hide the content divs
            $('#npc-certificate-details').hide();
            $('#no-npc-certificate-details').hide();

            // Handle the click on the "Have NPC" card
            $('#npc-card').on('click', function() {
                $('#no-npc-card').removeClass('bg-nin-green text-white').addClass(
                    'bg-white text-black hover:bg-gray-200');
                $(this).removeClass('bg-white hover:bg-gray-200').addClass('bg-nin-green text-black');
                $('#npc-certificate-details').slideDown('fast');
                $('#no-npc-certificate-details').slideUp('fast');
            });

            // Handle the click on the "Don't have NPC" card
            $('#no-npc-card').on('click', function() {
                $('#npc-card').removeClass('bg-nin-green text-white').addClass(
                    'bg-white text-black hover:bg-gray-200');
                $(this).removeClass('bg-white hover:bg-gray-200').addClass('bg-nin-green text-black');
                $('#no-npc-certificate-details').slideDown('fast');
                $('#npc-certificate-details').slideUp('fast');
            });

            $('#no-npc-button-card').on('click', function() {
                $('#npc-card').removeClass('bg-nin-green text-white').addClass(
                    'bg-white text-black hover:bg-gray-200');
                $(this).removeClass('bg-white hover:bg-gray-200').addClass('bg-nin-green');
                $('#no-npc-certificate-details').slideDown('fast');
                $('#npc-certificate-details').slideUp('fast');
            });
        });

        document.addEventListener('DOMContentLoaded', (event) => {
            // 1. Get references
            const openBtn = document.getElementById('openModalBtn');
            const modal = document.getElementById('confirmationModal');
            const closeBtns = [
                document.getElementById('closeModalBtn'),
                document.getElementById('closeModalBtnFooter')
            ];

            // Check if critical elements exist before proceeding
            if (!modal || !openBtn) {
                console.error("Modal or Open Button not found. Check IDs.");
                return; // Stop execution if elements are missing
            }

            // 2. Define the toggle function. It uses style.display for hiding/showing.
            function toggleModal() {

                // Check current state and toggle
                if (modal.style.display === 'none' || modal.style.display === '') {
                    // SHOW the modal
                    // 'flex' matches the Tailwind classes used for centering (flex items-center justify-center)
                    modal.style.display = 'flex';
                    openBtn.setAttribute('aria-expanded', 'true');
                } else {
                    // HIDE the modal
                    modal.style.display = 'none';
                    openBtn.setAttribute('aria-expanded', 'false');
                }
            }

            // 3. Attach event listeners
            openBtn.addEventListener('click', toggleModal);

            closeBtns.forEach(btn => {
                if (btn) btn.addEventListener('click', toggleModal);
            });

            // Close modal when clicking outside (on the overlay)
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    toggleModal();
                }
            });

            // Close modal with the Escape key
            document.addEventListener('keydown', (e) => {
                if (modal.style.display !== 'none' && e.key === 'Escape') {
                    toggleModal();
                }
            });
        });
    </script>
@endsection
