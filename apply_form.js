jQuery('document').ready(function($){	
	$( "form#rekapComments" ).on( "submit", function(e) {
		e.preventDefault();
		
		$( "#feedback" ).html( '<div class="alert alert-warning"><h2>Mohon Tunggu...</h2></div>' );
		$.ajax({
			url: $('#redirect2').val(),
			data: $(this).serialize(),
			type: 'POST',
			success: function(data){
				console.log(data);
				$("#feedback").html( data );
			}
		});
		
		return false;
	});
	
	$( "form#apply_form" ).on( "submit", function(e) {
		e.preventDefault();
		
		var file = $("#file").prop("files")[0];
		var formdata = new FormData($(this)[0]);    
		formdata.append( 'file', file );
		
		$( "#feedback" ).html( '<div class="alert alert-warning"><h2>Mohon Tunggu...</h2></div>' );
		$.ajax({
			url: $('#redirect').val(), //$(this).attr('action'),
			data: formdata,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(data){
				$( "#feedback" ).html( data );
				$(this).slideUp();
			}
		});		
		return false;
	});
	$("form#form-map").on( "submit", function(e) {
	/* $('.jobsid-job-ads-widget').load(function() {
		//$(this).contents().find(".widget-border").css("width","100%");
	}); */
});