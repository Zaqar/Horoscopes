@extends('layouts.admin')

@section('header')
	@include('admin.header')
@endsection

@section('content')
	@include('admin.compatibilityHoroscopes.content_compatibility_horoscopes_add_form')
@endsection