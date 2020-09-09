@extends('admin.layouts.app')
@section('content')
      <div class="row">
        <div class="col-lg-12">
            <a href="{{route('admin.api-keys.create')}}">create api-key</a>
        </div>
          @if($errors->any())
              <h4>{{$errors->first()}}</h4>
          @endif
        <div class="col-lg-12">
            @if(count($items) > 0)
                <table class="table table-bordered" style="margin-top: 20px">
                    <thead>
                    <tr>
                        <th>type</th>
                        <th>api_key</th>
                        <th>password</th>
                        <th>shared_secret</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->type}}</td>
                            <td>{{$item->api_key}}</td>
                            <td>{{$item->password}}</td>
                            <td>{{$item->shared_secret}}</td>
                            <td>
                                <div>
                                    <div>
                                        <a href="{{route('admin.api-keys.edit', $item->id)}}"><i class="fa fa-edit"></i>{{__('Edit')}}</a> |
                                        <button data-toggle="modal" data-target="#myModal{{$item->id}}"><i class="fa fa-trash-o"></i>{{__('Cancel')}}</button>
                                    </div>

                                    <!-- Modal -->
                                    <div id="myModal{{$item->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{__('Cancel')}}</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <p>{{__('Are you sure to cancel this item')}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{route('admin.api-keys.delete', $item->id)}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <div>
                                                            <button type="submit" data-dismiss="modal" class="btn-success">Close</button>
                                                            <button type="submit" class="btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3>api keys not found</h3>
            @endif
        </div>
    </div>

    {{ $items->links() }}
@endsection
