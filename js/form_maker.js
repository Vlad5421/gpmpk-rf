// function viewLeadForm() {
//     $('.leads-form').css('display', 'flex');
// }

$(document).on('click', '.send', function () {
    var validateForm = $(document).find('#form_pmpk');
    validateForm.validate({
        rules: {
            fiorod: {
                required: true,
            },
            number: {
                required: true,
                number: true,
                minlength: 11,
                maxlength: 11,

            },
            email: {
                required: true,
                email: true,
            },
            fioreb: {
                required: true,
            },
            dateroj: {
                required: true,
            },
            organnapr: {
                required: true,
            },
            school: {
                required: true,
            },
            class: {
                required: true,
            },
            prich: {
                required: true,
            },
            snopdrod: {
                required: true,
            },
            snopdreb: {
                required: true,
            }
        },
        messages: {
            fiorod: {
                required: "Введите Ваш Имя",
            },
            number: {
                required: "Введите телефон",
                minlength: "Номер в формате 11 цифр",
                maxlength: "Максимум 11 цифр",
                number: "Номер должен содержать только цифры"
            },
            email: {
                required: "Введите Email",
                email: "Email написан не корректно"
            },
            fioreb: {
                required: "Введите ФИО ребенка",
            },
            dateroj: {
                required: "Укажите дату рождения ребенка",
            },
            organnapr: {
                required: "Укажите направивший орган",
            },
            school: {
                required: "Введите номер или название школы или сада",
            },
            class: {
                required: "Укажите класс",
            },
            prich: {
                required: "Укажите причину направления на ПМПК",
            },
            snopdrod: {
                required: "Для отправки необходимо согласие",
            },
            snopdreb: {
                required: "Для отправки необходимо согласие",
            }
        },
        submitHandler: function (form) {
            form.submit();
        },
        errorPlacement: function (error, element) {
            var item = element.parents('.item');
            item.append(error);
        }
    });

    validateForm.submit();
});