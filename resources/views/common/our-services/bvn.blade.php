
<div>
    <b> Select BVN Output Type:</b>
</div>
<div class="mt-2 flex md:block lg:flex justify-between space-x-4 md:space-x-0 lg:space-x-6">
    <div class="w-1/2 md:w-full lg:w-1/2 form-group">
        <label class="h-full p-4 block rounded-xl cursor-pointer relative" style="border: 2px solid #ddd;">
            <span class="fa fa-check-circle absolute -top-3 -right-3 text-3xl text-nin-green bg-white invisible"></span>
            <div>

                <div class="text-lg font-bold leading-6">
                    I want
                    <br class="block md:hidden lg:block">
                    BVN Card <div class="font-bold">&#163;<span class="bvnCardPriceOnly"></span> + <b>£<span
                                class="bvnCapturePriceOnly"></span></b></div>
                </div>
                <div class="card-mini-text text-xs mt-2 sm:mt-1">
                    A plastic ID card containing your info will be issued
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
                    the paper <b>
                        <div class="font-bold">(Free)</span> + <b>£<span class="bvnCapturePriceOnly"></span></b>
                        </div>
                    </b>
                </div>
                <div class="card-mini-text text-xs mt-2 sm:mt-1">
                    A paper print-out containing your info will be issued
                </div>
            </div>
            <input type="radio" name="card_type" value="Print Out" class="hidden" onchange="selectCardType()">
        </label>
    </div>
</div>


<div class="card-type-pvc hidden">
    <div class="h-32 mb-4">
        <img src={{asset('img/bgs/bvn-card.jpeg')}} alt="nin-card" class="w-full h-full object-contain" />
    </div>

    <div class="form-group">
        <label>
            Postal Code
        </label>
        <input type="text" id="postal_code" name="postal_code[{{ $serviceType->slug }}]" value="{{old('postal_code')}}"  class="form-input"/>
    </div>
    <div class="form-group">
        <label>
            Delivery Address
        </label>
        <textarea class="form-input" name="delivery_address[{{ $serviceType->slug }}]" id="delivery_address" style="height: 50px;">{{old('delivery_address')}}</textarea>
    </div>
    <div style="align-items: center;"><span class="text-lg font-bold leading-6">
        BVN PVC Card: <b>£<span class="bvnCardPriceOnly"></span></b><br/>
        BVN Capture Fee: <b>£<span class="bvnCapturePriceOnly"></span></b><br/>
        Total to pay: <b>£<span class="bvnCardPriceTotal"></span></b>
    </div>
</div>

<div class="card-type-paper hidden">
    <div class="h-44 mb-4">
        <img src={{asset('img/bgs/bvn-printout.jpg')}} alt="nin-card" class="w-full h-full object-contain" />
    </div>
    <div style="align-items: center;"><span class="text-lg font-bold leading-6">
        Paper Printout: <b>Free</b><br/>
        BVN Capture Fee: <b>£<span class="bvnCapturePriceOnly"></span></b><br/>
        Total to pay: <b>£<span class="bvnCapturePriceOnly"></span></b>
    </div>
</div>

  







