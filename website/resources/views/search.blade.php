@extends('layouts.app')

@section('content')

<div class="jumbotron">
    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <div class="input-group">
            
            <form method="post" action="search" name="search">
            {!! csrf_field() !!} 
                <div class="col-md-10">
                    <input type="text" class="form-control" name="search" 
                    placeholder="Search for...">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-info" type="submit">
                    Search!</button>  
                </div>
            </form>

            </div>
        </div>
    </div>
</div>
<div class="jumbotron">
@if ( isset($data))
@for ($i=0; $i < $total['count'] ; $i++)
    @if(isset($data[$i]['photo']))
    <div><img src="{{ $data[$i]['photo']}}"></div>
    @endif
    <div>{{ $data[$i]['name'] }}</div>
    <div>{{ $data[$i]['address'] }}</div>
    <div>{{ $data[$i]['description'] }}</div>
    <hr/>
@endfor
@endif

</div>

@endsection