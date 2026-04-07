<?php $__env->startSection('title'); ?>
    Nigerian NIN Registration UK
<?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?>
    enrolment. The license covers Nigerian residents in London, Europe, and the United Kingdom
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function() {

            $(".faq-home-question").click(function() {
                var this_question = $(this);
                var this_answer = this_question.next(".faq-home-answer");

                if (this_answer.hasClass("hidden")) {
                    this_question.children(".fa").removeClass("fa-plus").addClass("fa-minus");
                    this_answer.removeClass("hidden");
                } else {
                    this_question.children(".fa").removeClass("fa-minus").addClass("fa-plus");
                    this_answer.addClass("hidden");
                }
            });

        });

        function toggleRequirements(id) {
            $(".hte-div").addClass("hidden");
            $("#" + id).removeClass("hidden");
            $(".hte-indicator").addClass("invisible");
            $("." + id).children().eq(0).removeClass("invisible");
        }

        function closebanner(index) {
            try {
                $(".ad-banner-1").addClass("hidden");
            } catch (e) {}
        }
    </script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div>


        
        <?php echo $__env->make('common.page-navlink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div class="relative">
            <div id="top" class="container md:flex md:space-x-10 py-10 relative z-20">
                <div class="md:w-1/2 flex">
                    <div class="my-auto pt-8 pb-5">
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-5xl leading-10">
                            Enroll for your NIN
                            <div class="h-1"></div>
                            right here in the UK
                        </div>

                        <div class="mt-6 md:leading-6 font-light opacity-70">
                            Are you a Nigerian residing in the UK? Do you need your NIN?
                            You can now register and process your NIN hassle-free. Book an appointment with us, submit your
                            information within minutes and make your NIN available in a few days.
                        </div>
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-3xl leading-10">
                            From £95
                        </div>
                        <div class="mt-6 flex space-x-2">
                            <a href="<?php echo e(route('birthCertificateOptions')); ?>" class="btn btn-nin-green btn-lg">
                                Book Now
                            </a>
                            <a href="/#requirements" class="btn btn-transparent-black btn-lg">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 hidden md:block">
                    <div class="flex justify-end" style="height: 500px">
                        <img src=<?php echo e(asset('img/bgs/home-bg.png')); ?> alt="logo" class="h-full object-contain" />
                    </div>
                </div>

            </div>

            <div class="w-full h-full opacity-40 img-bg3 absolute inset-0 z-10"></div>
        </div>
        <?php echo $__env->make('common.error-and-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('common.other-services', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div>
            <?php echo $__env->make('common.wavy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="transform rotate-180 bg-white">
                <?php echo $__env->make('common.wavy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>



        <?php echo $__env->make('common.requirements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




        <div id="how" class="py-20 relative">
            <div class="relative z-10 container">
                <div>

                    <div class="mb-16">
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-5xl leading-10">
                            How it works
                        </div>
                        <div class="mt-2 text-lg">
                            The process of obtaining your NIN is seamless. It goes through the steps highlighted below
                        </div>
                    </div>

                    <div class="mx-auto overflow-hidden grid sm:grid-cols-2 md:grid-cols-3 gap-4 xl:gap-8">

                        <div class="h-full block p-8 xl:p-14 rounded-xl shadow-sm bg-white">
                            <div>
                                <span class="fa fa-calendar text-6xl text-nin-green"></span>
                            </div>
                            <div class="mt-6">
                                <div class="text-xl lg:text-3xl font-semibold">
                                    Schedule an appointment
                                </div>
                                <div class="mt-2 sm:mt-4 font-light">
                                    You can pick a convenient place, date, and time to schedule your appointment. Your
                                    payment approves your appointment.<br />
                                    <div class="font-extrabold text-2xl md:text-2xl xl:text-2xl leading-10">
                                        From £95
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-full block p-8 xl:p-14 rounded-xl shadow-sm text-white bg-nin-green">
                            <div>
                                <span class="fa fa-desktop text-6xl text-white"></span>
                            </div>
                            <div class="mt-6">
                                <div class="text-xl lg:text-3xl font-semibold">
                                    Capture your data
                                </div>
                                <div class="mt-2 sm:mt-4 font-light">
                                    Visit our office with your documents on your appointment date to capture your biometrics
                                    and process your data during the scheduled appointment.
                                </div>
                            </div>
                        </div>

                        <div class="h-full block p-8 xl:p-14 rounded-xl shadow-sm bg-white">
                            <div>
                                <span class="fa fa-file text-6xl text-nin-green"></span>
                            </div>
                            <div class="mt-6">
                                <div class="text-xl lg:text-3xl font-semibold">
                                    Get your NIN Slip
                                </div>
                                <div class="mt-2 sm:mt-4 font-light">
                                    If you choose the option of NIN slip, you will collect it within 10 working days. If you
                                    opt for the NIN PVC Card, we will deliver the card to your specified address once the
                                    processing is completed.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="bg-img-under bg-spiral-under"></div>
        </div>




        <div id="why" class="md:pt-5 pb-20">

            <div class="container">
                <div class="md:flex md:space-x-8">
                    <div class="md:w-6/12 flex md:hidden mb-10 md:mb-0 rounded-xl overflow-hidden">
                        <img src=<?php echo e(asset('img/bgs/why-need-nin.jpeg')); ?> alt="nin" class="w-full my-auto relative" />
                    </div>
                    <div class="w-full md:w-6/12">
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-5xl leading-10">
                            Why do I need
                            <br>
                            an NIN ?
                        </div>
                        <div class="mt-12 space-y-8 md:mr-10">
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To avoid a travel ban
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To prevent international passport renewal denial
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To avoid voting restrictions
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To open and ward off your Nigerian bank account suspension
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To avert your Nigerian SIM card disconnection
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To avoid disruption of services to you from all Nigerian Embassies and Missions abroad
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <a href="<?php echo e(route('birthCertificateOptions')); ?>" class="btn btn-nin-green btn-lg">
                                Book Now
                            </a>
                        </div>
                        <div class="mt-6">
                            <span class="text-gray-500">
                                For More Information, Visit the
                            </span>
                            <a href="/#faqs" class="text-nin-green pl-1 hover:underline">FAQs Section</a>
                        </div>
                    </div>
                    <div class="md:w-6/12 hidden md:flex rounded-xl overflow-hidden">
                        <img src=<?php echo e(asset('img/bgs/why-need-nin.jpeg')); ?> alt="nin" class="w-full my-auto relative" />
                    </div>
                </div>
            </div>

            <div class="pt-10 container">
                <div class="md:flex md:space-x-8">
                    <div class="md:w-6/12 flex my-10 md:my-0 rounded-xl overflow-hidden">
                        <img src=<?php echo e(asset('img/bgs/nin-adv.png')); ?> alt="nin" class="my-auto" />
                    </div>
                    <div class="w-full md:w-6/12 md:mt-10">
                        <div class="text-3xl sm:text-4xl xl:text-5xl font-semibold font-boing text-ep-black">
                            What your NIN
                            <br>
                            is useful for
                        </div>
                        <div class="mt-12 space-y-4 md:mr-10">
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To identify as a Nigerian wherever you are
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To retain access to any necessary services from the Nigerian Government from anywhere
                                    you are
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To renew your Nigerian International Passport from where ever you are
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To register and enjoy access to your Nigerian SIM card
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To obtain a Nigerian Voters card
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To register for your drivers' license
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To use for all transactions requiring identity verification
                                </div>
                            </div>
                            <div class="flex space-x-2 text-lg">
                                <div class="flex-shrink-0 w-6">
                                    <span class="fa fa-check-circle text-lg mt-1"></span>
                                </div>
                                <div>
                                    To regulate your information across all agencies at home and abroad
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <a href="<?php echo e(route('birthCertificateOptions')); ?>" class="btn btn-nin-green btn-lg">
                                Book Now
                            </a>
                        </div>
                        <div class="mt-6">
                            <span class="text-gray-500">
                                For More Information, Visit the
                            </span>
                            <a href="/#faqs" class="text-nin-green pl-1 hover:underline">FAQs Section</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>




        <div class="relative bg-nin-green">
            <div class="relative z-10 container">
                <div
                    class="py-20 sm:py-32 px-6 md:px-12 max-w-5xl flex items-center text-center flex-col mx-auto text-white">
                    <div class="text-3xl md:text-4xl xl:text-5xl font-semibold">
                        Do you have issues
                        <br class="hidden xl:block" />
                        getting your NIN?
                    </div>
                    <div class="mt-5">
                        Look no further.
                        The Nigerian Government has authorized <a href="http://www.deacilprofessionals.com/"
                            class="underline whitespace-nowrap">Deacil Professional Services</a> to process your NIN
                        without stress and delays.
                        We have the necessary skills and equipment to undertake NIN registration for Nigerians residing in
                        the UK
                    </div>
                    <div class="flex space-x-4 mt-5">
                        <a href="<?php echo e(route('birthCertificateOptions')); ?>" class="btn text-black bg-white btn-lg shadow-lg">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-img-under bg-wavy"></div>
        </div>



        <?php echo $__env->make('common.faqs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




        <?php echo $__env->make('common.get-started', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    </div>
   

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/home.blade.php ENDPATH**/ ?>