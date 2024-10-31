<!DOCTYPE html>
<html>
 <head>
  <title>Live search in laravel using AJAX</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Live search in laravel using AJAX</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Products Data</div>
    <div class="panel-body">
     <div class="form-group">

      <input type="text" name="search" onfocus="this.value=''" id="search" class="form-control" placeholder="Search Product Data" />
      <div class="table-responsive">
       <table class="table table-striped table-bordered" style="display:none;" id="search_table">
        <thead>
         <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Type</th>
          <th>Brewery</th>
          <th>Abv%</th>
         </tr>
        </thead>
        <tbody>

        </tbody>
       </table>
       <button class="btn button btn-primary" style="display:none;" id="close_search">Close</button>
      </div>

     </div>
    </div>
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
  $('table').show();
  $('#close_search').show();
 });
});
</script>
<script>
document.getElementById("close_search").addEventListener("click", function(){
  document.getElementById("close_search").style.display = "none";
  document.getElementById("search_table").style.display = "none";
  document.getElementById("search_table").style.display = "none";
});
</script>
