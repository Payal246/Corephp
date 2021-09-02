$(function(){
    $("#loginForm").validate({
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
            pwd:{
                required:true,
                rangelength:[5,8]
            },
            //td:'required', 
        },
        messages:{
            
            
            email:"Please enter your valid email",
            pwd:{
                required:"Please enter your password",
                minlegnth:"Password must be at list 5 characters. ",
            },
            //td:"Need to agree..",
        },
    });
});