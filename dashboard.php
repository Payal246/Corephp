<?php
error_reporting (E_ERROR);
include "connection.php";

?>
<!-- HELLO -->
<html>
<head><title>Dashboard</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="css/style.css" >


</head>
<body>
<table id='tbluser' class='displaytable'>
    <thead>
        <tr>
            <td>Register ID</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Email</td>
            <td>Username</td>
            <td>Gender</td>
            <td>Country</td>
            <td>State</td>
            <td>City</td>
            <td>Image</td> 
            <td>Actions</td>  
         </tr>
    </thead>
</table>
</body>
</html>

<script>
    $(document).ready(function(){
            
        $('#tbluser').DataTable({   
            'serverSide':true,
            'ajax':{
                'url':'displaydata.php',
                'type':'POST',
                'paging':true
                },
               // 'columns':[{data:Reg_id}]
            // 'columns':[
            //     {data:Firstname},
            //     {data:lastname},
            //     {data:email},
            //     {data:username},
            //     {data:gender},
            //     {data:country},
            //     {data:state},
            //     {data:city},
            //     {data:image}
            // ]
        });



$('#tbluser').on('click','.delete',function(){
    //alert("inside");
        var regid=$(this).attr("id");
        //alert($regid);
        if(confirm("Are you sure you want to delete this ?")){
                $.ajax({
                    url:"delete.php",
                    method:"POST",
                    data:{rid:regid},
                    success:function(data)
                    {
                        //alert("Record deleted");
                       $('#tbluser').DataTable().ajax.reload();
                    }
                });
        }else{
            return false;
        }
});

});

</script>