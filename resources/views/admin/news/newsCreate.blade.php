@extends('layouts.app')
@section('content')
<div class="row m-0 p-0">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">
                    <h5>Add News</h5>
                </div>
            </div>
            <div class="card-body">
             <form action="{{ isset($data) ? route('admin.news.update') : route('admin.news.store')}}" id="newsAdd" method="POST"  enctype="multipart/form-data">
                @csrf
                @isset($data)
                    <input type="hidden" name="id" value="{{encrypt($data->id)}}">
                @endisset
                <div class="col-md-12 form-group">
                    <label for="title">{{ __('Add Title') }} </label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ isset($data->title) ? $data->title : ''}}">
                    @error('title')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
                </div>

                <div class="col-md-12 form-group">
                    <label for="content">{{ __('Content') }}</label>
                    <textarea id="content" type="text" class="textarea form-control @error('content') is-invalid @enderror" name="content">{{ isset($data->content) ? $data->content : '' }}</textarea>
                    <!-- <input id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}"> -->
                    @error('content')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
                </div>
                
                <div class="col-md-12 form-group">
                    <label for="multiple_titles">{{ __('Multiple Titles') }}</label>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody id="tbody">
                            @isset($data->multiple_titles)
                                @foreach($data->multiple_titles as $value)
                                <tr>
                                <td><input type="text" class="form-control @error('multiple_titles') is-invalid @enderror" name="multiple_titles[]" value="{{$value}}"></td>
                                </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-primary" id="addBtn" type="button"> Add Multiple Titles</button>
                    @error('multiple_titles')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
                </div>

                <div class="col-md-12 form-group">
                    <label for="category">{{ __('Select Category') }}</label>
                    <div class="form-row">
                        @foreach($category as $cat)
                        <div class="form-check ml-lg-5">
                                <input class="form-check-input" type="checkbox" name="category[]" id="category" value="{{$cat}}" {{ isset($data->category) ? (in_array($cat,$data->category))? "checked" :"" :""  }}>
                                <label class="form-check-label">{{$cat}}</label>
                            </div>
                        @endforeach
                            <!-- <div class="form-check ml-lg-5">
                                <input class="form-check-input" type="checkbox" name="category[]" id="category" value="Breaking News" {{ isset($data->category) ? (in_array('Breaking News',$data->category))? "checked" :"" :""  }}>
                                <label class="form-check-label">Breaking News</label>
                            </div>
                            <div class="form-check ml-lg-5">
                                <input class="form-check-input" type="checkbox" name="category[]" id="category" value="Featured News" {{ isset($data->category) ? (in_array('Featured News',$data->category))? "checked" :"" :""  }}>
                                <label class="form-check-label">Featured News</label>
                            </div>
                            <div class="form-check ml-lg-5">
                                <input class="form-check-input" type="checkbox" name="category[]" id="category" value="Partner News" {{ isset($data->category) ? (in_array('Partner News',$data->category))? "checked" :"" :""  }}>
                                <label class="form-check-label">Partner News</label>
                            </div>
                            <div class="form-check ml-lg-5">
                                <input class="form-check-input" type="checkbox" name="category[]" id="category" value="Special News" {{ isset($data->category) ? (in_array('Special News',$data->category))? "checked" :"" :""  }}>
                                <label class="form-check-label">Special News</label>
                            </div>      -->
                    </div>
                    @error('category')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
                </div>

                <div class="col-md-12 form-group">
                  <label for="region">{{ __('Select Region') }}</label>
                    <div class="form-row">
                            <div class="form-check ml-lg-5">
                                <input class="form-check-input" type="checkbox" name="region[]" id="region" value="UK/Internation" {{ isset($data->region) ? (in_array('UK/Internation',$data->region))? "checked" :"" :""  }}>
                                <label class="form-check-label">UK/Internation</label>
                            </div>
                            <div class="form-check ml-lg-5">
                                <input class="form-check-input" type="checkbox" name="region[]" id="region" value="North America" {{ isset($data->region) ? (in_array('North America',$data->region))? "checked" :"" :""  }}>
                                <label class="form-check-label">North America</label>
                            </div>
                            <div class="form-check ml-lg-5">
                                <input class="form-check-input" type="checkbox" name="region[]" id="region" value="Asia/Pasific" {{ isset($data->region) ? (in_array('Asia/Pasific',$data->region))? "checked" :"" :""  }}>
                                <label class="form-check-label">Asia/Pasific</label>
                            </div>    
                    </div>
                    @error('region')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
                </div>

                 <hr>
                <div class="col-md-12 form-group">
                    <label for="seo_title">{{ __('SEO Title') }} </label>
                    <input id="seo_title" type="text" class="form-control @error('seo_title') is-invalid @enderror" name="seo_title" value="{{ isset($data->seo_title) ? $data->seo_title : '' }}">
                    @error('seo_title')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
                </div>

                <div class="col-md-12 form-group">
                    <label for="slug">{{ __('Slug') }} </label>
                    <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ isset($data->slug) ? $data->slug : '' }}">
                    @error('slug')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
                </div>

                <div class="col-md-12 form-group">
                    <label for="meta_description">{{ __('Meta Description') }} </label>
                    <input id="meta_description" type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" value="{{ isset($data->meta_description) ? $data->meta_description : '' }}">
                    @error('meta_description')
                    <div>
                        <label class="error fail-alert  mt-1">{{ $message }}</label>
                    </div>
                    @enderror
                </div>
                <div class="col-md-12 form-group m-3 p-2">
                        <input class="form-check-input" type="checkbox" name="featured" id="featured" value="true"  {{isset($data->featured)?  $data->featured ==="true" ?'checked':'' :''}}>                          
                        <label for="featured">{{ __('sponsored Feature') }}</label> 
                    @error('featured')
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
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });

    /**Add title */
    $('#addBtn').on('click', function() {
        add_multiple_title();
    });

    /**Remove title */
    $('#tbody').on('click', '.remove', function() {
        row_id = 0;
        // remove_multiple_title();
        var child = $(this).closest('tr').nextAll();
        //  console.log(child);
        child.each(function() {
            var id = $(this).attr('id');
            var child_id = $(this).children('#row').children('input');
            var remove_id = parseInt(id.substring(1));
            child_id.html(`${remove_id - 1}`);
            $(this).attr('id', `${remove_id - 1}`);
        });
        //   console.log( $(this).closest('tr'));
        $(this).closest('tr').remove();

        row_id--;
    });
</script>
@endpush