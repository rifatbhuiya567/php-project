var show_hide = document.getElementById("psh"),
    input_format = document.getElementById("form_pass"),
    show_hide2 = document.getElementById("psh2"),
    input_format2 = document.getElementById("form_con_pass");
        
$(show_hide).on('click', function(event){
    if(input_format.type == 'password'){
        input_format.type = 'text';
    }else {
        input_format.type = 'password';
    }
});
        
$(show_hide2).on('click', function(event){
    if(input_format2.type == 'password'){
        input_format2.type = 'text';
    }else {
        input_format2.type = 'password';
    }
});