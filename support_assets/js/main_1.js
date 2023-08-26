$("#submitaddressform").validate({
    ignore: ":hidden",
    rules: {
        name: {
            required: true,
            minlength: 3,
            maxlength: 30,
        },
        mobile: {
            required: true,
            minlength: 10,
            maxlength: 10,
        },
        state: {
            required: true,
        },
        city: {
            required: true,
        },
        address: {
            required: true,
            minlength: 5,
            maxlength: 100,
        },
        pincode: {
            required: true,
            number: true,
            minlength: 6,
            maxlength: 6,
        },


    },
    messages: {
        username: {
            required: "<span>Please enter your name </span>",
            maxlength: "<span>Please enter name min 3 or 30 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        mobile: {
            required: "<span>Please enter your mobile number </span>",
            maxlength: "<span>Please enter mobile no  10 digit </span>",
            minlength: "<span>Please enter mobile no  10 digit </span>",
        },
        pincode: {
            required: "<span>Please enter your pincode number </span>",
            maxlength: "<span>Please enter pincode  6 digit </span>",
            minlength: "<span>Please enter pincode  6 digit </span>",
            number: "<span>Please enter only numeric pincode </span>",
        },
        state: {
            required: "<span>Please select state </span>",
        },
        city: {
            required: "<span>Please select city </span>",
        },
        address: {
            required: "<span>Please enter your address details </span>",
            maxlength: "<span>Please enter address min 5 or 100 character </span>",
            minlength: "<span>please enter min 6 digit character</span>",
        },


    },
    submitHandler: function(form) {
        $.ajax({
            type: "POST",
            url: 'customer_update_details',
            data: $(form).serialize(),
            beforeSend: function() {
                $('#Register_customers').addClass('sanding').attr("disabled", true);
                $('#Register_customers').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },

            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                    $('#error_message_register').show();
                    $('#error_message_register').html(obj.message);

                    $('#Register_customers').prop('disabled', false);
                    $('#Register_customers').html('Change Save');
                    $('#Register_customers').addClass('sanding').attr("disabled", false);
                    setTimeout(function() { $('#error_message_register').hide(); }, 10000);
                    return false;
                } else {
                    $('#success_message_register').show();
                    $('#success_message_register').html(obj.message);
                    window.location = 'Customer-List';
                    return false;

                }
            }
        });
    }
});