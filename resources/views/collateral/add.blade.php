@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/imagePreview.css">
@endsection
@section('content')
{!!Form::open(['action'=>'customerController@store','method'=>'POST','files'=>true])!!}
<div class="row">

    <div class="col-lg-4">
        <div class="card">
            <div class="card-title">
                <h4>Choose Customer</h4>
            </div>
            <div class="form-group">
                <label class="control-label">Customer Name and Acct_no</label>
                <select name="customer_id" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                        @foreach($customer as $customers)
                        
                        <option value="{{$customers->id}}">{{$customers->surname." ".$customers->otherName}}({{$customers->acct_no}})</option>
                        
                        @endforeach
                        
                    </select>
                    <div>
                        @if($errors)
                        
                            @foreach ($errors->all() as $error )
                            <small class="form-control-feedback" style="color:red">{{$error}}</small>
                            @endforeach
                        
                        @endif
                    </div>
                    
             </div>
             <div class="form-actions">
                <button type="submit" id="submit"  class="btn btn-success btn-rounded"> <i class="fa fa-check"></i>Upload</button>
            </div>
           
        </div>
    </div>
    <!-- /# column -->
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-title">
                <h4>Scanned Documents</h4>
            </div>
            <div class="todo-list">
                <div class="tdl-holder">
                    <div class="tdl-content">
                        <ul>
                            <li class="color-primary">
                                <label>
                                
                                <a href='#' class="ti-close"></a>
                            </label>
                            </li>
                        </ul>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                          $.uploadPreview({
                            input_field: "#image-upload",
                            preview_box: "#image-preview",
                            label_field: "#image-label"
                          });
                        });
                        </script>
                        
                        <div id="image-preview">
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="scan" id="image-upload" required />
                        </div>
                </div>
            </div>
        </div>
    </div>
   
    
</div>
{!!Form::close()!!}


@endsection
@section('js')
<script type="text/javascript" src="/js/jquery.uploadPreview.min.js"></script>
@endsection