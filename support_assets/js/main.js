// Register Users Code

$("#loging_submit").validate({
    ignore: ":hidden",
    rules: {
        username: {
            required: true,
            minlength: 3,
            maxlength: 30,
        },
        password: {
            required: true,

        },

    },
    messages: {
        username: {
            required: "<span>Please enter your username or mobile no</span>",
            maxlength: "<span>Please enter username or mobile no min 3 or 30 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        password: {
            required: "<span>Please enter enter your password</span>",

        },


    },
    submitHandler: function(form) {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'SupportController/support_login',
            data: $(form).serialize(),
            beforeSend: function() {
                $('#Login_customers').addClass('sanding').attr("disabled", true);
                $('#Login_customers').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },

            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                    $('#error_message_login').show();
                    $('#error_message_login').html(obj.message);

                    $('#Login_customers').prop('disabled', false);
                    $('#Login_customers').html('SIGN IN');
                    $('#Login_customers').addClass('sanding').attr("disabled", false);
                    setTimeout(function() { $('#error_message_login').hide(); }, 10000);
                    return false;
                } else {
                    $('#success_message_login').show();
                    $('#success_message_login').html(obj.message);
                    window.location = BASE_URL + 'dashboard';
                    return false;

                }
            }
        });



    }
});





$("#submit_learningpath").validate({
    ignore: ":hidden",
    rules: {
        title: {
            required: true,
            minlength: 3,
            maxlength: 30,
        },
        description: {
            required: true,

        },
        images: {
            required: true,
        },
        url: {
            required: true
        }

    },
    messages: {
        title: {
            required: "<span>Please enter title</span>",
            maxlength: "<span>Please enter title min 3 or 30 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        description: {
            required: "<span>Please enter enter your description</span>",

        },
        images: {
            required: "<span>Please upload  image</span>",
        },
        url: {
            required: "<span>Please enter url</span>",
        },


    },
    submitHandler: function(form) {
        var formData = new FormData($("#submit_learningpath")[0]);
        $.ajax({
            type: "POST",
            url: BASE_URL + 'submit_learning_path',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#Learning_customers').addClass('sanding').attr("disabled", true);
                $('#Learning_customers').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                    $('#error_message_login').show();
                    $('#error_message_login').html(obj.message);

                    $('#Learning_customers').prop('disabled', false);
                    $('#Learning_customers').html('Save Change');
                    $('#Learning_customers').addClass('sanding').attr("disabled", false);
                    setTimeout(function() { $('#error_message_login').hide(); }, 10000);
                    return false;
                } else {
                    $('#success_message_login').show();
                    $('#success_message_login').html(obj.message);
                    window.location = BASE_URL + 'learningpath';
                    return false;

                }
            }
        });



    }
});


// Submit Driver Types

$("#submit_driver_types").validate({
    ignore: ":hidden",
    rules: {
        type: {
            required: true,
            minlength: 3,
            maxlength: 30,
        },

    },
    messages: {
        type: {
            required: "<span>Please enter driver type</span>",
            maxlength: "<span>Please enter driver type min 3 or 30 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($("#submit_driver_types")[0]);
        $.ajax({
            type: "POST",
            url: BASE_URL + 'add_driver_types',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#submit_driver_button').addClass('sanding').attr("disabled", true);
                $('#submit_driver_button').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                    $('#error_message_login').show();
                    $('#error_message_login').html(obj.message);

                    $('#submit_driver_button').prop('disabled', false);
                    $('#submit_driver_button').html('Save Change');
                    $('#submit_driver_button').addClass('sanding').attr("disabled", false);
                    setTimeout(function() { $('#error_message_login').hide(); }, 10000);
                    return false;
                } else {
                    $('#success_message_login').show();
                    $('#success_message_login').html(obj.message);
                    window.location = BASE_URL + 'driverTypes';
                    return false;

                }
            }
        });



    }
});
// Machinary Types

