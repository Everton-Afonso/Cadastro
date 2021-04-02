//falidação da mascara para o campo celular
function mask(cell){ 
    if(cell.value.length == 0)
        cell.value = '(' + cell.value; 
    if(cell.value.length == 3)
        cell.value = cell.value + ') '; 
    if(cell.value.length == 10)
        cell.value = cell.value + '-';  
}
//validação das mesagem de erro 
$('.full-name').on('invalid', function() {

    let textfield = $(this).get(0);
    let msg = $(this).attr('msg') || 'O campo Nome Completo é obrigatório';

    textfield.setCustomValidity('');

    if (!textfield.validity.valid) {
      textfield.setCustomValidity(msg);
    }
});
$('.cell').on('invalid', function() {

    let textfield = $(this).get(0);
    let msg = $(this).attr('msg') || 'O campo Celular é obrigatório';

    textfield.setCustomValidity('');

    if (!textfield.validity.valid) {
      textfield.setCustomValidity(msg);
    }
});
$('.state').on('invalid', function() {

    let textfield = $(this).get(0);
    let msg = $(this).attr('msg') || 'O campo Estado é obrigatório';

    textfield.setCustomValidity('');

    if (!textfield.validity.valid) {
      textfield.setCustomValidity(msg);
    }
});