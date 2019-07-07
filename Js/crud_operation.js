
function test()
{
    alert("shoaib");
}

function listEmployee(){
	$.ajax({
		type  : 'ajax',
		url   : 'emp/show',
		async : false,
		dataType : 'json',
		success : function(data){
			var html = '';
			var i;
			for(i=0; i<data.length; i++){
				html += '<tr id="'+data[i].id+'">'+
						'<td>'+data[i].name+'</td>'+
						'<td>'+data[i].age+'</td>'+
						'<td>'+data[i].skills+'</td>'+		                        
						'<td>'+data[i].designation+'</td>'+
						'<td>'+data[i].address+'</td>'+
						'<td style="text-align:right;">'+
							'<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="'+data[i].id+'" data-name="'+data[i].name+'" data-age="'+data[i].age+'" data-skills="'+data[i].skills+'" data-designation="'+data[i].designation+'" data-address="'+data[i].address+'">Edit</a>'+' '+
							'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+data[i].id+'">Delete</a>'+
						'</td>'+
						'</tr>';
			}
			$('#listRecords').html(html);					
		}
	});
}

$('#saveEmpForm').submit('click',function(){
    
    var empName = $('#name').val();
    var empAge = $('#age').val();
    var empDesignation = $('#designation').val();
    var empSkills = $('#skills').val();
    var empAddress = $('#address').val();
    $.ajax({
        type : "POST",
        url  : "emp/save",
        dataType : "JSON",
        data : {name:empName, age:empAge, designation:empDesignation, skills:empSkills, address:empAddress},
        success: function(data){
            $('#name').val("");
            $('#skills').val("");
            $('#address').val("");
            $('#addEmpModal').modal('hide');
            listEmployee();
        }
    });
    return false;
});

$('#editEmpForm').on('submit',function(){
    var empId = $('#empId').val();
    var empName = $('#empName').val();
    var empAge = $('#empAge').val();
    var empDesignation = $('#empDesignation').val();
    var empSkills = $('#empSkills').val();
    var empAddress = $('#empAddress').val();			
    $.ajax({
        type : "POST",
        url  : "emp/update",
        dataType : "JSON",
        data : {id:empId, name:empName, age:empAge, designation:empDesignation, skills:empSkills, address:empAddress},
        success: function(data){
            $("#empId").val("");
            $("#empName").val("");
            $('#empAge').val("");
            $("#empSkills").val("");
            $('#empDesignation').val("");
            $("#empAddress").val("");
            $('#editEmpModal').modal('hide');
            listEmployee();
        }
    });
    return false;
});

$('#deleteEmpForm').on('submit',function(){
    var empId = $('#deleteEmpId').val();
    $.ajax({
        type : "POST",
        url  : "emp/delete",
        dataType : "JSON",  
        data : {id:empId},
        success: function(data){
            $("#"+empId).remove();
            $('#deleteEmpId').val("");
            $('#deleteEmpModal').modal('hide');
            listEmployee();
        }
    });
    return false;
});