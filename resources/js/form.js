import Inputmask from 'inputmask';
import Swal from 'sweetalert2/dist/sweetalert2.js';
window.Popper = require('popper.js').default;
window.$ = window.jQuery = require('jquery');
require('bootstrap');
import 'alpinejs';
require('datatables');


function alerta(icon, title, text) {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
    })
}

if(document.querySelector('.telephone') != null) {
    document.querySelectorAll('.telephone').forEach(item => {
        let im = new Inputmask({ mask:['(99) 9999-9999', '(99) 99999-9999'], removeMaskOnSubmit:true })
        im.mask(item)
    })
}


// begin confirm form delete
if(document.querySelector('.form-delete') != null) confirmFormDelete(document.querySelectorAll(".form-delete"));
function confirmFormDelete(form) {
    form.forEach(item => {
        item.addEventListener('submit', (e) => {
            e.preventDefault();
            Swal.fire({
                title: 'Tem certeza que deseja excluir?',
                showDenyButton: true,
                confirmButtonColor: '#2EB85C',
                confirmButtonText: `Sim`,
                denyButtonText: `Não`,
            }).then((result) => {
                if (result.isConfirmed)
                  item.submit();
            })
        })
    })
}
// end confirm form delete

if(document.querySelector('#form-change-password') != null) {
    document.querySelector("#form-change-password").addEventListener('submit', (e) => {
        let new_password = document.querySelector('#input_new_password'), confirm_new_password = document.querySelector('#input_confirm_new_password');
        e.preventDefault();
        new_password.classList.remove('is-invalid')
        confirm_new_password.classList.remove('is-invalid')
        if (new_password.value == confirm_new_password.value) {
            testPassword(new_password.value) ? document.querySelector("#form-change-password").submit() : [new_password.classList.add('is-invalid'), document.querySelector(`#invalid_${new_password.getAttribute('id')}`).innerHTML = 'Mínimo 8 caracteres, com pelo menos 1 número, 1 letra maiúscula e 1 letra minúscula'];
        } else {
            confirm_new_password.classList.add('is-invalid');
            document.querySelector(`#invalid_${confirm_new_password.getAttribute('id')}`).innerHTML = 'Confirmação de senha diferente';
        }
    });
    function testPassword(password) {
        let lMaiuscula = false, lMinuscula = false, lNumber = false;
        for (let i = 0; i < password.length; i++) {
            if (password[i].match(/^[0-9]+$/)) {
                lNumber = true;
            } else if (password[i] == password[i].toUpperCase()) {
                lMaiuscula = true;
            } else if (password[i] == password[i].toLowerCase()) {
                lMinuscula = true;
            }
        }
        return lMaiuscula == true && lMinuscula == true && lNumber == true ? true : false;
    }
    document.querySelectorAll('.view-password').forEach(item => {
        item.addEventListener('mousedown', () => document.querySelector(`#input_${item.getAttribute('id')}`).setAttribute('type', 'text'));
        item.addEventListener('mouseup', () => document.querySelector(`#input_${item.getAttribute('id')}`).setAttribute('type', 'password'));
    })
}

$(document).ready(function (){
    $(`.tables-data-tables`).DataTable({
        "oLanguage": {
            "sProcessing":   "Processando...",
            "sLengthMenu":   "Mostrar _MENU_ registros",
            "sZeroRecords":  "Não foram encontrados resultados",
            "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty":    "",
            "sInfoFiltered": "",
            "sInfoPostFix":  "",
            "sSearch":       "Buscar:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Primeiro",
                "sPrevious": "Anterior",
                "sNext":     "Próximo",
                "sLast":     "Último"
            }
        },
        "order": []
    });
});

if(document.querySelector('.success') != null) {alerta('success', 'Mensagem Enviada', 'Em breve retornaremos!')}
if(document.querySelector('.error') != null) {alerta('error', 'Erro ao enviar', 'Verifique se não é um robo!')}
