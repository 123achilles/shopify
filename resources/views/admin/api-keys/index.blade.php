@include('admin.layouts.app')
@section('content')
    <div class="container">
    <div class="row">
        <div class="align-content-center">
        <a href="{{route('admin.api-keys.create')}}">create api-key</a>
        </div>
    </div>
    </div>
@endsection
