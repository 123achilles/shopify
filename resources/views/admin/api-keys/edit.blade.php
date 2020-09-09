@extends('admin.layouts.app')

@section('content')

    <div>
        <a href="{{route('admin.api-keys')}}" class="jewelry-link back">
            <i class="fa fa-chevron-left"></i>
            <span>Beck</span>
        </a>
    </div>
    <div class="mt-4">
        <h1 class="my-h1">api-key edit</h1>
    </div>

    @include('admin.api-keys.partials.form',[$item])
@endsection
