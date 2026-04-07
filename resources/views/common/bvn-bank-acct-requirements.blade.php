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
                                For Nigerian BVN
                            </div>
                        </div>

                        <div class="flex relative z-10 group cursor-pointer hte-div-2" onclick="toggleRequirements('hte-div-2')">
                            <div class="w-2 flex-shrink-0 bg-nin-green mr-6 rounded-full hte-indicator invisible"></div>
                            <div class="py-2 md:py-3 md:text-lg group-hover:text-nin-green overflow-hidden inline-block">
                                For Bank Account Opening
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-5 md:mt-0 flex-grow relative z-10 p-7 sm:p-10 bg-gray-100 overflow-hidden rounded-xl shadow-md">

                    <div id="hte-div-1" class="hte-div">
                        <div class="text-2xl font-semibold">
                            BVN Documents Required <br/>
                            <div class="mt-8 text-lg">Bring any of the documents below:</div> 
                        </div>
                        <div class="mt-8 text-lg">
                            <ul class="ml-5 list-disc space-y-2">
                                <li>Nigerian international passport (Original copy)</li>
                                <li>Nigerian NIN Verification Slip</li>
                            </ul>
                        </div>
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-3xl leading-10">
                            From £40
                        </div>
                    </div>

                    <div id="hte-div-2" class="hte-div hidden">
                        <div class="text-2xl font-semibold">
                            Opening Bank Account Documents Required<br/>
                            <div class="mt-8 text-lg">
                                Bring all of the documents below:</div>
                        </div>
                        <div class="mt-8 text-lg">
                            <ul class="ml-5 list-disc space-y-2">
                                <li>Your BVN </li>
                                <li>NIN Verification Slip</li>
                            </ul>
                        </div>
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-3xl leading-10">
                            From £25
                        </div>
                    </div>

                    <div class="mt-8 text-red">
                        <div style="color: red"><b>
                        You must bring the physical original of the above documents along when coming to process your BVN/Bank account
                        </b>
                        </div>
                    </div>

                    <div class="flex items-center space-x-8 mt-4">
                        <a href="{{route('bookings.index')}}" class="btn btn-nin-green btn-lg">
                            Book Now
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>