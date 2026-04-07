<?php $__env->startSection('title'); ?>
    <?php echo e($appointment->ref); ?> - Booking Confirmation
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div>

        <div class="bg-nin-green" style="height: 500px;"></div>


        <div id="printableArea" style="margin-top: -500px;">
            
                <div class="max-w-2xl mx-auto">
                    <div class="text-white text-center overflow-hidden">
                        <div class="mt-10 text-4xl font-bold">
                            Confirmation Of Reservation
                        </div>
                        <div class="mt-1">
                            <?php if($appointment->status === \App\Models\Appointment::TOPAYONCAPTURE): ?>
                                <?php if($appointment->serviceType->slug === $appointment->serviceType::BVN || 
                                    $appointment->serviceType->slug === $appointment->serviceType::BVN_PERSONAL_BANK_ACCOUNT 
                                    || $appointment->serviceType->slug === $appointment->serviceType::BVN_CORPORATE_BANK_ACCOUNT): ?>
                                    Your are to pay when you come for capture. </br>
                                    Remember to come with your reference number <b>#<?php echo e($appointment->ref); ?></b>
                                    and bring along any of the document below:</br>
                                    - <b>Nigerian international passport </b> </br>
                                    - <b>Nigerian NIN Verification Slip</b> </br>
                                    An email will be sent shortly, to confirm your appointment booking.</br> 
                                    Come with the email for your BVN capture </br>
                                <?php endif; ?>
                                <?php if($appointment->serviceType->slug === $appointment->serviceType::BANK_ACCOUNT || 
                                    $appointment->serviceType->slug === $appointment->serviceType::BVN_PERSONAL_BANK_ACCOUNT 
                                    || $appointment->serviceType->slug === $appointment->serviceType::BVN_CORPORATE_BANK_ACCOUNT): ?>
                                    Your are to pay when you come to fill your bank account opening form. </br>
                                    Remember to come with your reference number <b>#<?php echo e($appointment->ref); ?></b>
                                    and bring along all of the documents below:</br>
                                    - <b>Your BVN No </b> </br>
                                    - <b>Nigerian NIN Verification Slip</b> </br>
                                    An email will be sent shortly, to confirm your appointment booking.</br> 
                                    Come with the email for your Bank account opening.
                                <?php endif; ?>
                                <?php if($appointment->serviceType->slug === $appointment->serviceType::PASSPORT_5_YEARS || 
                                    $appointment->serviceType->slug === $appointment->serviceType::PASSPORT_10_YEARS ): ?>
                                        Your are to pay when you come to fill your Passport application form. </br>
                                        Remember to come with your reference number <b>#<?php echo e($appointment->ref); ?></b>
                                        and bring along all of the documents below:</br>
                                        - <b>Nigerian international Passport Data Page </b> </br>
                                        - <b>Nigerian NIN Verification Slip</b> </br>
                                        - <b>Passport photo</b> </br>
                                        - <b>Current Signature</b> </br>
                                        An email will be sent shortly, to confirm your appointment booking.</br> 
                                        Come with the email for your Passport Appplication.
                                <?php endif; ?>
                                <?php if($appointment->serviceType->slug === $appointment->serviceType::NIN): ?>
                                    Your are to pay when you come for capture. </br>
                                    Remember to come with your reference number <b>#<?php echo e($appointment->ref); ?></b>
                                    and bring along your <b>BVN No</b> if you have one.<br/>
                                    An email will be sent shortly, to confirm your appointment booking. Come with the email for your NIN capture
                                <?php endif; ?>

                            <?php else: ?>
                                Your payment was successful and your appointment with reference number <b>#<?php echo e($appointment->ref); ?></b> has been booked.
                                An email will be sent shortly, to confirm your appointment booking.
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="max-w-2xl mx-auto">
                    
                    <div class="mt-10 mb-20 bg-white rounded-lg shadow-lg">
                        <?php echo csrf_field(); ?>
                        <?php echo $__env->make('common.error-and-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="text-center text-2xl font-bold p-6">
                            Ref No: <?php echo e($appointment->ref); ?>

                        </div>
                        <div class="text-center">
                            You need the above Ref No in all communication regarding this service.
                        </div>
                        <div class="border-t overflow-auto">


                            <div class="section">
                                <div>
                                    <div>
                                        1
                                    </div>
                                </div>
                                <div>
                                    User Info
                                </div>
                            </div>

                            <div class="my-10 space-y-6">
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-user text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Full Name
                                        </div>
                                        <div class="text-lg font-bold">
                                            <?php echo e($appointment->user_name); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-at text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Email Address
                                        </div>
                                        <div class="text-lg font-bold">
                                            <?php echo e($appointment->user_email); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-phone text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Phone Number
                                        </div>
                                        <div class="text-lg font-bold">
                                            <?php echo e($appointment->user_phone); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="section mt-10">
                                <div>
                                    <div>
                                        2
                                    </div>
                                </div>
                                <div>
                                    Application Info
                                </div>
                            </div>
                            
                            <div class="my-10 space-y-6">
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-calendar text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Service Type Selected
                                        </div>
                                        <div class="text-lg font-bold">
                                            <?php echo e($appointment->serviceType->name); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php if($appointment->details ? json_decode($appointment->details)->is_booking_appointment : true): ?>
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-calendar text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Appointment Date
                                        </div>
                                        <div class="text-lg font-bold">
                                            <?php echo e($appointment->date->format("M d, Y h:i A")); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-clock text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Appointment Time
                                        </div>
                                        <div class="text-lg font-bold">
                                            <?php echo e(date('h:i A', strtotime($appointment->start_time))); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="flex mx-20">
                                    <div class="w-10 flex-shrink-0">
                                        <span class="fa fa-clock-o text-2xl"></span>
                                    </div>
                                    <div>
                                        <div>
                                            Appointment Duration
                                        </div>
                                        <div class="text-lg font-bold">
                                            <?php echo e($appointment->duration); ?> mins
                                        </div>
                                    </div>
                                </div>
                               <?php endif; ?>
                                    <div class="flex mx-20">
                                        <div class="w-10 flex-shrink-0">
                                            <span class="fa fa-map-marker text-2xl"></span>
                                        </div>
                                        <div>
                                            <div>
                                                Our Address and Contact
                                            </div>
                                            <div class="text-lg font-bold">
                                                <?php echo e($appointment->location->location_name); ?> <br/>
                                                <?php echo e($appointment->location->location_address); ?> <br/>
                                                Phone: <?php echo e($appointment->location->contact_phone); ?> <br/>
                                                Email: <?php echo e($appointment->location->contact_email); ?> <br/>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($appointment->serviceType->slug != $appointment->serviceType::PASSPORT_5_YEARS & 
                                        $appointment->serviceType->slug != $appointment->serviceType::PASSPORT_10_YEARS ): ?>           
                                        <div class="flex mx-20">
                                            <div class="w-10 flex-shrink-0">
                                                <span class="fa fa-clock-o text-2xl"></span>
                                            </div>
                                            <div>
                                            
                                                <div class="text-lg font-bold">
                                                    <?php echo e($appointment->card_type === $appointment::CARD_TYPE_PRINT_OUT ? 'print out' : ''); ?> 
                                                    <?php echo e($appointment->card_type === $appointment::CARD_TYPE_PVC ? 'PVC' : ''); ?> 
                                                </div>
                                            </div>
                                        </div>

                                        <?php if($appointment->card_type === $appointment::CARD_TYPE_PVC): ?>
                                            <div class="flex mx-20">
                                                <div class="w-10 flex-shrink-0">
                                                    <span class="fa fa-clock-o text-2xl"></span>
                                                </div>
                                                <div>
                                                    <div>
                                                        Your NIN PVC will be printed and delivered to your below address
                                                    </div>
                                                    <div class="text-lg font-bold">
                                                        <?php echo e($appointment->delivery_address); ?>, <?php echo e($appointment->postal_code); ?>  
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                            </div>
                            


                            <div class="section mt-10">
                                <div>
                                    <div>
                                        3
                                    </div>
                                </div>
                                <div>
                                    Payment Info
                                </div>
                            </div>
                            
                            <div class="my-10 space-y-6">
                                <?php if($appointment->serviceType->slug === $appointment->serviceType::PASSPORT_5_YEARS || 
                                        $appointment->serviceType->slug === $appointment->serviceType::PASSPORT_10_YEARS ): ?> 
                                    <div class="flex mx-20">
                                        <div class="w-10 flex-shrink-0">
                                            <span class="fa fa-money text-2xl"></span>
                                        </div>
                                        <div>
                                            <div>
                                                Charges Apply
                                            </div>
                                            <div class="text-lg font-bold">
                                                Application charges will be communicated to you shortly
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="flex mx-20">
                                        <div class="w-10 flex-shrink-0">
                                            <span class="fa fa-money text-2xl"></span>
                                        </div>
                                        <div>
                                            <div>
                                                Subtotal
                                            </div>
                                            <div class="text-lg font-bold">
                                                £ <?php echo e($appointment->delivery_cost ? $appointment->amount - $appointment->delivery_cost : $appointment->amount); ?>

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php if($appointment->card_type === \App\Models\Appointment::CARD_TYPE_PVC): ?>
                                        <div class="flex mx-20">
                                            <div class="w-10 flex-shrink-0">
                                                <span class="fa fa-money text-2xl"></span>
                                            </div>
                                            <div>
                                                <div>
                                                    PVC Card & Delivery Fee
                                                </div>
                                                <div class="text-lg font-bold">
                                                    £ <?php echo e($appointment->delivery_cost); ?>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="flex mx-20">
                                        <div class="w-10 flex-shrink-0">
                                            <span class="fa fa-money text-2xl"></span>
                                        </div>
                                        <div>
                                            <div>
                                                Total
                                            </div>
                                            <div class="text-lg font-bold">
                                                £ <?php echo e($appointment->amount); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="border-t pt-8">

                                    <button type="submit" onclick="printDiv('printableArea')" class="mx-auto btn btn-lg btn-nin-orange font-bold">
                                        Print This
                                    </button>
                                    
                                    

                                </div>

                            </div>
                            


                        </div>

                    </div>
                </div>

        </div>

        

    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1573680.cloudwaysapps.com/sttbuemfvw/public_html/resources/views/book/invoice.blade.php ENDPATH**/ ?>