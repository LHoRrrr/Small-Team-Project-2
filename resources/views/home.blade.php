@extends('layouts.default');
@section('content')
<!-- Featurs Section Start -->
      @include('includes.feature')
        <!-- Featurs Section End -->


        <!-- Fruits Shop Start-->
            @include('includes.fruite')
        <!-- Fruits Shop End-->


        <!-- Featurs Start -->
        <!-- @include('includes.discount'); -->
        <!-- Featurs End -->


        <!-- Vesitable Shop Start-->
        <!-- @include('includes.vegetable'); -->
        <!-- Vesitable Shop End -->


        <!-- Banner Section Start-->
        <!-- @include('includes.banner'); -->
        <!-- Banner Section End -->


        <!-- Bestsaler Product Start -->
        <!-- @include('includes.bestseller'); -->
        <!-- Bestsaler Product End -->


        <!-- Fact Start -->
        <!-- @include('includes.fact'); -->
        <!-- Fact Start -->


        <!-- Tastimonial Start -->
        @include('includes.testimonial')
        <!-- Tastimonial End -->
@endsection

