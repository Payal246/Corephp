$(function(){
    $("#editForm").validate({
        errorPlacement:function(error,element){
            if(element.is(":radio")){
                error.appendTo(element.parent())
            }else{
                error.insertAfter(element.parent())
            }
        },
        rules:{
            fname:"required",
            lname:"required",
            email:{
                required:true,
                email:true
            },
            uname:{
                required:true,
                rangelength:[3,12]
            },
            
             gender:"required",
            country:"required",
            state:"required",
            city:"required",
            td:'required',
        }, 
        
        messages:{
            
            fname:" Please enter your firstname",
            lname:"Please enter your Lastname",
            email:"Please enter your valid email",
            uname:{
                required:"Please enter your username",
                minlegnth:"Username must be at list 2 characters. "
            },
             gender:" Please select your gender",
            country:" Please select your country",
            state:" Please select your state",
            city:" Please select your city",
            td:"Need to agree..",
        },
    });
});