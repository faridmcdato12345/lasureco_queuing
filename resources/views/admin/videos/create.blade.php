@extends('layouts.admin')
@section('content')
<div class="container-fluid pt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add New Video') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{route('video.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Accept only video') }}</label>
                            <input id="path" type="file" class="form-control" name="path" autocomplete="name" autofocus accept="video/*">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm form-control">
                                {{ __('Upload') }}
                            </button>
                        </div>
                        <div class="form-group">
                            <a href="{{route('video.index')}}" class="btn btn-danger btn-sm form-control">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
