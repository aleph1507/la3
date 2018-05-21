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
            Your Coupon Code is: {{ $user->coupon() }}
          </p>
          <p>
            Total number of sales: {{$sells_total}}
          </p>
        </div>
      </div>

      <table class="table table-hover">
        <thead>
          <tr>
            <th>User Name</th>
            <th>User Email</th>
            <th>Coupon</th>
            <th>Sell Count</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $u)
            <tr>
              <td>{{$u->name}}</td>
              <td>{{$u->email}}</td>
              <td>{{$u->coupon()}}</td>
              <td>{{App\Sell::where('coupon','=',$u->coupon)->count()}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
     </div>
  </div>
</div>
@endsection
