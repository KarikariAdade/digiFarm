@extends('layouts.farmer')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <form class="farm_form" method="POST" action="{{ route('farmer.dashboard.farm.store') }}" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="submit-section mb-4" align="right">
                        <button class="btn btn-success btn-round" type="submit" name="save" value="save_and_apply"> Create Farm </button>
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
                            <select class="form-control select2" name="farm_category" id="farm_category">
                                <option></option>
                                @foreach($farm_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Farm Type <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="farm_type" id="farm_type">
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="crop_info row">
                        <div class="form-group col-md-4 land_size">
                            <label>Land Size <span class="text-danger">*</span></label>
                            <input type="text" name="land_size" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Crop Number <span class="text-danger">*</span></label>
                            <input type="text" name="crop_number" class="form-control" id="crop_number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 animal_number">
                            <label>Animal Number <span class="text-danger">*</span></label>
                            <input type="text" name="animal_number" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Farm Address <span class="text-danger">*</span></label>
                            <input type="text" name="farm_address" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Average Production (Quarterly)<span class="text-danger">*</span></label>
                            <input type="text" name="average_production" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Farm Images</label>
                            <input type="file" name="farm_images[]" multiple class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" name="description"></textarea>
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
            let farm_category = $('#farm_category'),
                farm_type = $('#farm_type'),
                url = `{{ route('request.get.farm.subcategory') }}`;

                farm_category.change(function(){
                    getFarmSubCategories(url, $(this).val())
                })

            function getFarmSubCategories(url, data){
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {'farm_category': data}
                }).done((response)=>{
                    if (response.code == '200'){
                        farm_type.html(response.data)
                    }
                    displayItems(response.farm_type);
                })
            }


            function displayItems(type){
                if (type === 'is_crop'){
                    $('.animal_number').hide();
                    $('.crop_info').show()
                }else{
                    $('.crop_info').hide();
                    $('.animal_number').show()
                }
            }
        })
    </script>
@endpush
