@extends($layout)
@section('header_scripts')
<link href="{{CSS}}ajax-datatables.css" rel="stylesheet">
<link rel="stylesheet" href="{{CSS}}price-table.css">
@stop
@section('content')
<div id="page-wrapper">
			<div class="container-fluid">
				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li><a href="{{PREFIX}}"><i class="mdi mdi-home"></i></a> </li>
							<li>{{ $title }}</li>
						</ol>
					</div>
				</div>
								
				<!-- /.row -->
				<div class="panel panel-custom">
					<div class="panel-body packages">


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
                    <li>Duration {{$subscription->validity}} Days</li>
                </ul>
            <!-- Buy Button -->
                <div class="table-buy">
                    <p>&#x20b9;{{$subscription->cost}}<sup>/ INR</sup></p>
                    <a href="{{SUBSCRIPTION_PLAN.$subscription->slug}}" class="pricing-action">Subscribe</a>
                </div>
            </div>
        @endforeach
    </div>

					</div>
				</div>
			</div>
			<!-- /.container-fluid -->
		</div>
@endsection