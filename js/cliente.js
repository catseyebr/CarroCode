function loadCliente () {
	new Validator('form', {validations: [
					{type: 'required', validate: validate_required, msg: 'Campo obrigatório!'},
					{type: 'val_nome', validate: validate_word, msg: 'Somente promeiro nome.'},
					{type: 'val_sobrenome', validate: validate_word, msg: 'Somente último nome.'},
					{type: 'val_cpf', validate: validate_cpf, msg: 'CPF inválido.'},
					{type: 'val_data', validate: validate_date, msg: 'Formato DD/MM/AAAA.'},
					{type: 'val_telefone', validate: validate_phone, msg: 'Formato (XX)XXXX-XXXX.'},
					{type: 'val_email', validate: validate_email, msg: 'E-mail inválido.'},
					{type: 'val_cep', validate: validate_cep, msg: 'CEP inválido.'},
					{type: 'val_num', validate: validate_numeric, msg: 'Somente números.'},
					{type: 'val_cidade', validate: val_cidade, msg: 'Escolha um estado antes.'}
				]});
}

function val_cidade () {
	return (this.elm.find('option').length > 1);
}