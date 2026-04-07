<?php $__env->startSection('title'); ?>
    Book your Nigerian Tax Identification Number (TIN) Card
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div id="book" class="relative">
            <div class="container">
                <div class="max-w-4xl md:flex md:space-x-10 py-10 relative z-20 mx-auto">

                    
                    <div class="md:w-1/2 flex">
                        <div class="my-auto">
                            <div class="font-extrabold text-3xl md:text-4xl xl:text-5xl leading-10">
                                Book your Nigerian Tax Identification Number (TIN) Card
                                <div class="h-1"></div>
                                Just fill in your details.
                                <br />
                                <div class="font-extrabold text-2xl md:text-2xl xl:text-2xl leading-10 mt-2">
                                    <?php if(!is_null($tin)): ?>
                                        From £<?php echo e($tin->ourService->price); ?>

                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mt-6 md:leading-6 font-light opacity-70">
                                We assist you in applying for your official Nigerian Tax Identification Number (TIN) card
                                right here in the UK. This is a mandatory requirement for opening and operating business
                                accounts, official tax filings, and other major financial transactions in Nigeria.
                            </div>
                            <div class="mt-6 flex space-x-2">
                                <a href="#requirements" class="btn btn-transparent-black btn-lg">
                                    Check Required Documents
                                </a>
                            </div>
                        </div>
                    </div>

                    
                    <div class="mt-10 md:mt-0 md:w-1/2">
                        <div class="bg-white p-8 rounded-xl shadow-lg">
                            <form method="POST" action="<?php echo e(route('pre-checkout.store')); ?>">
                                <?php echo csrf_field(); ?>

                                
                                <div class="form-group">
                                    <label>
                                        Full Name
                                        <span class="form-input-required">*</span>
                                    </label>
                                    <input type="text" name="user_name" value="<?php echo e(old('user_name')); ?>"
                                        placeholder="John Doe" class="form-input" required />
                                </div>

                                
                                <div class="form-group">
                                    <label>
                                        Email Address
                                        <span class="form-input-required">*</span>
                                    </label>
                                    <input type="email" name="user_email" value="<?php echo e(old('user_email')); ?>"
                                        placeholder="email@example.com" class="form-input" required />
                                </div>

                                
                                <div class="form-group">
                                    <label>
                                        Phone Number
                                        <span class="form-input-required">*</span>
                                    </label>
                                    <input type="text" name="user_phone" value="<?php echo e(old('user_phone')); ?>"
                                        placeholder="+44 XX XXXX XXXX" class="form-input" required />
                                </div>
                                <input type="hidden" name="slug" value="<?php echo e($tin ? $tin->slug : ''); ?>" />
                                <input type="hidden" name="applying_for" value="myself" />

                                

                                
                                
                                

                                
                                <button type="submit" class="btn btn-lg btn-block btn-nin-green mt-8 font-semibold">
                                    Submit
                                    <span class="fa fa-check ml-2"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full h-full opacity-40 img-bg3 absolute inset-0 z-10"></div>
        </div>

        
        <div id="requirements">
            <?php echo $__env->make('common.tin-requirements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="relative bg-nin-green">
            <div class="relative z-10 container">
                <div
                    class="py-20 sm:py-32 px-6 md:px-12 max-w-5xl flex items-center text-center flex-col mx-auto text-white">
                    <div class="text-3xl md:text-4xl xl:text-5xl font-semibold font-recoleta">
                        Need help with your booking?
                    </div>
                    <div class="mt-5">
                        Are you experiencing any difficulty with placing your appointment booking?
                        We can help you book a time & date convenient for you. Click the button below to contact us.
                    </div>
                    <div class="flex space-x-4 mt-5">
                        <a href="/contact" class="btn text-black bg-white btn-lg shadow-lg">
                            Send us a message
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-img-under bg-wavy"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const applyingForSelect = document.getElementById('applying_for');
            const companyNameDiv = document.getElementById('company_name_div');
            const companyNameInput = document.getElementById('company_name');

            function toggleCompanyInput() {
                if (applyingForSelect.value === 'company') {
                    companyNameDiv.style.display = 'block';
                    companyNameInput.setAttribute('required', 'required');
                } else {
                    companyNameDiv.style.display = 'none';
                    companyNameInput.removeAttribute('required');
                    companyNameInput.value = ''; // Clear value when hidden
                }
            }

            // Listen for changes on the dropdown
            applyingForSelect.addEventListener('change', toggleCompanyInput);

            // Run the function on page load to handle form repopulation (e.g., after validation error)
            toggleCompanyInput();
        });
    </script>

    <script>
        $(function() {
            $("#appointmentDate").change(function(e) {
                e.preventDefault();
                let location_id = <?php echo e($tin->ourService->location_id); ?>

                let date = $(this).val();
                var t = new Date();
                var s = new Date(date);
                let today = t.getDate() + "-" + (t.getMonth() + 1) + "-" + t.getFullYear();
                let selectedDate = s.getDate() + "-" + (s.getMonth() + 1) + "-" + s.getFullYear();
                let $dropdown = $("#appointmentTime");
                $dropdown.empty();
                $dropdown.append($("<option />").text('-- Select Time --'));
                $.ajax({
                    type: "POST",
                    url: '/bookings/getAvailableTimeSlot',
                    data: {
                        date,
                        location_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        let availableTime = data['availableTime'];
                        if (data['status'] == false) {
                            toastr.error(data['error_message']);
                            $("#invalidSelectedDate").text(data['error_message']);
                            $("#invalidSelectedDate").show();
                        } else {
                            $("#invalidSelectedDate").hide();
                            for (i = 0; i < availableTime.length; ++i) {
                                var selectedTime = new Date(data['meta'] + " " + availableTime[
                                    i]['time']);
                                $dropdown.append($("<option />")
                                    .attr("disabled", (availableTime[i]['status'] ==
                                        false || (today == selectedDate && t.getTime() >
                                            selectedTime.getTime())))
                                    .val(availableTime[i]['time'])
                                    .text(availableTime[i]['time']));
                            }

                        }
                    },
                    error: function(data) {

                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/book/create-tin.blade.php ENDPATH**/ ?>