@extends('layouts.master')

@section('css')
<link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css' />
<link rel='stylesheet' type='text/css' href='http://www.trirand.com/blog/jqgrid/themes/ui.jqgrid.css' />
@endsection

@section('script')
<script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/jquery-ui-custom.min.js'></script>        
<script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/i18n/grid.locale-en.js'></script>
<script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/jquery.jqGrid.js'></script>
@endsection

@section('content')

<div class="top-content">
    <div class="inner-bg">
        <div class="container">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="form-top">
                <!--for jqgrid-->
                    <table id="list_records">
                    <tr><td></td></tr></table>
                    <div id="perpage"></div>
                <!--for tweets-->
                    <div id="tweetdialog" title="tweets">
                    <span id="tweet"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script type="text/javascript" src="{{ asset_timed('/js/grid.js') }}"></script>
@endsection
