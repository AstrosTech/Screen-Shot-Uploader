@extends('layouts.app')

@section('content')
    <view-single-upload-page :url="`{{ $slug }}`"/>
@endsection