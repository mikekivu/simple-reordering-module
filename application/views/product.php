<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	
	
	

	

	

	</style>

<script type="text/javascript" src="../../cod/js/jquery.js" ></script>
	<script type="text/javascript" src="../../cod/Js/crud_operation.js" ></script>

</head>
<body>

<div id="container">
	<h1>Test</h1>

	<div id="body">
<?php echo base_url() ?>
<form id="product_form" role="form" method="post" action="<?php echo base_url() ?>index.php/product/save">
  <div class="form-group">
    <label for="email">Product</label>

<select id="product_id" name="id">
<?php

foreach($product as $row)
{ ?>
<option value = "<?php echo $row->id ?>"><?php echo $row->title; ?></option><?php
}
?>
</select>
    
  </div>
  <div class="form-group">
    <label for="pwd">qty:</label>
    <input type="text" class="form-control" id="qty" name="qty">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>

		<input type="button" onclick="test()" name="" value="alert">

		<table id="tbl">
			<tr>
				<th>Title</th>
				<th>Quantity</th>
				<th>Reorder Level</th>
			</tr>
			<tbody id="tableBody">
			</tbody>
		</table>
		
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>

<script type="text/javascript">
	
	$(document).ready(function(){
		get();
	})
 
    $("#product_form").submit(function(event) {

      event.preventDefault();

      var $form = $(this),
          url = $form.attr('action');
        
      var posting = $.post( url, { id: $('#product_id').val(), qty: $('#qty').val() } );
      posting.done(function( data ) {
      	get();
          
      });
      
    });

    function get()
    {
    	var url="<?php echo base_url()?>" + "index.php/product/get";
    	var table = $("#tbl");
		
    	$.get(url,function(data){
    		
    		
    		data=JSON.parse(data);
    		for(i=0;i<data.length;i++)
    		{
    			var row = "<tr>";
    			row = row + "<td>" + data[i]["title"] + "</td>";
    			row = row + "<td id='qty_"+data[i]["id"]+"'>" + data[i]["qty"] + "</td>";
    			row = row + "<td>" + data[i]["reorder_level"] + "</td>";
    			row = row + "</td>";
    			row = row + "</tr>";
    			

    			 table.append(row);
    		}
    		

    		
    	})
    }


</script>

</html>
