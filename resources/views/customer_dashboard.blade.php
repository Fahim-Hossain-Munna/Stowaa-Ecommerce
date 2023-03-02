@extends('layouts.frontend_master')

@section('content')

  <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="{{ route('customer.home') }}">Home</a></li>
                        <li>My Account</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- account_section - start
            ================================================== -->
            <section class="account_section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 account_menu">
                            <div class="nav account_menu_list flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link text-start active w-100" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Account Dashboard </button>
                                <button class="nav-link text-start w-100" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Acount</button>
                                <button class="nav-link text-start w-100" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">My Orders</button>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content bg-light p-3" id="v-pills-tabContent">
                                <div class="tab-pane fade show active text-center" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <h5>Welcome to Account ({{ auth()->user()->name }})</h5>
                                    <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Logout</button>
                                </form>
                                <div class="row">
                                    <div class="col-sm-12 mt-5">
                                        <div class="card">
                                            <div class="card-body">
                                               <div class="row">
                                                <div class="col-sm-3">
                                                    <p>Total Order</p>
                                                    <h3>{{ $totalOders->count() }}</h3>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p>Total Order Money</p>
                                                    <h3>{{ $totalOders->sum('product_round_final_total') }}</h3>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p>Total Paid Amount</p>
                                                    <h3>{{ $totalOders->where('payment_status','paid')->sum('product_round_final_total') }}</h3>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p>Total Unpaid Amount</p>
                                                    <h3>{{ $totalOders->where('payment_status','unpaid')->sum('product_round_final_total') }}</h3>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p>Total Cash On Delivery</p>
                                                    <h3>{{ $totalOders->where('payment_method','Cash On Delivery')->count() }}</h3>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p>Total Online Payment</p>
                                                    <h3>{{ $totalOders->where('payment_method','Online Payment')->count() }}</h3>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col-sm-6">
                                                        <canvas id="myChart"></canvas>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <canvas id="myNewpie"></canvas>
                                                    </div>
                                                </div>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <h5 class="text-center pb-3">Account Details</h5>
                                    <form class="row g-3 p-2" action="" method="POST">
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="inputnamel4" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="inputnamel4" value="{{ auth()->user()->name }}" name="name">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmail4" value="{{ auth()->user()->email }}" name="email">
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <label for="inputPassword4" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="inputPassword4">
                                        </div> --}}
                                        {{-- <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary active">Update</button>
                                        </div> --}}
                                     </form>
                                    </div>

                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <h5 class="text-center pb-3">Your Orders</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>SL</th>
                                            <th>Order No</th>
                                            <th>Sub Total</th>
                                            <th>Discount</th>
                                            <th>Delivery Charge</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>#120</td>
                                            <td>52500</td>
                                            <td>200</td>
                                            <td>100</td>
                                            <td>52400</td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Download Invoice</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
    <!-- account_section - end
    ================================================== -->

@endsection

@section('footer_script')
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Total Order', 'Total Cash On Delivery', 'Total Online Payment'],
        datasets: [{
          label: '# Chart of Order Activities',
          data: [{{ $totalOders->count() }}, {{ $totalOders->where('payment_method','Cash On Delivery')->count() }}, {{ $totalOders->where('payment_method','Online Payment')->count() }}],
          borderWidth: 1,
          backgroundColor: [
            '#ff99c8',
            '#fcf6bd',
            '#d0f4de',

          ],
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
    <script>
    const ctxpie = document.getElementById('myNewpie');
    new Chart(ctxpie, {
      type: 'pie',
      data: {
        labels: ['Total Order Money', 'Total Paid Amount', 'Total Unpaid Amount'],
        datasets: [{
          label: '# Chart of Order Activities',
          data: [{{ $totalOders->sum('product_round_final_total') }},{{ $totalOders->where('payment_status','paid')->sum('product_round_final_total') }}, {{ $totalOders->where('payment_status','unpaid')->sum('product_round_final_total') }}],
          borderWidth: 1,
          backgroundColor: [
            '#6f1d1b',
            '#bb9457',
            '#432818',

          ],
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

  </script>
@endsection