$("#submit_machinary_types").validate({
    ignore: ":hidden",
    rules: {
        type: {
            required: true,
            minlength: 3,
            maxlength: 30,
        },

    },
    messages: {
        type: {
            required: "<span>Please enter machinary type</span>",
            maxlength: "<span>Please enter machinary type min 3 or 30 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($("#submit_machinary_types")[0]);
        $.ajax({
            type: "POST",
            url: BASE_URL + 'submit_machinary_types',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#submit_driver_button').addClass('sanding').attr("disabled", true);
                $('#submit_driver_button').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                    $('#error_message_login').show();
                    $('#error_message_login').html(obj.message);

                    $('#submit_driver_button').prop('disabled', false);
                    $('#submit_driver_button').html('Save Change');
                    $('#submit_driver_button').addClass('sanding').attr("disabled", false);
                    setTimeout(function() { $('#error_message_login').hide(); }, 10000);
                    return false;
                } else {
                    $('#success_message_login').show();
                    $('#success_message_login').html(obj.message);
                    window.location = BASE_URL + 'machineType';
                    return false;

                }
            }
        });



    }
});
// Changed Password



$("#changed_password").validate({
    ignore: ":hidden",
    rules: {
        new_password: {
            required: true,
            minlength: 6,
            maxlength: 30,
        },
        con_password: {
            equalTo: "#new_password",
            minlength: 6,
            maxlength: 30,
        }

    },
    messages: {
        new_password: {
            required: "<span>Please enter new password</span>",
            maxlength: "<span>your entered password min 6 or 30 character </span>",
            minlength: "<span>please enter min 6 character</span>",
        },
        con_password: {
            minlength: "<span>Your password must consist of at least 6 characters</span>",
            maxlength: "<span>your entered password min 6 or 30 character </span>",
            equalTo: "Enter Confirm Password Same as Password",
        }


    },
    submitHandler: function(form) {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'change_password_process',
            data: $(form).serialize(),
            beforeSend: function() {
                $('#change_Password').addClass('sanding').attr("disabled", true);
                $('#change_Password').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
            },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 400) {
                    $('#error_message_change').show();
                    $('#error_message_change').html(obj.message);

                    $('#change_Password').prop('disabled', false);
                    $('#change_Password').html('Change Password');
                    $('#change_Password').addClass('sanding').attr("disabled", false);
                    setTimeout(function() { $('#error_message_login').hide(); }, 10000);
                    return false;
                } else {
                    window.location = 'change_password';
                    return false;

                }
            }
        });
    }
});


function delete_record(id) {
    con = confirm('Are you sure the delete record');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_delete",
            type: "POST",
            data: { id: id },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'viewMachinary';
                    return false;
                } else {
                    alert('Not Updated');
                    return false;
                }
            }
        });
    }
}

// status updated


function category_Status_Changed(id, status) {
    const fin = (status == 0) ? 'inactive' : 'active'
    con = confirm('Are you sure the changed status');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_status_changed",
            type: "POST",
            data: { id: id, status: fin },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'viewMachinary';
                    return false;
                } else {
                    alert('Not Updated');
                    return false;
                }
            }
        });
    }
}


function delete_record_driver(id) {
    con = confirm('Are you sure the delete record');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_delete_driver",
            type: "POST",
            data: { id: id },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'driver-list';
                    return false;
                } else {
                    alert('Not Updated');
                    return false;
                }
            }
        });
    }
}

// status updated


function category_Status_Changed_driver(id, status) {
    const fin = (status == 0) ? 'inactive' : 'active'
    con = confirm('Are you sure the changed status');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_status_changed_driver",
            type: "POST",
            data: { id: id, status: fin },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'driver-list';
                    return false;
                } else {
                    alert('Not Updated');
                    return false;
                }
            }
        });
    }
}

function delete_record_owner(id) {
    con = confirm('Are you sure the delete record');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_delete_owner",
            type: "POST",
            data: { id: id },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'owner-list';
                    return false;
                } else {
                    alert('Not Updated');
                    return false;
                }
            }
        });
    }
}

// status updated


function category_Status_Changed_owner(id, status) {
    const fin = (status == 0) ? 'inactive' : 'active'
    con = confirm('Are you sure the changed status');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_status_changed_owner",
            type: "POST",
            data: { id: id, status: fin },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'owner-list';
                    return false;
                } else {
                    alert('Not Updated');
                    return false;
                }
            }
        });
    }
}

