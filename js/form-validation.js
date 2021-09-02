$(function(){
    $("#regForm").validate({
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
            pwd:{
                required:true,
                rangelength:[5,8]
            },
            cpwd:{
                required:true,
                rangelength:[5,8],
                equalTo:"#pwd",
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
            pwd:{
                required:"Please enter your password",
                minlegnth:"Password must be at list 5 characters. "
            },
            cpwd:{
                required:"Please enter your confirm password",
                minlegnth:"Confirmpassword must be at list 5 characters. "
            },
            
             gender:" Please select your gender",
            country:" Please select your country",
            state:" Please select your state",
            city:" Please select your city",
            td:"Need to agree..",
        },
    });
});