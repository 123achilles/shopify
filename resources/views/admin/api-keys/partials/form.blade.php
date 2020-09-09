@extends('admin.layouts.app')
<?php
    $route = 'store';
    if (!empty($item)){
        $id = $item->id;
        $route = 'update';
        $method = 'put';
    }
?>
@section('content')
    <div class="row">
        <div class="col-md-10 offset-1">
            <form action='{{route("admin.api-keys.$route",$id ?? "")}}' method="post">
                <input type="hidden" name="_method" value="{{$method??''}}" />
                @csrf
                <div class="d-flex flex-column">
                    <label for="type"> api type</label>
                    <div>
                        @if($errors->has('type'))
                            <div class="error" style="color: red">{{ $errors->first('type') }}</div>
                        @endif
                        <select name="type" id="">
                            <option value="shopify">Shopify</option>
                            <option value="zalando">Zalando</option>
                        </select>
                    </div>
                    <label for="api_key"> api key</label>
                    <div>
                        @if($errors->has('api_key'))
                            <div class="error" style="color: red">{{ $errors->first('api_key') }}</div>
                        @endif

                        <input type="text" name="api_key" value="{{old('api_key')??$item['api_key']??""}}">
                    </div>
                    <label for="password"> password</label>
                    <div>
                        @if($errors->has('password'))
                            <div class="error" style="color: red">{{ $errors->first('password') }}</div>
                        @endif
                        <input type="text" name="password" value="{{old('api_key')??$item['password']??""}}">
                    </div>
                    <label for="shared_secret"> shared secret</label>
                    <div>
                        @if($errors->has('shared_secret'))
                            <div class="error" style="color: red">{{ $errors->first('shared_secret') }}</div>
                        @endif
                        <input type="text" name="shared_secret" value="{{old('api_key')??$item['shared_secret']??''}}">
                    </div>
                    <div>
                        <button type="submit" name="sumbit">
                            submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

