@extends('layouts.farmer')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <div>
                    <h3>Sent Proposals</h3>
{{--                    <div style="float: right; margin-top: -40px;">--}}
{{--                        <a href="" class="btn btn-warning"><span class="fa fa-bars"></span> Group By Requests</a>--}}
{{--                    </div>--}}
                </div>
                <form class="row mt-4">
                    <div class="col-md-3 form-group">
                        <label>From</label>
                        <input class="form-control" name="from" type="date" id="from">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>To</label>
                        <input class="form-control" name="from" type="date" id="to">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Status</label>
                        <select name="status" class="form-control select2" id="status">
                            <option value="approved">Approved</option>
                            <option value="declined">Declined</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    <div class="col-md-3 pt-4">
                        <button class="btn btn-success mt-1" id="generate">Generate Entries</button>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12 table-responsive p-3">
                        {!! $dataTable->table(['class' => 'table table-hover table-striped']) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('custom-js')
    {!! $dataTable->scripts() !!}
    <script>
        $(document).ready(function () {
            const datatable = $('#dataTable');
            $('#generate').on('click', function () {
                datatable.on('preXhr.dt', function (e, settings, data) {
                    data.status = $('#status').val();
                    data.from = $('#from').val();
                    data.to = $('#to').val();
                });
                datatable.DataTable().ajax.reload();
                return false;
            });
        });
    </script>
@endpush
