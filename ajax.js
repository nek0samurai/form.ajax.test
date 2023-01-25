$( document ).ready(function() {
    $("#btn").click(
		function(){
			sendAjaxForm('result_form', 'ajax_form', 'form.php');
			return false; 
		}
	);
});
 
users = [
	{
		email: "user1@gmail.com",
		id: 1
	},
	{
		email: "user2@gmail.com",
		id: 2
	},
	{
		email: "user3@gmail.com",
		id: 3
	},
	{
		email: "user4@gmail.com",
		id: 4
	},
	{
		email: "user5@gmail.com",
		id: 5
	},
];



function sendAjaxForm(result_form, ajax_form, url) {
	const email = $('#email').val();
	const password = $('#password').val();
	const confirm = $('#confirm').val();
	
    $.ajax({
        url:     url, //url страницы (form.php)
        type:     "POST", //метод отправки
        data: { // что отправляем
			
			"email":   email,
			"password":   password,
			"confirm": confirm
		},  
        success: function(response) { //Данные отправлены успешно
			console.log(typeof(response));
        	
			$('#result_form').html(
				response
			);
			if(typeof(response) === 'object'){
				$('#result_form').html(
					'<h1 class="success__msg">Успешно</h1>'
				);
			}

			
    	},
    	error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
    	}
 	});
}