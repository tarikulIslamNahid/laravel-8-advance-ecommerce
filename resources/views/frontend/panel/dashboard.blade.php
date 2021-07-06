{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Hi..{{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        This is just home page
    </div>
</x-app-layout> --}}

@extends('frontend.body.app')
@section('title','Ecommerce Dashboard')
@section('style')

@endsection
@section('content')
<div class="container page-body-wrapper"> 
         {{-- sidebar menu --}}
@include('frontend.panel.sidebar')
         {{-- sidebar menu --}}

         {{-- main-panel --}}
         <div class="main-panel">
             <p>content</p>
        </div>
        {{-- main-panel --}}

</div>
@endsection
@section('script')

@endsection
