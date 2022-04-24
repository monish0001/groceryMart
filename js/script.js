

function validateText(element)
{
    var textPattern =  /^[A-Za-z ]{2,40}$/;
    var flag = 0;
    if(element.value == null || !textPattern.test(element.value)){
        flag = 1;
    }
    if(flag==0){
      $(element).removeClass("invalid");
      $(element).addClass("valid");
      element.valid = true;
    }else{
        $(element).removeClass("valid");
        $(element).addClass("invalid");
        element.valid = false;
    }
}
function validateCollegeName(element)
{
    var textPattern =  /.+/;
    var flag = 0;
    if(element.value == null || !textPattern.test(element.value)){
        flag = 1;
    }
    if(flag==0){
      $(element).removeClass("invalid");
      $(element).addClass("valid");
      element.valid = true;
    }else{
        $(element).removeClass("valid");
        $(element).addClass("invalid");
        element.valid = false;
    }
}

function validateNumber(element)
{
    var Pattern =  /^[0-9]{10,10}$/;
    var flag = 0;
    if(element.value == null || !Pattern.test(element.value)){
        flag = 1;
    }
    if(flag==0){
      $(element).removeClass("invalid");
      $(element).addClass("valid");
      element.valid = true;
    }else{
        $(element).removeClass("valid");
        $(element).addClass("invalid");
        element.valid = false;
    }
}

function validateEmail(element)
{
    var Pattern =  /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    var flag = 0;
    if(element.value == null || !Pattern.test(element.value)){
        flag = 1;
    }
    if(flag==0){
      $(element).removeClass("invalid");
      $(element).addClass("valid");
      element.valid = true;
    }else{
        $(element).removeClass("valid");
        $(element).addClass("invalid");
        element.valid = false;
    }
}
    
