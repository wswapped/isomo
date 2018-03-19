$("#typesel").on('change', function(){
    //user selected the type of paper to upload
    type = $(this).val();

    log(type)

    //Let's get the requirements for the selected level
    reqs = $("#addPaper .form-group[data-for*='"+type+"']");
    log('ready to jump')

    for(n=0; n<reqs.length; n++){
    	req = reqs[n]
    	//Displaying the requirement and activating it with function
    	$(req).removeClass('display-none');
    	
    	log(req)

    	// activateReq(reqname, req);
    }

    //removing elements which are not required
    not_reqs = $("#addPaper .form-group[data-for*='"+type+"']").not();    
    log('not in for real');
    // log(not_reqs)

    for(i=0; i<not_reqs.length; i++){
    	nreq = not_reqs[i];
    	log(nreq)
    	$(nreq).addClass('display-none');

    }



 });
function activateReq(reqname, elem){
	//Function to activate some requirements for paper uploading
}
function log(data){
	console.log(data)
}