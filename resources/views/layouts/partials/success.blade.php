
        @if(session('message'))
        <div>
                <div class="alert alert-success">
                        <strong>Success!</strong>  {{session('message')}}
                </div>
           
        </div>
        @endif
   