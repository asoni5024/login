<!DOCTYPE html>
<html>
<head>
	<title>view data</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body></br>
	<a href="registration.html">Back</a></br></br>
	<div class="container">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
		<th>id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile No.</th>
		<th>Address</th>
		<th>Password</th>
		<th>Action</th>
            </tr>
        </thead>
	<tbody id="tdata">
		
	</tbody>

</table></div>
 <div class="modal fade" tabindex="-1" id="myModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modelForm">
                
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );


</script>
<script type="text/javascript">
	function savedata(){
		$.ajax({
			type:'POST',
			url: 'view.php',
			cache: false,
			success : function(result){
			var data = JSON.parse(result);
			createtable(data['data']);
			}
		})
	}
	savedata();
	function createtable(data){
		var html='';
		for(var i in data){
			html += '<tr><td>'+data[i]['id']+'</td>';
        html += '<td>'+'<div class="actualdata_'+i+'">'+data[i]['name']+'</div>'+'<div class="inputbox_'+i+'" style="display: none;"><input type="text" class="form-control" value="'+data[i]['name']+'" id="name_'+i+'"></div>'+'</td>';
        html += '<td>'+'<div class="actualdata_'+i+'">'+data[i]['email']+'</div>'+'<div class="inputbox_'+i+'" style="display: none;"><input type="text" class="form-control" value="'+data[i]['email']+'" id="email_'+i+'"></div>'+'</td>';
        html += '<td>'+'<div class="actualdata_'+i+'">'+data[i]['mobile']+'</div>'+'<div class="inputbox_'+i+'" style="display: none;"><input type="number" class="form-control" value="'+data[i]['mobile']+'" id="mobile_'+i+'"></div>'+'</td>';
        html += '<td>'+'<div class="actualdata_'+i+'">'+data[i]['address']+'</div>'+'<div class="inputbox_'+i+'" style="display: none;"><input type="text" class="form-control"value="'+data[i]['address']+'" id="address_'+i+'"></div>'+'</td>';
        html += '<td>'+'<div class="actualdata_'+i+'">'+data[i]['password']+'</div>'+'<div class="inputbox_'+i+'" style="display: none;"><input type="text" class="form-control"value="'+data[i]['password']+'" id="password_'+i+'"></div>'+'</td>';
        html += '<td><center><div id="savebutton_'+i+'" style="display: none;"><button class="btn btn-success" onclick="update('+i+','+data[i]['id']+')">Save</button></div><button class="btn btn-success" id="editbutton_'+i+'" style="display: block;" onclick="Edit1('+i+','+data[i]['id']+')">Edit</button><button class="btn btn-danger" onclick="delete1('+i+','+data[i]['id']+')">Delete</button></center></td></tr>';
        
        // $(".inputbox_"+i+"").hide();
         //$('#savebutton_'+i+'').hide();	
		}
		$('#tdata').html(html);
		$('#example').DataTable();
	}

function Edit1(i,id){
    $('.actualdata_'+i+'').hide();
    $('#editbutton_'+i+'').hide();
   $('.inputbox_'+i+'').show();
    $('#savebutton_'+i+'').show();
}

function update(i,id){
    $('.actualdata_'+i+'').show();
    $('.inputbox_'+i+'').hide();
    $('#savebutton_'+i+'').hide();
    $('#editbutton_'+i+'').show();
        var data2 = {
                    "id" :id,
                    "name":$("#name_"+i+"").val(),
                    "email":$("#email_"+i+"").val(),
                    "mobile" :$("#mobile_"+i+"").val(),
                    "address" :$("#address_"+i+"").val(),
                    "password" :$("#password_"+i+"").val()
                    };
                  
        $.ajax({
            
                type: "POST",
                url: 'Update.php',
                data : {"data2":data2},                    
                cache: false,        
                success: function(result)
                {
                    if(result==101)
                    {
                        alert("successfully updated ");
                        location.reload(true); 

                       
                    }
                    else
                    {
                        alert("not updated please try again!");
                    }
                }
            });
} 
function delete1(i,id)
        {
            var html ='<div class="modal-header"><center><h3 class="modal-title " id="exampleModalLabel">Are you sure want to delete data?</h3></center><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" ><center><button type="button" class="btn btn-danger" data-dismiss="modal" onclick="delete_data('+id+')">yes</button>    <button type="button" class="btn btn-info" data-dismiss="modal">No</button></center></div>';
            $("#modelForm").html(html);
           $("#myModal").modal('show');
        }
function delete_data(id)
{   
    var data3={
        "id":id
    };
        $.ajax({
                type: "POST",
                url: 'delete.php',
                data : {"data3":data3},                    
                cache: false,        
                success: function(result)
                {
                    
                    if(result==1)
                    {
                        alert("deleted successfully");
                        // show();
                        location.reload(true); 

                        
                    }
                    else
                    {
                        alert("not deleted !");
                    }
                }
            }); 
}



</script>
</body>
</html>