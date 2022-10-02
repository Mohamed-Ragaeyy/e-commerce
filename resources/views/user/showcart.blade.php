
@include('user.header')
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text" style="margin-bottom: 200px">
  <div class="owl-banner owl-carousel">
    <div class="banner-item-01">
      <div class="text-content">
        <h4>Best Offer</h4>
        <h2>New Arrivals On Sale</h2>
      </div>
    </div>
    <div class="banner-item-02">
      <div class="text-content">
        <h4>Flash Deals</h4>
        <h2>Get your best products</h2>
      </div>
    </div>
    <div class="banner-item-03">
      <div class="text-content">
        <h4>Last Minute</h4>
        <h2>Grab last minute deals</h2>
      </div>
    </div>
  </div>
</div>
<!-- Banner Ends Here -->
{{-- @if (session()->has('deleted') || session()->has('updated'))
<div class="alert alert-dismissable alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>
        {!! session()->get('deleted') !!}
        {!! session()->get('updated') !!}
    </strong>
</div>
@endif --}}
<div class="container-fluid page-body-wrapper">
  <div class="container" align = "center">
<table class="table">
  <thead style="text-align: center">
      <tr>

      <th>product_title</th>
      <th>price</th>
      <th>quantity</th>
      <th>Total</th>
      <th>created_at</th>
      <th>Action 1</th>
      <th>Action 2</th>

      </tr>
  </thead>

  <form method="POST" action="{{ url('/confirm') }}">
      @foreach ($cart as $value)
      @csrf

  <tbody style="text-align: center">
<tr>

      <td>{{ $value-> product-> title}}</td>
      <td>{{ $value-> price}}</td>
      <td>{{ $value-> quantity}}</td>
      <td>{{ $value-> quantity  *  $value-> price}}</td>
      <td>{{ $value-> created_at}}</td>
      <td><a class="btn btn-danger active" href="{{ url("/deleteCart/$value->id") }}">Delete</a></td>
      <td><a class="btn btn-primary active" href="{{ url("/editCart/$value->id") }}">Edit</a></td>


  </tr>

  </tbody>
  @endforeach

  <tr>
      <td style ="color:red;">Total Price: {{$sum}}</td>
  </tr>
  <td><button class="btn btn-success active" type="submit" name="confirm">Confirm</button></td>
</form>

</table>
  </div>
</div>


<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="inner-content">
          <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.

        - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </div>
</footer>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/isotope.js"></script>
<script src="assets/js/accordions.js"></script>


<script language = "text/Javascript">
  cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
  function clearField(t){                   //declaring the array outside of the
  if(! cleared[t.id]){                      // function makes it static and global
      cleared[t.id] = 1;  // you could use true and false, but that's more typing
      t.value='';         // with more chance of typos
      t.style.color='#fff';
      }
  }
</script>


</body>

</html>
