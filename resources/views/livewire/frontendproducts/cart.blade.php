<div>

    <div class="item_attribute">

        <div class="row">
            <div class="col col-md-6">
                <div class="select_option clearfix">
                    <h4 class="input_title">Size *</h4>

                    <select wire:model='size_dropdown' class="form-select">
                        <option data-display="- Please select -">Choose A Option</option>
                       @forelse ($sizes as $size)
                         <option value="{{ $size->VariationSizeTableRelation->id }}">{{ $size->VariationSizeTableRelation->size_name }}</option>
                         @empty
                         <option value="">Coming Soon</option>
                       @endforelse
                    </select>
                </div>
            </div>
            <div class="col col-md-6">
                <div class="select_option clearfix">
                    <h4 class="input_title">Color *</h4>
                    <select class="form-select" wire:model = 'color_dropdown'>
                        <option data-display="- Please select -">Choose A Option</option>
                       @if ($colors)
                         @forelse ($colors as $color)
                             <option value="{{ $color->id }}">{{ $color->VariationColorTableRelation->color_name }}</option>
                             @empty
                             <option value="">Coming Soon</option>
                         @endforelse
                       @endif

                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="{{ $visibility }}">
        <div class="hello">

               <div class="class">
                <button type="button" style="height: 35px; width:50px; text-align:center; border:1px solid black"  wire:click="decrement">
                    <i class="fal fa-minus"></i>
                </button>
                <input style="height: 35px; width:50px; text-align:center;" type="text" value="{{ $count }}">
                <button type="button" style="height: 35px; width:50px; text-align:center; border:1px solid black"  wire:click="increment">
                    <i class="fal fa-plus"></i>
                </button>
               </div>

               @if ($total_price == 0)
               <div class="total_price mt-2">Total: ৳ {{ $unit_price }}</div>
               @else
               <div class="total_price mt-2">Total: ৳ {{ $total_price }}</div>
               @endif

        </div>
        <div class="total_price mt-3"><h5>Total Stock: {{ $available_stock }}</h5></div>
    </div>

    @auth
        <ul class="default_btns_group ul_li mt-4">
            <li><a class="btn btn_primary addtocart_btn" wire:click="submittocart">Add To Cart</a></li>
        </ul>
        @else
        <ul class="default_btns_group ul_li mt-4">
            <li><a class="btn btn_primary addtocart_btn" href="#!" id="login_plz">Add To Cart</a></li>
        </ul>

    @endauth

</div>

@section('footer_script')

<script>
    $(document).ready(function(){
        $("#login_plz").click(function(){
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You Are Not Login Yet,',
                    footer: '<a href="{{ route('customer.login.register') }}">Login Here?</a>'
                    })
        })
    });
</script>

@endsection
