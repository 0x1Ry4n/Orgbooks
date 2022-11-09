(function () {
    'use strict';

    let calendarElement = document.querySelector("#calendar");
    let selectorMateria = document.querySelector("#selector-materia");

    let calendar = new FullCalendar.Calendar(calendarElement, {
        locale: 'pt-br',
        initialView: 'dayGridMonth',

        headerToolbar: {
            right: 'dayGridMonth, timeGridWeek'
        },

        footerToolbar: {
            right: 'prevYear, prev, next, nextYear'
        },

        editable: false,

        buttonText: {
            month: 'Mês',
            week: 'Semana',
            listWeek: 'Lista'
        },

        eventColor: '#378006',
        eventTextColor: 'whitesmoke',

        allDayText: 'Dia inteiro',
        events: '../controllers/emprestimos/classes/loadCalendar.php',

        eventDidMount: function (arg) {
            if (!(arg.event.extendedProps.subject == selectorMateria.value || selectorMateria.value == "all")) {
                arg.el.style.display = "none";
            }

        },

        eventClick: function (info) {
            let startTime = new Intl.DateTimeFormat('pt-BR').format(info.event.start);
            let endTime = new Intl.DateTimeFormat('pt-BR').format(info.event.end);

            $('#modal-title').html(`<b><i class='fa fa-money'></i> Empréstimo(Cód.):</b> ${info.event.id}`);
            $('#modal-body').html(`
                <b><i class='fa fa-book'></i> Livro: </b> ${info.event.title}<br>
                <b><i class='fa fa-bookmark'></i> Edição:</b> ${info.event.extendedProps.name + " - " + info.event.extendedProps.subject}<br>
                <b><i class='fa fa-user'></i> Aluno: </b> ${info.event.extendedProps.student + " - " + info.event.extendedProps.id_student}<br>
                <b><i class='fa fa-calendar-days'></i> Data de Retirada:</b> ${startTime}<br>
                <b><i class='fa fa-calendar-days'></i> Data de Devolução:</b> ${endTime}`);
            $('#exampleModalCenter').modal('show');
        },

    });

    calendar.render();

    $("#selector-materia").on('change', function () {
        calendar.refetchEvents();
    });

})();

