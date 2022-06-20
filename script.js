const qs = (el) => {
    return document.querySelector(el);
}
const qsAll = (e) => {
    return document.querySelectorAll(e);
}

let input_value = qs('.qt_famoso');
if(input_value.value == 0) {
    var f_numero = 0;
} else {
    var f_numero = input_value.value;
    qs('.event--button--remove').style.display = 'block';
}
console.log(f_numero);
qs('.event--button--add').addEventListener('click',()=>{

    f_numero++;
    let div_list = qs('.event--form--clone--01');
    let clone = div_list.cloneNode(true);
    qs('.event--form--clone').appendChild(clone);
    qs('.qt_famoso').value = f_numero;
    let array_input_clone = qsAll('.input--form--clone');
    array_input_clone[f_numero].value = '';
    array_input_clone[f_numero].setAttribute('name', f_numero);
    if(f_numero > 0) {
        qs('.event--button--remove').style.display = 'block';
    }
}) 
qs('.event--remove').addEventListener('click',()=>{
    qsAll('.event--form--clone--01')[f_numero].remove();
    f_numero--;
    qs('.qt_famoso').value = f_numero;
    if(f_numero == 0) {
        qs('.event--button--remove').style.display = 'none';
    }
})