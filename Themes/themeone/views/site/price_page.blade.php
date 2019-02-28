@extends('layouts.sitelayout')
@section('header_scripts')
<link rel="stylesheet" href="{{CSS}}price-table.css">
@stop
@section('content')

 <!-- Page Banner -->
    <section class="cs-primary-bg cs-page-banner" style="margin-top: 110px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="cs-page-banner-title">{{ ucfirst($title) }}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- /Page Banner -->



<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div style="padding: 0 15px">

                <div class="pricing-wrapper clearfix">
        
        @foreach ($subscriptions as $subscription)
     
        <div class="pricing-table">

            @if ($subscription->title == 'Platinum')
                <h3 class="pricing-title" style="background: #D7D3C8">{{$subscription->title}}</h3>
            @elseif($subscription->title == 'Silver')
                <h3 class="pricing-title" style="background: #CBCBCB">{{$subscription->title}}</h3>
            @elseif($subscription->title == 'Gold')
                <h3 class="pricing-title" style="background: #CB9C4E">{{$subscription->title}}</h3>
            @endif


            <div class="price">&#x20b9;{{$subscription->cost}}<sup>/ INR</sup></div>
            <!-- Feature -->
                <ul class="table-list">
                    <li>All Free Feature</li>
                    <li>All Paid Feature</li>
                    <li>Validity {{$subscription->validity}} Days</li>
                </ul>
            <!-- Buy Button -->
                <div class="table-buy">
                    <p>&#x20b9;{{$subscription->cost}}<sup>/ INR</sup></p>
                    <a href="{{SUBSCRIPTION_PLAN.$subscription->slug}}" class="pricing-action">Subscribe</a>
                </div>
            </div>
        @endforeach
    </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1>Offer Banner One</h1>
                </div>
                <div class="col-md-4">
                    <h1>Offer Banner Two</h1>
                </div>
                <div class="col-md-4">
                    <h1>Offer Banner Three</h1>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
            </div>
        </div>
    </div>
</div>
@stop