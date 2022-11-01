@if ($data->status == 1)
    <h3>Stowaa - Ecommerce Platfrom</h3>
    <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
        <div class="card text-white bg-primary">
            <p> Your Accout Approve By Admin! </p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Name :</span><strong>{{ $data['name'] }}</strong></li>
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">E-mail :</span><strong>{{ $data['email'] }} </strong></li>
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Time/Date :</span><strong>{{\Carbon\Carbon::now()->diffForHumans()}}</strong></li>
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Massage :</span><strong>Log-in your Dashboard and Enjoy our Shop,Thank You</strong></li>
            </ul>
        </div>
    </div>
    @else
    <h3>Stowaa - Ecommerce Platfrom</h3>
    <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
        <div class="card text-white bg-primary">
            <p> Your Accout Rejected By Admin! </p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Name :</span><strong>{{ $data['name'] }}</strong></li>
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">E-mail :</span><strong>{{ $data['email'] }} </strong></li>
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Time/Date  :</span><strong>{{\Carbon\Carbon::now()->diffForHumans()}}</strong></li>
                <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Massage :</span><strong>Please Contact With Admin,Thank You</strong></li>
            </ul>
        </div>
    </div>

@endif