function delete_record_mechanics(id) {
    con = confirm('Are you sure the delete record');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_delete_mechanics",
            type: "POST",
            data: { id: id },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'mechanics-list';
                    return false;
                } else {
                    alert('Not Updated');
                    return false;
                }
            }
        });
    }
}

// status updated


function category_Status_Changed_mechanics(id, status) {
    const fin = (status == 0) ? 'inactive' : 'active'
    con = confirm('Are you sure the changed status');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_status_changed_mechanics",
            type: "POST",
            data: { id: id, status: fin },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'mechanics-list';
                    return false;
                } else {
                    alert('Not Updated');
                    return false;
                }
            }
        });
    }
}

function updatefavouritemachinary(id, favourite) {
    con = confirm('Are you sure the change status');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "updatefavouritemachinary",
            type: "POST",
            data: { id: id, favourite: favourite },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'viewMachinary';
                    return false;
                } else {
                    alert(obj.message);
                    return false;
                }
            }
        });
    }
}

function updatefavouritedriver(id, favourite) {
    con = confirm('Are you sure the change favourite status');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "updatefavouritedriver",
            type: "POST",
            data: { id: id, favourite: favourite },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'driver-list';
                    return false;
                } else {
                    alert(obj.message);
                    return false;
                }
            }
        });
    }
}



function updatefavouriteowner(id, favourite) {
    con = confirm('Are you sure the change favourite status');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "updatefavouriteowner",
            type: "POST",
            data: { id: id, favourite: favourite },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'owner-list';
                    return false;
                } else {
                    alert(obj.message);
                    return false;
                }
            }
        });
    }
}

function updatefavouritemmechanics(id, favourite) {
    con = confirm('Are you sure the change favourite status');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "updatefavouritemmechanics",
            type: "POST",
            data: { id: id, favourite: favourite },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'mechanics-list';
                    return false;
                } else {
                    alert(obj.message);
                    return false;
                }
            }
        });
    }
}



function category_Status_Changed_civil(id, status) {
    const fin = (status == 0) ? 'inactive' : 'active'
    con = confirm('Are you sure the changed status');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_status_changed_civil",
            type: "POST",
            data: { id: id, status: fin },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'civilList';
                    return false;
                } else {
                    alert('Not Updated');
                    return false;
                }
            }
        });
    }
}

function delete_civil_details(id) {
    con = confirm('Are you sure the delete record');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_delete_civil",
            type: "POST",
            data: { id: id },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'civilList';
                    return false;
                } else {
                    alert('Not Updated');
                    return false;
                }
            }
        });
    }
}

function updatefavouritemcivil(id, favourite) {
    con = confirm('Are you sure the change favourite status');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "updatefavouritemcivil",
            type: "POST",
            data: { id: id, favourite: favourite },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'civilList';
                    return false;
                } else {
                    alert(obj.message);
                    return false;
                }
            }
        });
    }
}
// Spare Address


function category_Status_Changed_spare(id, status) {
    const fin = (status == 0) ? 'inactive' : 'active'
    con = confirm('Are you sure the changed status');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_status_changed_spare",
            type: "POST",
            data: { id: id, status: fin },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'spareList';
                    return false;
                } else {
                    alert('Not Updated');
                    return false;
                }
            }
        });
    }
}

function delete_spare_details(id) {
    con = confirm('Are you sure the delete record');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_delete_spare",
            type: "POST",
            data: { id: id },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'spareList';
                    return false;
                } else {
                    alert('Not Updated');
                    return false;
                }
            }
        });
    }
}

function updatefavouritemspare(id, favourite) {
    con = confirm('Are you sure the change favourite status');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "updatefavouritemspare",
            type: "POST",
            data: { id: id, favourite: favourite },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'spareList';
                    return false;
                } else {
                    alert(obj.message);
                    return false;
                }
            }
        });
    }
}



function category_Status_Changed_learning(id, status) {
    const fin = (status == 0) ? 'inactive' : 'active'
    con = confirm('Are you sure the changed status');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_status_changed_learning",
            type: "POST",
            data: { id: id, status: fin },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'learningpath';
                    return false;
                } else {
                    alert('Not Updated');
                    return false;
                }
            }
        });
    }
}

