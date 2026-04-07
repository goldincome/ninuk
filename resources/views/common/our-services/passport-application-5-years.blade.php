<div>
    <b> Select Processing Option:</b>
</div>
<div class="mt-2 flex md:block lg:flex justify-between space-x-4 md:space-x-0 lg:space-x-6">
    <div class="w-1/2 md:w-full lg:w-1/2 form-group">
        <label class="h-full p-4 block rounded-xl cursor-pointer relative" style="border: 2px solid #ddd;">
            <span class="fa fa-check-circle absolute -top-3 -right-3 text-3xl text-nin-green bg-white invisible"></span>
            <div>

                <div class="text-lg font-bold leading-6">
                    I want
                    <br class="block md:hidden lg:block">
                    Fast Track Application {{--  <div class="font-bold">&#163;<span class="passport-application-5-yearsCardPriceOnly"></span> + <b>£<span
                                class="passport-application-5-yearsCapturePriceOnly"></span></b></div> --}}
                </div>
                <div class="card-mini-text text-xs mt-2 sm:mt-1">
                    Your Passport will be processed faster
                </div>
            </div>
            <input type="radio" name="card_type" value="PVC" class="hidden" onchange="selectCardType()">
        </label>
    </div>
    <div class="w-1/2 md:w-full lg:w-1/2 form-group">
        <label class="h-full p-4 block rounded-xl cursor-pointer relative" style="border: 2px solid #ddd;">
            <span class="fa fa-check-circle absolute -top-3 -right-3 text-3xl text-nin-green bg-white invisible"></span>
            <div>
                <div class="text-lg font-bold leading-6">
                    I want
                    <br class="block md:hidden lg:block">
                    Normal Application  <b>
                       {{--  <div class="font-bold">(Free)</span> + <b>£<span class="passport-application-5-yearsCapturePriceOnly"></span></b>
                        </div> --}}
                    </b>
                </div>
                <div class="card-mini-text text-xs mt-2 sm:mt-1">
                    Your Passport will go through the normal processing timeline.
                </div>
            </div>
            <input type="radio" name="card_type" value="Print Out" class="hidden" onchange="selectCardType()">
        </label>
    </div>
</div>


<div class="card-type-pvc hidden">
    <div class="h-32 mb-4">
        <img src={{asset('img/bgs/nigerian-passport-min.png')}} alt="nigerian-passport" class="w-full h-full object-contain" />
    </div>
    <div style="align-items: center;"><span class="text-lg font-bold leading-6">
        Your have chosen Fast Track 5-Years Passport Application processing</br>
        Charges applies</br></br>
        {{--
            BVN PVC Card: <b>£<span class="passport-application-5-yearsCardPriceOnly"></span></b><br/>
            BVN Capture Fee: <b>£<span class="passport-application-5-yearsCapturePriceOnly"></span></b><br/>
            Total to pay: <b>£<span class="passport-application-5-yearsCardPriceTotal"></span></b>
        --}}
    </div>
</div>

<div class="card-type-paper hidden">
    <div class="h-44 mb-4">
        <img src={{asset('img/bgs/nigerian-passport-min.png')}} alt="nigerian-passport" class="w-full h-full object-contain" />
    </div>
    <div style="align-items: center;"><span class="text-lg font-bold leading-6">
        Your have chosen Normal 5-Years Passport Application processing</br>
        Charges applies</br></br>
       {{-- 
            Paper Printout: <b>Free</b><br/>
            BVN Capture Fee: <b>£<span class="passport-application-5-yearsCapturePriceOnly"></span></b><br/>
            Total to pay: <b>£<span class="passport-application-5-yearsCapturePriceOnly"></span></b>
        --}}
    </div>
</div>

  







