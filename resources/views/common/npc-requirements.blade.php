<div id="requirements" class="bg-white">

    <div class="py-20">
        <div class="container">
            <div class="md:flex xl:space-x-10 max-w-5xl mx-auto">

                <div class="w-full md:max-w-xs p-7 sm:p-10 md:mr-8 xl:mr-0 bg-white flex-shrink-0 flex rounded-xl shadow-2xl">

                    <div class="space-y-2 md:space-y-4 relative my-auto">
                        <div class="absolute z-0 w-1 h-full bg-gray-200 top-0 left-0.5 rounded-full"></div>

                        <div class="flex relative z-10 group cursor-pointer hte-div-1" onclick="toggleRequirements('hte-div-1')">
                            <div class="w-2 flex-shrink-0 bg-nin-green mr-6 rounded-full hte-indicator"></div>
                            <div class="py-2 md:py-3 md:text-lg group-hover:text-nin-green overflow-hidden inline-block">
                                Re-issuance / Attestation
                            </div>
                        </div>

                        <div class="flex relative z-10 group cursor-pointer hte-div-2" onclick="toggleRequirements('hte-div-2')">
                            <div class="w-2 flex-shrink-0 bg-nin-green mr-6 rounded-full hte-indicator invisible"></div>
                            <div class="py-2 md:py-3 md:text-lg group-hover:text-nin-green overflow-hidden inline-block">
                                New Registration
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-5 md:mt-0 flex-grow relative z-10 p-7 sm:p-10 bg-gray-100 overflow-hidden rounded-xl shadow-md">

                    <div id="hte-div-1" class="hte-div">
                        <div class="text-2xl font-semibold">
                            Documents Required (Re-issuance / Attestation) <br/>
                            <div class="mt-8 text-lg">
                            For Nigerian that are aged 18 and above who need a replacement or certified copy or have no National Population Commission(NPC) birth certificate at all.</div>
                        </div>
                        <div class="mt-8 text-lg">
                            <ul class="ml-5 list-disc space-y-2">
                                <li>Sworn affidavit for attestation of birth from the high court</li>
                                <li>Passport photographs of the owner</li>
                                <li>Valid ID card (Passport, Driver’s Licenses)</li>
                                <li>Full details of birth: Place of birth (LGA, State), Date of Birth, Parents' full names</li>
                                <li>Completed NPC application form (provided during appointment)</li>
                            </ul>
                        </div>
                    </div>

                    <div id="hte-div-2" class="hte-div hidden">
                        <div class="text-2xl font-semibold">
                            Documents Required (New Registration)<br/>
                            <div class="mt-8 text-lg">For children born outside Nigeria and those below 18yrs requiring a Nigerian birth certificate.</div> 
                        </div>
                        <div class="mt-8 text-lg">
                            <ul class="ml-5 list-disc space-y-2">
                                <li>Child's original birth certificate from the country of birth (e.g., UK birth certificate)</li>
                                <li>Parent's valid Nigerian international passport</li>
                                <li>Proof of parent's address in the UK</li>
                                <li>Completed NPC application form (provided during appointment)</li>
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
                        <a href="{{route('birthCertificateOptions')}}" class="btn btn-nin-green btn-lg">
                            Book Now
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>