<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>

	<script type="text/javascript" src="../../cod/js/jquery.js" ></script>
	<script type="text/javascript" src="../../cod/Js/crud_operation.js" ></script>

</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<table class="table table-striped" id="employeeListing">
	<thead>
		<tr>
			<th>Name</th>
			<th>Age</th>
			<th>Skills</th>
			<th>Desgination</th>
			<th>Address</th>
			<th style="text-align: right;">Actions</th>
		</tr>
	</thead>
	<tbody id="listRecords">                    
	</tbody>
</table>


<form id="saveEmpForm" method="post">
	<div class="modal fade" id="addEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">×</span>
			</button>
		  </div>
		  <div class="modal-body">                       
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Name*</label>
					<div class="col-md-10">
					  <input type="text" name="name" id="name" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Age*</label>
					<div class="col-md-10">
					  <input type="text" name="age" id="age" class="form-control" required> 
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Skills*</label>
					<div class="col-md-10">
					  <input type="text" name="skills" id="skills" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Designation*</label>
					<div class="col-md-10">
					  <input type="text" name="designation" id="designation" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Address*</label>
					<div class="col-md-10">
					  <textarea name="address" id="address" class="form-control" rows="5" required></textarea>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save</button>
		  </div>
		</div>
	  </div>
	</div>
</form>

<form id="editEmpForm" method="post">
	<div class="modal fade" id="editEmpModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">×</span>
			</button>
		  </div>
		  <div class="modal-body">
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Name*</label>
					<div class="col-md-10">
					  <input type="text" name="empName" id="empName" class="form-control" placeholder="Name" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Age*</label>
					<div class="col-md-10">
					  <input type="text" name="empAge" id="empAge" class="form-control" placeholder="Age" required>
					</div>
				</div>				
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Skills*</label>
					<div class="col-md-10">
					  <input type="text" name="empSkills" id="empSkills" class="form-control" placeholder="Skils" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Designation*</label>
					<div class="col-md-10">
					  <input type="text" name="empDesignation" id="empDesignation" class="form-control" placeholder="Skils" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Address*</label>
					<div class="col-md-10">
					   <textarea name="empAddress" id="empAddress" class="form-control" rows="5" required></textarea>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			 <input type="hidden" name="empId" id="empId" class="form-control">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Update</button>
		  </div>
		</div>
	  </div>
	</div>
</form>

<form id="deleteEmpForm" method="post">
	<div class="modal fade" id="deleteEmpModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="deleteModalLabel">Delete Employee</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">×</span>
			</button>
		  </div>
		  <div class="modal-body">
			   <strong>Are you sure to delete this record?</strong>
		  </div>
		  <div class="modal-footer">
			<input type="hidden" name="deleteEmpId" id="deleteEmpId" class="form-control">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			<button type="submit" class="btn btn-primary">Yes</button>
		  </div>
		</div>
	  </div>
	</div>
</form>


	</div>

	
</div>

</body>
</html>