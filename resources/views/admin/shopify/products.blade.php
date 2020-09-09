@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <div class="col-lg-12">
            @if(count($products) > 0)
                <table class="table table-bordered" style="margin-top: 20px">
                    <thead>
                    <tr>
                        <th>image</th>
                        <th>title</th>
                        <th>body_html</th>
                        <th>vendor</th>
                        <th>product_type</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                        <tr>
                            <td><img  width="60px" src="{{$item['image']['src']}}" alt="image"></td>
                            <td>{{$item['title']}}</td>
                            <td>{!!  $item['body_html']!!}</td>
                            <td>{{$item['vendor']}}</td>
                            <td>{{$item['product_type']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3>products not found</h3>
            @endif
        </div>
    </div>
{{$products->links()}}
@endsection
