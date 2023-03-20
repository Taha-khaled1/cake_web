@extends('layouts.admin.main')

@section('content') 









<div style="width:100%; height:200 ">
    {!! $chartjs->render() !!}
</div>




@endsection

@push('js')
 
@endpush