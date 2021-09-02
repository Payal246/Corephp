
$(function(){
    $("#fpwdForm").validate({
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
            
        },
        messages:{
            email:"Please enter your valid email",
            },
    });
});