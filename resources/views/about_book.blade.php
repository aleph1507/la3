@extends('layouts.master')

@section('content')
<div class=" no-marginrow">
  <div class=" no-margincontainer-fluid content-wr">
    <div class=" no-margin">
      <div class="content">
        <div class="row">
          <div class="col-md-6">
            <h2 class='title-t'>LOVE ABLOOM IN THE SOUTHERN RAINBOW SWAMP</h2>
            <p class='content-p white-text'> This is a lovely children's story that is not only
              entertaining but also provides lessons on nature and diversity.
              What happens in the swamp with the creatures that live there?
              Find out as you take an adventure to discover laughter, fun,
              learning, and love in The Southern Rainbow Swamp!</p>
          </div>

          <div class="col-md-6">
            <img class='box-shadow box-radius img-responsive mx-auto d-block img-fluid'
              src="{{secure_asset('assets/book_cover.PNG')}}" alt="Book Cover">
              <p class='content-p large-text white-text'>
                The book takes young readers on an adventure full of laughter,
                fun, learning, and love while teaching valuable lessons
                about nature and diversity.
              </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
