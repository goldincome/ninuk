<div class="payment-method payment-option p-4 rounded-lg cursor-pointer flex items-center justify-between"
     data-method="{{ $payMethod->value}}" onclick="selectPayment('bank')">
     <input type="radio" name="payment_method" value="{{ $payMethod->value}}" class="sr-only" 
     style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0,0,0,0); border: 0;" onclick="selectPayment('offline')" />
<div>
        <h3 class="font-semibold text-blue-800">Pay At Our Office</h3>
        <p class="text-sm text-gray-600">Pay through POS in our office.</p>
    </div>

 </div>
