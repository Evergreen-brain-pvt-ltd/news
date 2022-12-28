@extends('layouts.app')
@section('content')
<div class="row m-0 p-0">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-name">
                    <h5>Add New Category</h5>
                </div>
            </div>
            <div class="card-body">
             <form action="{{isset($data) ? route('admin.category.update') : route('admin.category.store')}}" id="categoryAdd" method="POST" >
                @csrf
                @isset($data)
                    <input type="hidden" name="id" value="{{encrypt($data->id)}}">
                @endisset
                <div class="col-md-12 form-group">
                    <label for="name">{{ __('Category') }}<span class="text-danger">*</span> </label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($data->name) ? $data->name : '' }}">
                    @error('name')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
                </div>
       

                <div class="col-md-12 form-group text-center">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
             </form>
            </div>
        </div>
          
    </div>
</div>

@endsection
@push('footer_extras')
@endpush