function delete_learning_details(id) {
    con = confirm('Are you sure the delete record');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_delete_learning",
            type: "POST",
            data: { id: id },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'learningpath';
                    return false;
                } else {
                    alert('Not delete');
                    return false;
                }
            }
        });
    }
}

function delete_driver_types(id) {
    con = confirm('Are you sure the delete record');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_delete_driver_types",
            type: "POST",
            data: { id: id },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'driverTypes';
                    return false;
                } else {
                    alert('Not delete');
                    return false;
                }
            }
        });
    }
}

function delete_machinary_types(id) {
    con = confirm('Are you sure the delete record');
    if (con == true) {
        $.ajax({
            url: BASE_URL + "generic_delete_machinary_types",
            type: "POST",
            data: { id: id },
            success: function(data) {
                obj = JSON.parse(data);
                if (obj.code == 200) {
                    window.location = 'machineType';
                    return false;
                } else {
                    alert('Not delete');
                    return false;
                }
            }
        });
    }
}
table = $('#cellMachineList').DataTable({
    "pageLength": 50,
    "bLengthChange": false,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": BASE_URL + "cell_machine_list",
        "type": "POST"
    },
    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [0], //first column / numbering column
        "orderable": false, //set not orderable
    }, ],

});

table = $('#driver_table').DataTable({
    "pageLength": 50,
    "bLengthChange": false,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": BASE_URL + "driver_table_list",
        "type": "POST"
    },
    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [0], //first column / numbering column
        "orderable": false, //set not orderable
    }, ],

});

table = $('#owner_table').DataTable({
    "pageLength": 50,
    "bLengthChange": false,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": BASE_URL + "owner_table_list",
        "type": "POST"
    },
    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [0], //first column / numbering column
        "orderable": false, //set not orderable
    }, ],

});
table = $('#mechanics_table').DataTable({
    "pageLength": 50,
    "bLengthChange": false,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": BASE_URL + "mechanics_table_list",
        "type": "POST"
    },
    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [0], //first column / numbering column
        "orderable": false, //set not orderable
    }, ],

});



table = $('#users_table').DataTable({
    "pageLength": 50,
    "bLengthChange": false,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": BASE_URL + "users_table_list",
        "type": "POST"
    },
    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [0], //first column / numbering column
        "orderable": false, //set not orderable
    }, ],

});

table = $('#spare_table').DataTable({
    "pageLength": 50,
    "bLengthChange": false,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": BASE_URL + "spare_table_list",
        "type": "POST"
    },
    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [0], //first column / numbering column
        "orderable": false, //set not orderable
    }, ],

});

table = $('#civil_table').DataTable({
    "pageLength": 50,
    "bLengthChange": false,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": BASE_URL + "civil_table_list",
        "type": "POST"
    },
    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [0], //first column / numbering column
        "orderable": false, //set not orderable
    }, ],

});


table = $('#learning_table').DataTable({
    "pageLength": 50,
    "bLengthChange": false,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": BASE_URL + "learning_table_list",
        "type": "POST"
    },
    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [0], //first column / numbering column
        "orderable": false, //set not orderable
    }, ],

});

let referral_ids = $("#referral_ids").val();

table = $('#referral_table_list').DataTable({
    "pageLength": 50,
    "bLengthChange": false,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": BASE_URL + "referral_table_list",
        "type": "POST",
        data: { referral_ids: referral_ids },
    },
    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [0], //first column / numbering column
        "orderable": false, //set not orderable
    }, ],

});


table = $('#driveType_table_list').DataTable({
    "pageLength": 50,
    "bLengthChange": false,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": BASE_URL + "driveType_table_list",
        "type": "POST"
    },
    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [0], //first column / numbering column
        "orderable": false, //set not orderable
    }, ],

});

table = $('#machinaryType_table_list').DataTable({
    "pageLength": 50,
    "bLengthChange": false,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.
    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": BASE_URL + "machinaryType_table_list",
        "type": "POST"
    },
    //Set column definition initialisation properties.
    "columnDefs": [{
        "targets": [0], //first column / numbering column
        "orderable": false, //set not orderable
    }, ],

});