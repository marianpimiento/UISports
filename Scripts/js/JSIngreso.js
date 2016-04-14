function check(input) {
				    if (input.value != document.getElementById('password').value) {
				        input.setCustomValidity('Las dos contraseñas deben coincidir.');
				    } else {
				        input.setCustomValidity('');
				   }
				}