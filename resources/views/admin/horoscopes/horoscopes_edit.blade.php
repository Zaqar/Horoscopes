@extends('layouts.admin')

@section('header')
	@include('admin.header')
@endsection

@section('content')
	@include('admin.horoscopes.content_horoscopes_edit_form')
@endsection