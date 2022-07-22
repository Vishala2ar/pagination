<html>
 <head>
  <title>How to Get SUM with Datatable Server-side-processing in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
  <style>
body {font-family: Arial, Helvetica, sans-serif;}
 
.navbar {
  width: 100%;
  background-color: black;
  overflow: auto;
}
 
.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}
 
.navbar a:hover {
  background-color: #000;
}
 
.active {
  background-color: #04AA6D;
}
 
@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
</style>
 </head>
 
 <body>
 
 
 <div class="navbar">
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
  <a class="active" href="#"><i class="fa fa-fw fa-search"></i> Search</a>
  <a class="active" href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
  <a class="active" href="#"><i class="fa fa-fw fa-user"></i> Login</a>
  <ul>
  <li style="float:right"><a class="active" href="#about">About</a></li>
</ul>
</div>
 
 
  <div class="container box">
  
   <br />
   <div class="table-responsive"> 
    <table id="order_data" class="table table-bordered">
     <thead>
      <tr>
       <th>id</th>
       <th>customer_name</th>
       <th>type</th>
       <th>phone</th>
       <th>status</th>
       <th>call_status</th>
       <th>note</th>
       <th>content</th>
       <th>customer_response</th>
       <th>reminders</th>
       <th>number</th>
       <th>name</th>
       <th>designation</th>
       <th>email</th>
       <th>follow_date</th>
       <th>dailed_number</th>
       <th>called_date</th>
      </tr>
     </thead>
     <tbody>
     <tfoot>
      <tr>
       <th colspan="3">Total</th>
       <th id="total_order"></th>
      </tr>
     </tfoot>
     </tbody>
    </table>
    <br />
    <br />
    <br />
   </div>
  </div>

 
<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
 
   var dataTable = $('#order_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"page_fetch.php",
     type:"POST"
    },
    drawCallback:function(settings)
    {
     $('#total_order').html(settings.json.total);
    }
   });
 
   
 
 });
 
</script>
</body>
</html>