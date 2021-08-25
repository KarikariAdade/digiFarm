@extends('layouts.farmer')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <form class="" method="POST" action="{{ route('business.dashboard.request.store') }}">
                    @method('POST')
                    @csrf
                    <div class="submit-section mb-4" align="right">
                        <button class="btn btn-success btn-round" type="submit" name="save" value="save"> Save </button>
                        <button class="btn btn-success btn-round" type="submit" name="save" value="save_and_apply"> Save & Apply</button>
                    </div>
                    <div class="form-row"></div>
                @include('layouts.errors')
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Farm Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="farm_name">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Farm Category <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="farm_category">
                                @foreach($farm_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Farm Category <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="farm_category">
                                <option></option>
                                @foreach($farm_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Farm Type <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="farm_type">
                                <option></option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('custom-js')
    <script>
        $(document).ready(function () {
            
        })
    </script>
@endpush
