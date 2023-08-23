$(document).ready(function () {

$('#typeahead-focus').on('input', function () {
        var inputVal = $(this).val();
        var datalist = $('#cityOriginList');
        datalist.empty();

        var options = [
            "DIVINOPOLIS - MG",
            "SÃO JOSÉ DO SALGADO -MG",
            "ITAUNA - MG"
        ];

        options.forEach(function (option) {
            if (option.toLowerCase().includes(inputVal.toLowerCase())) {
                datalist.append($('<option>', {
                    value: option
                }));
            }
        })
    })
})
