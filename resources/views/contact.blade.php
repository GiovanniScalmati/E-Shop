@extends('layouts.app')

@section('title',' - Contact')

@section('content')
<div class="container container_simple">
  <div class="row">
    <!-- H lista me ta stoixeia epikoinwnias -->
    <div class="col-md-5 col-sm-12 col-xs-12" id="contact_list">
      <h4 id="contact_header1">Contact Information</h4>
      <ul class="fa-ul">
        <li><span style="width: 3.14285714em;" class="fa-li"><i class="fa fa-map-marker contact_icons"></i></span><label><b>Address</b><br>Celeste Slater
        606-3727 Ullamcorper</label></li>
        <li><span style="width: 3.14285714em;" class="fa-li"><i class="fa fa-envelope contact_icons"></i></span><label><b>Email address</b><br>info@lorem.com</label></li>
        <li><span style="width: 3.14285714em;" class="fa-li"><i class="fa fa-phone contact_icons"></i></span><label><b>Phone Number</b><br>+66 859038213</label></li>
      </ul>
    </div>
    <!-- H forma tou contact -->
    <div class="col-md-7">
      <form id="contact_form">
        <div class="form-group">
          <label for="exampleInputName">Full Name</label>
          <input type="text" class="form-control" id="name_input">
        </div>
        <div class="form-group">
          <label for="exampleInputPhone">Phone Number</label>
          <input type="text" class="form-control" id="phone_input">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="email_input" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputText">Message</label>
          <textarea class="form-control" id="message_input" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="submit_button_form">Submit</button>
      </form>
    </div>

  </div>
</div>
<!-- To google map -->
<iframe id="contact_map" width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJxZZwR28JvUcRAMawKVBDIgQ&key=AIzaSyDajbn3k4UTno2iwTGgv-0htSPM1RSmWFM&zoom=15" allowfullscreen></iframe>
@endsection
