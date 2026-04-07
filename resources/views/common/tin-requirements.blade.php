<div id="requirements" class="bg-white">

    <div class="py-20">
        <div class="container">
            <div class="md:flex xl:space-x-10 max-w-5xl mx-auto">
                <div class="mt-5 md:mt-0 flex-grow relative z-10 p-7 sm:p-10 bg-gray-100 overflow-hidden rounded-xl shadow-md">

                    <div id="hte-div-1" class="hte-div">
                        <div class="text-2xl font-semibold">
                            Documents Required for Individual TIN Tax Card <br/>
                            <div class="mt-8 text-lg">
                            For individuals who require a Tax Identification Number (TIN) for personal or business use.</div>
                        </div>
                        <div class="mt-8 text-lg">
                            <ul class="ml-5 list-disc space-y-2">
                                <li>BVN SLIP</li>
                                <li>Email</li>
                                <li>Phone number</li>
                                <li>Address</li>
                                <li>State of origin</li>
                                <li>Nature of Business</li>
                                <li>Single or married status</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-8 text-red">
                        <div style="color: red">
                            <b>
                                Please bring the physical original copies of all required documents to your appointment for verification.
                            </b>
                        </div>
                    </div>

                    <div class="flex items-center space-x-8 mt-4">
                        <a href="{{route('pre-checkout.show', $tin ? $tin->slug : '')}}" class="btn btn-nin-green btn-lg">
                            Book Now
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>