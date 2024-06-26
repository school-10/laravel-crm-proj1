@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <h5 class="mb-3 d-flex justify-content-center">Prospect-related chart</h5>

                    <div class="col-sm-3">
                        <form action="" method="GET">
                            <h5 class="mb-3">From/To period</h5>
                            <div class="mb-2">
                                <label for="order_prospect_chart_from">From</label>
                                <input class="form-control" type="date" name="order_prospect_chart_from"
                                    id="order_prospect_chart_from">
                            </div>

                            <div class="mb-4">
                                <label for="order_prospect_chart_to">To</label>
                                <input class="form-control" type="date" name="order_prospect_chart_to"
                                    id="order_prospect_chart_to">
                            </div>
                            <div class="mb-2">
                                <label for="prospect_state">Prospect State</label>
                                <select class="form-control" name="prospect_state" id="prospect_state">
                                    @php
                                        use App\Models\ProspectState;
                                        $prospect_states = ProspectState::all();
                                    @endphp
                                    <option value="all">All</option>
                                    @foreach ($prospect_states as $prospect_state)
                                        <option value="{{ $prospect_state->id }}">{{ $prospect_state->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary pt-0 pb-0" type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="col-sm-9">
                        <div id="order_prospect_data_wrapper" hidden>
                            @php
                                $jsonData = json_encode($data['order_prospect_chart_info']);
                            @endphp
                            <input type="hidden" id="order_prospect_data" value="{{ $jsonData }}">
                        </div>
                        <div data-v-409fe714 class="chart-view">
                            <canvas style="display: block; box-sizing: border-box; height: 228px; width: 456px;"
                                id="prospectOrderChartCanvas">

                            </canvas>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
