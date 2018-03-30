@extends('layouts.main_layout_site')

@section('header')
    @include('frontendsite.header')
@endsection

@section('content')
    <?=$vars_for_template_view['page_content'];?> {{--OR: {!! $vars_for_template_view['home_content'] !!} --}}

@endsection

@section('footer')
    @include('frontendsite.footer')
@endsection