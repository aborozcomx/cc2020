let $alertMessage = document.querySelector('#alertMessage');

if ($alertMessage){
	setTimeout(function(){
		console.log("si existe mensaje")
		$alertMessage.classList.add('d-none')	
	},5000)
}
