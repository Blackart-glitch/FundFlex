/* This script handles when a user saves or remove a bill */
$(document).ready(function () {
    function handleBill(action, bill_id) {
        var _token = window.routes.csrfToken;
        var url = action === 'save' ? window.routes.saveBill : window.routes.removeBill;

        $.ajax({
            url: url,
            type: "POST",
            data: {
                bill_id: bill_id,
                _token: _token
            },
            success: function (response) {
                alert(response.message)
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('An error occurred while ' + action + 'ing bill')
            }
        });
    }
    function removeBillCard(element) {
        $(element).closest('.billCard').remove();
    }

    $(document).on('click', '.saveBill', function (event) {
        event.stopPropagation();
        handleBill('save', $(this).data('bill-id'));

        removeBillCard(this);
    });

    $(document).on('click', '.removeBill', function (event) {
        event.stopPropagation();
        handleBill('remove', $(this).data('bill-id'));

        removeBillCard(this);
    });
});
