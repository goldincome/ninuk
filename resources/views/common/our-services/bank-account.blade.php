
<div>
    <b> Select Bank Account Type:</b>
</div>
<div class="mt-2 flex md:block lg:flex justify-between space-x-4 md:space-x-0 lg:space-x-6">
    <div class="w-1/2 md:w-full lg:w-1/2 form-group">
        <label class="h-full p-4 block rounded-xl cursor-pointer relative" style="border: 2px solid #ddd;">
            <span class="fa fa-check-circle absolute -top-3 -right-3 text-3xl text-nin-green bg-white invisible"></span>
            <div>

                <div class="text-lg font-bold leading-6">
                    I want
                    <br class="block md:hidden lg:block">
                    Corporate Bank Account <div class="font-bold">&#163;<span class="bank-accountCardPriceOnly"></span> + <b>£<span
                                class="bank-accountCapturePriceOnly"></span></b></div>
                </div>
                <div class="card-mini-text text-xs mt-2 sm:mt-1">
                    A Corporate bank account will be opened
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
                    Personal Bank Account <b>
                        <div class="font-bold">(Free)</span> + <b>£<span class="bank-accountCapturePriceOnly"></span></b>
                        </div>
                    </b>
                </div>
                <div class="card-mini-text text-xs mt-2 sm:mt-1">
                    A Personal bank account will be opened
                </div>
            </div>
            <input type="radio" name="card_type" value="Print Out" class="hidden" onchange="selectCardType()">
        </label>
    </div>
</div>



<div class="card-type-pvc hidden">
    <div class="h-32 mb-4">
        <img src={{asset('img/bgs/corporate-bank-account.png')}} alt="nin-card" class="w-full h-full object-contain" />
    </div>
    <div style="align-items: center;"><span class="text-lg font-bold leading-6">
        BVN PVC Card: <b>£<span class="bank-accountCardPriceOnly"></span></b><br/>
        BVN Capture Fee: <b>£<span class="bank-accountCapturePriceOnly"></span></b><br/>
        Total to pay: <b>£<span class="bank-accountCardPriceTotal"></span></b>
    </div>
</div>

<div class="card-type-paper hidden">
    <div class="h-44 mb-4">
        <img src={{asset('img/bgs/personal-bank-account.png')}} alt="nin-card" class="w-full h-full object-contain" />
    </div>
    <div style="align-items: center;"><span class="text-lg font-bold leading-6">
        Paper Printout: <b>Free</b><br/>
        BVN Capture Fee: <b>£<span class="bank-accountCapturePriceOnly"></span></b><br/>
        Total to pay: <b>£<span class="bank-accountCapturePriceOnly"></span></b>
    </div>
</div>

  







