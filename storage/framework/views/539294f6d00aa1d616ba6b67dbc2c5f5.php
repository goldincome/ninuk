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
                                Adults (16 yrs & Above)
                            </div>
                        </div>

                        <div class="flex relative z-10 group cursor-pointer hte-div-2" onclick="toggleRequirements('hte-div-2')">
                            <div class="w-2 flex-shrink-0 bg-nin-green mr-6 rounded-full hte-indicator invisible"></div>
                            <div class="py-2 md:py-3 md:text-lg group-hover:text-nin-green overflow-hidden inline-block">
                                Children (Below 16 yrs)
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-5 md:mt-0 flex-grow relative z-10 p-7 sm:p-10 bg-gray-100 overflow-hidden rounded-xl shadow-md">

                    <div id="hte-div-1" class="hte-div">
                        <div class="text-2xl font-semibold">
                            Documents Required (16 yrs & above)<br/>
                            <div class="mt-8 text-lg">Bring your BVN if you have one and 
                            any of documents below</div> 
                        </div>
                        <div class="mt-8 text-lg">
                            <ul class="ml-5 list-disc space-y-2">
                                <li>Nigerian international passport (Valid or Expired)</li>
                                <li>Nigerian birth certificate</li>
                                <li>Authentication letter from the Nigerian embassy/mission</li>
                                <li>Government ID for staff of FGN</li>
                                <li>if you have a BVN it is Mandatory to bring it along for the NIN enrollment</li>
                            </ul>
                        </div>
                    </div>

                    <div id="hte-div-2" class="hte-div hidden">
                        <div class="text-2xl font-semibold">
                            Documents Required (below 16 yrs) <br/>
                            <div class="mt-8 text-lg">
                            A valid NIN of a parent or guardian is mandatory for the enrolment of child
                            and One/Any of below documents</div>
                        </div>
                        <div class="mt-8 text-lg">
                            <ul class="ml-5 list-disc space-y-2">
                                <li>Nigerian International passport( Valid or Expired)</li>
                                <li>Original birth certificate</li>
                                <li>The presence of a parent or legal guardian with a NIN</li>
                                <li>Birth Certificate and Evidence of Relationship (For guardian’s NIN)</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-8 text-red">
                        <div style="color: red">
                            <b>
                                Just one out of the above documents are required and you must bring the physical original along when coming to capture.
                            </b>
                        </div>
                        <div style="color:blue">
                            <b>
                               <br/> Note: Please, remember to wear white or bright color top and if your children are the ones capturing, it is mandatory for children to wear white or bright top.
                            </b>
                        </div>
                    </div>

                    <div class="flex items-center space-x-8 mt-4">
                        <a href="<?php echo e(route('birthCertificateOptions')); ?>" class="btn btn-nin-green btn-lg">
                            Book Now
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div><?php /**PATH E:\xampp\htdocs\nin-uk\resources\views/common/requirements.blade.php ENDPATH**/ ?>