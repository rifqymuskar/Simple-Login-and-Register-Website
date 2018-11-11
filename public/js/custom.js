$(document).ready(function(){
	$('.modal').modal();
	$('.tooltipped').tooltip();

	var url = $("body").data("url")

	$('form').on('submit', function(e){
		e.preventDefault()
		const table = $(this).data('table')
		const action = $(this).data('action')

		//$(this).children("button").addClass("disabled").text('Proccess Login...')

		$.ajax({
			url : url + "ajax/" + table + "/" + action,
			method : "POST",
			data : new FormData(this),
			processData:false,
            contentType:false,
            cache:false,
            async:false,
			complete:function(data){
				console.log(data.responseText)
				json = JSON.parse(data.responseText)
				if(json.stat != 'false'){
					$("body").load(json.stat)
					window.history.pushState('page2', 'Title', json.stat)
					M.toast({html: json.res, displayLength : 10000 , classes: 'rounded'})
				}else{
					$('input').val('')
					$('input:first').focus()
					$("button[type='submit']").removeClass('disabled').text('login')
					M.toast({html: json.res, displayLength : 10000 , classes: 'rounded'})
					
				}
			}
		})

	});

});

function keyup(arg)
{
	var url = $("body").data("url")
	const name = arg.name
	const value = arg.value
	if(name == 'fullname'){
		if(!/[^a-zA-Z\-\/ ]/.test( value ) && value.length >= 4){
			$("#fullname").addClass('valid')
			$("#fullname").removeClass('invalid')
			$(".fullname").text('')
		}else{
			$("#fullname").addClass('invalid')
			$("#fullname").removeClass('valid')
			$(".fullname").text('use 5 character or more')
		}
	}

	if(name == 'email'){
		function validateEmail(value) {
		    var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[A-Z]{2}|com|org|net|gov|mil|biz|info|mobi|name|aero|jobs|museum)\b/;
  			return re.test(value);
		}
		if(validateEmail(value) && value != ""){
			$("#email").addClass('valid')
			$("#email").removeClass('invalid')
			$(".email").text('')
		}else{
			$("#email").addClass('invalid')
			$("#email").removeClass('valid')
			$(".email").text('use valid email')
		}
	}

	if(name == 'username'){
		if(!/[^a-zA-Z0-9\-\/]/.test( value ) && value.length >= 5){
			$("#user").addClass('valid')
			$("#user").removeClass('invalid')
			$(".user").text('')
		}else{
			$("#user").addClass('invalid')
			$("#user").removeClass('valid')
			$(".user").text('dont use symbol and space for username')
		}
	}

	if(name == 'password'){
		if(!/[^a-zA-Z0-9\-\/]/.test( value ) && value.length >= 5){
			$("#pass").addClass('valid')
			$("#pass").removeClass('invalid')
			$(".pass").text('')
		}else{
			$("#pass").addClass('invalid')
			$("#pass").removeClass('valid')
			$(".pass").text('dont use symbol and space for password')
		}
	}
	if(name == 'passconf'){
		if(value == $("#pass").val()){
			$("#cpassword").addClass('valid')
			$("#cpassword").removeClass('invalid')
			$(".cpassword").text('')
		}else{
			$("#cpassword").addClass('invalid')
			$("#cpassword").removeClass('valid')
			$(".cpassword").text('invalid')
		}
	}

}