$(function(){
    $("#resetForm").validate({
        errorPlacement:function(error,element){
            if(element.is(":radio")){
                error.appendTo(element.parent())
            }else{
                error.insertAfter(element.parent())
            }
        },
        rules:{
            
            email:{
                required:true,
                email:true
            },
            
            pwdn:{
                required:true,
                rangelength:[5,8]
            },
            cpwd:{
                required:true,
                rangelength:[5,8],
                equalTo:"#pwdn",
            },
        }, 
        
        messages:{
            
            
            email:" Enter your valid email",
           
            pwdn:" Enter your New Password",
            cpwd:" Re-enter Password",
            
        },
    });
});