$.validator.addMethod(
	"lettersonly",
	function (value, element) {
		return this.optional(element) || /^[a-zA-Z\s]*$/.test(value);
	},
	"Solo se permiten letras en este campo"
);

$("#form-agregar-cajero").validate({
	rules: {
		gerente_age: {
			required: true,
			maxlength: 50,
			lettersonly: true,
		},
		fecha_apertura_age: {
			required: true,
			date: true,
		},
		telefono_age: {
			required: true,
			digits: true,
			maxlength: 10,
			minlength: 10,
		},
		email_age: {
			required: true,
			email: true,
			maxlength: 50,
		},
		provincia_age: {
			required: true,
			maxlength: 50,
		},
		ciudad_age: {
			required: true,
			maxlength: 50,
			lettersonly: true,
		},
		direccion_age: {
			required: true,
			maxlength: 50,
		},
		latitud_age: {
			required: true,
		},
		longitud_age: {
			required: true,
		},
		imagen_age: {
			maxlength: 50,
		},
	},
	messages: {
		gerente_age: {
			required: "Por favor, ingrese el nombre del gerente de la agencia",
			maxlength: "El nombre del gerente no puede superar los 50 caracteres",
			lettersonly: "Por favor, ingrese solo letras",
		},
		fecha_apertura_age: {
			required: "Por favor, ingrese la fecha de apertura de la agencia",
			date: "Por favor, ingrese una fecha válida",
		},
		telefono_age: {
			required: "Por favor, ingrese el teléfono de la agencia",
			digits: "Por favor, ingrese solo números",
			maxlength: "El teléfono no puede superar los 10 caracteres",
			minlength: "El teléfono debe tener 10 caracteres",
		},
		email_age: {
			required: "Por favor, ingrese el email de la agencia",
			email: "Por favor, ingrese un email válido",
			maxlength: "El email no puede superar los 50 caracteres",
		},
		provincia_age: {
			required: "Por favor, seleccione la provincia",
			maxlength: "La provincia no puede superar los 50 caracteres",
		},
		ciudad_age: {
			required: "Por favor, ingrese la ciudad de la agencia",
			maxlength: "La ciudad no puede superar los 50 caracteres",
			lettersonly: "Por favor, ingrese solo letras",
		},
		direccion_age: {
			required: "Por favor, ingrese la dirección de la agencia",
			maxlength: "La dirección no puede superar los 50 caracteres",
		},
		latitud_age: {
			required: "Por favor, ingrese la latitud de la agencia",
		},
		longitud_age: {
			required: "Por favor, ingrese la longitud de la agencia",
		},
		imagen_age: {
			required: "Por favor, seleccione una imagen de la agencia",
			maxlength: "El nombre de la imagen no puede superar los 50 caracteres",
		},
	},
});
