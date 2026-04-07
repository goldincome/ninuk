<?php $__env->startSection('title'); ?>
    Process your Nigerian Passport Application in UK
<?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?>
    Apply for nigerian passport in UK for Nigerians in diaspora.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function() {

            $(".faq-bvn-question").click(function() {
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
            <div class="container md:flex md:space-x-10 py-10 relative z-20">

                <div class="md:w-1/2 flex">
                    <div class="my-auto pt-8 pb-5">
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-5xl leading-10">
                            We assist you to process/renew your Nigerian Passport Application

                            right here in the UK
                        </div>

                        <div class="mt-6 md:leading-6 font-light opacity-70">
                            Are you a Nigerian residing in the UK?</br>
                            Do you need to process/renew your Nigerian Passport?</br>
                            We provide Nigerian passport application service ( Making it hassle free for you).</br>
                            Book an appointment with us today.
                        </div>
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-3xl leading-10">

                        </div>
                        <div class="mt-6 flex space-x-2">
                            <a href="<?php echo e(route('bookings.index')); ?>" class="btn btn-nin-green btn-lg">
                                Book Appointment Now
                            </a>

                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 hidden md:block">
                    <div class="flex justify-end" style="height: 500px">
                        <img src=<?php echo e(asset('img/bgs/nigerian-passport-application.png')); ?> alt="logo"
                            class="h-full object-contain" />
                    </div>
                </div>

            </div>

            <div class="w-full h-full opacity-40 img-bg3 absolute inset-0 z-10"></div>
        </div>




        <div>
            <?php echo $__env->make('common.wavy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="transform rotate-180 bg-white">
                <?php echo $__env->make('common.wavy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>



        <?php echo $__env->make('common.passport-requirements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        <div id="how" class="py-20 relative">
            <div class="relative z-10 container">
                <div>

                    <div class="mb-16">
                        <div class="font-extrabold text-3xl md:text-4xl xl:text-5xl leading-10">
                            How it works
                        </div>
                        <div class="mt-2 text-lg">
                            The process of obtaining your Nigerian Passport is seamless. It goes through the steps
                            highlighted below
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
                                    Contact us and schedule a convenient date, and time for your appointment.<br />
                                    <div class="font-extrabold text-2xl md:text-2xl xl:text-2xl leading-10">

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
                                    Visit our office with your documents on your appointment date to be assisted with your
                                    passport application.
                                </div>
                            </div>
                        </div>

                        <div class="h-full block p-8 xl:p-14 rounded-xl shadow-sm bg-white">
                            <div>
                                <span class="fa fa-file text-6xl text-nin-green"></span>
                            </div>
                            <div class="mt-6">
                                <div class="text-xl lg:text-3xl font-semibold">
                                    Choose Application Options
                                </div>
                                <div class="mt-2 sm:mt-4 font-light">
                                    You can choose FastTrack or normal option application process.

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="bg-img-under bg-spiral-under"></div>
        </div>









        <div class="relative bg-nin-green">
            <div class="relative z-10 container">
                <div
                    class="py-20 sm:py-32 px-6 md:px-12 max-w-5xl flex items-center text-center flex-col mx-auto text-white">
                    <div class="text-3xl md:text-4xl xl:text-5xl font-semibold">
                        Do you have issues
                        <br class="hidden xl:block" />
                        getting your Nigerian Passport?
                    </div>
                    <div class="mt-5">
                        Look no further.
                        We have the necessary skills to help and assist with your Nigerian Passport Application/Renewal.
                    </div>
                    <div class="flex space-x-4 mt-5">
                        <a href="<?php echo e(route('bookings.index')); ?>" class="btn text-black bg-white btn-lg shadow-lg">
                            Book Appointment Now!
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-img-under bg-wavy"></div>
        </div>

        

        <!-- Get Started Section -->
        <div>
            <div class="mt-10 -mb-36 md:-mb-56 relative z-10">
                <div class="container">
                    <div class="max-w-4xl mx-auto">
                        <div
                            class="py-10 md:py-20 mx-auto bg-color-red flex bg-map-red bg-nin-green rounded-xl overflow-hidden">
                            <div class="m-auto">
                                <div
                                    class="px-4 whitespace-normal mt-4 text-white text-center text-2xl sm:text-3xl md:text-4xl font-semibold xl:leading-7">
                                    Getting your Nigerian Passport application in UK is Easy
                                </div>
                                <div class="flex px-4 mt-3 sm:mt-6 xl:mt-10">
                                    <div class="m-auto flex space-x-2 md:space-x-4">
                                        <a href="<?php echo e(route('bookings.index')); ?>" class="btn text-black bg-white btn-lg shadow-lg">
                                            <span class="fa fa-calendar mr-2"></span>
                                            Book Appointment Now!
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center mt-2">
                                    <a href="<?php echo e(route('contactUs')); ?>" class="text-white hover:underline">Contact us for further
                                        assistance</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-36 md:h-56 bg-black"></div>
        </div>
        <!-- End Get Started Section -->

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/nigerian-passport.blade.php ENDPATH**/ ?>