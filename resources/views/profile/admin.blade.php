@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Hello, {{ $user->name }}</div>
        <div class="card-body">
          <p>
            Your registered e-mail is: {{ $user->email }}
          </p>
          <p>
            You are a member since: {{ $user->created_at }}
          </p>
          <p>
            Your Coupon Code is: {{ $couponcode }}
          </p>
          <p>
            Your sell count thus far is: {{$sell_count}}
          </p>
        </div>
      </div>
     </div>
  </div>
</div>
@endsection
