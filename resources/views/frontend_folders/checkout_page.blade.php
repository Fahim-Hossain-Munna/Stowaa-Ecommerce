@extends('layouts.frontend_master')

@section('content')

<div class="container">
    <form action="{{ route('payment') }}" method="POST">
        @csrf
    <div class="row mt-5 mb-5 bg-secondary text-white p-5">
            <div class="col-8">
                <h2 class="text-warning">Billing Details</h2>
                {{-- <form class="row g-3"> --}}
                    <div class="row g-3">
                    <div class="col-md-6">
                      <label for="inputEmail4" class="form-label">Username</label>
                      <input type="text" class="form-control" id="inputEmail4" value="{{ auth()->user()->name }}" name='customer_name'>
                    </div>
                    <div class="col-md-6">
                      <label for="inputEmail4" class="form-label">Email Address</label>
                      <input type="email" class="form-control" id="inputEmail4" value="{{ auth()->user()->email }}" name='customer_email'>
                    </div>
                    <div class="col-md-12">
                      <label for="inputPassword4" class="form-label">Phone Number</label>
                      <input type="tel" class="form-control" id="inputPassword4" name='customer_contact_number'>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Country</label>
                        <select id="inputcountrydropdown" class="form-select" name='customer_country_code'>
                          <option selected>Choose Any Country...</option>
                          @foreach ($all_countries as $country)
                          <option value="{{ $country->code  }}">{{ $country->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    <div class="col-md-6">
                      <label for="inputState" class="form-label">City</label>
                      <select id="inputcitydropdown" class="form-select" name='customer_city_code'>
                        <option selected>Choose country First...</option>
                        <option>...</option>
                      </select>
                    </div>
                    {{-- <div class="col-md-2">
                      <label for="inputZip" class="form-label">Zip</label>
                      <input type="text" class="form-control" id="inputZip">
                    </div> --}}
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <textarea class="form-control" rows="3" name='customer_address'></textarea>
                      </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Order Notes</label>
                        <textarea class="form-control" rows="3" name='customer_remark'></textarea>
                      </div>
                </div>
                  {{-- </form> --}}
            </div>
            <div class="col-4">
                <h2 class="text-warning pb-4">Your order</h2>
                <table class="table text-white table-dark table-striped">
                    <thead>
                      <tr>
                        <td >Subtotal</td>
                        <td ></td>
                        <td >${{ session('subtotal') }}</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row">Discount(-)</td>
                        <td scope="row"></td>
                        <td>
                            ${{ session('how_much_discount') }}
                        </td>
                      </tr>
                      <tr>
                        <td scope="row">Delivery Charge(+)</td>
                        <td scope="row"></td>
                        <td>${{ session('shipping_charge') }}</td>
                      </tr>
                      <tr>
                        <th class='text-warning' scope="row">Total</th>
                        <td scope="row"></td>
                        <th class='text-warning' colspan="2">
                            @if (session('after_discount') == 0)
                                ${{ session('subtotal')+session('shipping_charge') }}
                            @else
                                ${{ session('after_discount')+session('shipping_charge') }}
                            @endif
                        </th>
                      </tr>
                    </tbody>
                  </table>
                  <div class="col-12 mb-5">
                    <legend class="text-warning"> Payment System </legend>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="payment_method" value="Cash On Delivery">
                        <label class="form-check-label" for="flexCheckDefault">
                            Cash On Delivery
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="payment_method" value="Online Payment">
                        <label class="form-check-label" for="flexCheckChecked">
                            SSL Commerz
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="payment_method" value="Atm or MasterCard">
                        <label class="form-check-label" for="flexCheckChecked">
                            ATM/MasterCard
                        </label>
                      </div>
                      <a target="_blank" href="https://www.sslcommerz.com/" title="SSLCommerz" alt="SSLCommerz"><img style="width:300px;height:auto;" src="https://securepay.sslcommerz.com/public/image/SSLCommerz-Pay-With-logo-All-Size-03.png" /></a>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-warning text-dark">Place Order</button>
                </div>
            </div>
    </div>
    </form>
</div>


@endsection


@section('footer_script')
    <script>
        $(document).ready(function(){
            $('#inputcountrydropdown').change(function(){
                var country_code = $(this).val();
                if(!country_code){
                    alert("Please select country first");
                    $( "#inputcitydropdown" ).html("");
                }else{
                     // ajax start
                     $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type:'POST',
                        url:'/getcitylist',
                        data: {country_code: country_code},
                        success: function (data) {
                            $( "#inputcitydropdown" ).html(data);
                        }
                    });
                    // ajax end
                }
            });
        });
    </script>
@endsection
