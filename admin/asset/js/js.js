$("#typesel").on('change', function(){
    //user selected the type of paper to upload
    type = $(this).val();


    //getting all elements and showing them
    form_elems = $("#addPaper .form-group.form-cond");

    //looping
    for(n=0; n<form_elems.length; n++){
        form_elem = form_elems[n];
        //uses of this elem
        usage = $(form_elem).data('for').split(",")

        //checking if we can hide or show
        if(usage.includes(type)){
            //unhide
            $(form_elem).removeClass('display-none');

            //call functio n to render
            activateReq(type, form_elem);
        }else{
            //hide elem
            $(form_elem).addClass('display-none')
        }
    }
});


function activateReq(reqname, elem){
	//Function to activate some requirements for paper uploading

    elem_use = $(elem).data('role')
    log(elem_use)

    if(type == 'national_exams'){
        //here we'll load some national exams resources
        if(elem_use == 'subject'){
            //getting subjects taught in national exams

            //we have to know the level from which to load subjects
            level = $("#levelsel").val();
            $.post('api/index.php', {action:'subjects', level:level}, function(){
                try{
                    ret = JSON.parse(data)
                    if(ret.status){
                        //could retrieve the level subjects
                        subjects = data.data;
                        $("#subsel")
                        for(n=0; n<subjects.length; n++){

                        }
                    }
                }
            })
        }

    }

    log(type)
    log(elem)
}
function log(data){
	console.log(data)
}