<div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                Add Coupon Information
            </div>
            <div class="card-body">

                    <form wire:submit.prevent="coupon_genarate" class="mb-3">
                       @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Coupon Name</label>
                                <input type="text" class="form-control"  wire:model="coupon_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Minimum Shopping Amount</label>
                                <input type="text" class="form-control"  wire:model="coupon_min_amount">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Discount Type</label>
                                <select wire:model='discount_type' class="form-select">
                                    <option data-display="- Please select -">Choose A Option</option>
                                    <option value="Flat Discount">Flat Discount</option>
                                    <option value="Percentice Discount">Percentice Discount(%)</option>

                                </select>
                            </div>

                            <div class="{{ $visibility }} col-md-6">
                                <div class="form-group">
                                    <label>Coupon Value</label>
                                    <input type="text" class="form-control"  wire:model="coupon_value">
                                </div>
                            </div>
                            {{-- <div class="form-group col-md-12">
                                <label></label>
                                <textarea class="form-control" name="service_description"></textarea>
                            </div> --}}

                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </form>

                    <div class="table-responsive mt-5" >
                        <table class="table table-responsive-md table-bordered ">
                            <thead>
                                <tr>
                                    <th>ID NO.</th>
                                    <th>Coupon Name</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($coupons as $coupon)
                                 <tr>
                                     <td>{{ $loop->index +1 }}</td>
                                     <td>{{ $coupon->coupon_name }}</td>
                                     <td>
                                        {{-- <form action="{{ route('products.destroy',$size->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE') --}}
                                            <button type="submit" class="btn btn-danger shadow btn-sm sharp " wire:click='deleteCoupon({{ $coupon->id }})'>Delete</button>
                                        {{-- </form> --}}
                                     </td>
                                 </tr>
                               @empty

                               <tr>
                                  <td colspan="50" class="text-danger text-center"> No Data Found</td>
                               </tr>
                               @endforelse
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </div>

</div>
