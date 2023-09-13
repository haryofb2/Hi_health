@extends('master')
@section('content')
    <div class="container-fluid">
        <h1 class="h1 mb-0 text-gray-800">Dashboard</h1>
        <p class="mb-4 text-gray-500">
            A dashboard is an information management tool that receives data from a linked database to provide data
            visualizations.
        </p>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h1 class="h4 mb-0 text-gray-600 text-uppercase">equipment Asset</h1>
                                <h1 class="1 mb-0 text-gray-600">{{ $total_asset }}</h1>
                            </div>
                            <div class="col-4">
                                <img src="{{ url('../../template/img/mining-truck.png') }}" class="img-fluid rounded-top"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h1 class="h4 mb-0 text-gray-600 text-uppercase">ready for use</h1>
                                <h1 class="1 mb-0 text-gray-600">{{ $total_aktif }}</h1>
                            </div>
                            <div class="col-4">
                                <img src="{{ url('../../template/img/work-in-progress.png') }}"
                                    class="img-fluid rounded-top" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h1 class="h4 mb-0 text-gray-600 text-uppercase">Breakdown</h1>
                                <h1 class="1 mb-0 text-gray-600">{{ $total_breakdown }}</h1>
                            </div>
                            <div class="col-4">
                                <img src="{{ url('../../template/img/breakdown.png') }}" class="img-fluid rounded-top"
                                    alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h1 class="h4 mb-0 text-gray-600 text-uppercase">Total wo in {{ $Month_year }}</h1>
                                <h1 class="1 mb-0 text-gray-600">{{ $total_wo }}</h1>
                            </div>
                            <div class="col-4">
                                <img src="{{ url('../../template/img/invoice.png') }}" class="img-fluid rounded-top"
                                    alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <br>
        <div class="card border-0 shadow card-iframe">
            <div class="card-body">
                <iframe
                    src="http://localhost:3000/d-solo/e005f2ae-d015-4ce6-bcf1-683ebcb0a76b/dashboard-hisystem?orgId=1&from=1686263358025&to=1686284958025&panelId=13"
                    width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <br>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <iframe
                            src="http://localhost:3000/d-solo/e005f2ae-d015-4ce6-bcf1-683ebcb0a76b/dashboard-hisystem?orgId=1&from=1686269681948&to=1686291281948&panelId=10"
                            width="100%" height="400" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <iframe
                            src="http://localhost:3000/d-solo/e005f2ae-d015-4ce6-bcf1-683ebcb0a76b/dashboard-hisystem?orgId=1&from=1686260952879&to=1686304152879&panelId=15"
                            width="100%" height="400" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <br>







        {{-- <div class="row row-cols-1 row-cols-md-1 g-4">
            <div class="col">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h1 class="h4 mb-0 text-gray-600 text-uppercase">DBCM & wo backlog</h1>
                        <div class="table-responsive table-responsive-sm">
                            <table class="table table-sm" id="eqipment_schedule_table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Model</th>
                                        <th rowspan="2">Eqip. No.</th>
                                        <th rowspan="2">HM/KM</th>
                                        <th rowspan="2">Breakdown Type</th>
                                        <th colspan="2">Breakdown Start</th>
                                        <th rowspan="2">Delay Days</th>
                                        <th rowspan="2">Trouble Desctiption</th>
                                        <th rowspan="2">Activity</th>
                                        <th colspan="2">Est. RFU</th>
                                        <th colspan="2">Work Order</th>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Number</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td scope="row">R1C1</td>
                                        <td>R1C2</td>
                                        <td>R1C3</td>
                                    </tr>
                                    <tr class="">
                                        <td scope="row">Item</td>
                                        <td>Item</td>
                                        <td>Item</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h1 class="h4 mb-0 text-gray-600 text-uppercase">work order status</h1>
                        <div class="panel-body">
                            <canvas id="canvas" height="280" width="600"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow">
                    <div class="card-body">


                    </div>
                </div>
            </div>
        </div> --}}


    </div>
@endsection

@section('script')
    {{-- @include('content.dashboard.script') --}}
@endsection
