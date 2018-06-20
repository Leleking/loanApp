@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/imagePreview.css">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="branch" class="col-md-4 col-form-label text-md-right">Branch</label>
                            <div class="col-md-6">
                               <select name="branch" id="" class="form-control">
                                   @foreach($branch as $branches)
                                   <option value="{{$branches->id}}">{{$branches->name}}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="admin" class="col-md-4 col-form-label text-md-right">Administrative Level</label>
                            <div class="col-md-6">
                               <select name="admin" id="" class="form-control">
                                   <option value="0">Staff</option>
                                   <option value="1">Admin</option>
                                   <option value="2">Super-Admin</option>
                               </select>
                            </div>
                           
                        </div>
                        <div class="form-group row">
                                <label for="admin" class="col-md-4 col-form-label text-md-right">Add User Image</label>
                                <div class="">
                                        <div class="card">
                                            <div class="todo-list">
                                                <div class="tdl-holder">
                                                    <div class="tdl-content">
                                                        <ul>
                                                            <li class="color-primary">
                                                                <label>
                                                                <i class="bg-primary"></i><span>Upload Photo</span>
                                                                <a href='#' class="ti-close"></a>
                                                            </label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $(document).ready(function() {
                                                          $.uploadPreview({
                                                            input_field: "#passport-upload",
                                                            preview_box: "#passport-preview",
                                                            label_field: "#passport-label"
                                                          });
                                                        });
                                                        </script>
                                                        
                                                        <div id="passport-preview">
                                                          <label for="passport-upload" id="passport-label">Choose File</label>
                                                          <input type="file" name="image" id="passport-upload" />
                                                        </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="/js/jquery.uploadPreview.min.js"></script>
@endsection
