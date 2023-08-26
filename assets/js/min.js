$("#insersellmachine").validate({
    ignore: ":hidden",
    rules: {
        owner_name: {
            required: true,
            minlength: 3,
            maxlength: 100,
        },

        mobile_number: {
            required: true,
            minlength: 10,
            maxlength: 10,
        },
        machine_company_name: {
            required: true,
        },
        machine_location: {
            required: true,
            minlength: 3,
            maxlength: 500,
        },
        prod_image1: {
            required: true,
        },
        state: {
            required: true,
        },
        city: {
            required: true,
        },
        submitcheckbox: {
            required: true
        }
    },
    messages: {
        owner_name: {
            required: "<span>Please enter owner or agent name </span>",
            maxlength: "<span>Please enter  owner or agent min 3 or 100 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        machine_company_name: {
            required: "<span>Please enter your vehicle company name </span>",
        },
        machine_location: {
            required: "<span>Please enter machine location </span>",
            maxlength: "<span>Please enter machine location min 3 or 500 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        mobile_number: {
            required: "<span>Please enter your mobile number </span>",
            maxlength: "<span>Please enter mobile no  10 digit </span>",
            minlength: "<span>Please enter mobile no  10 digit </span>",
        },
        prod_image1: {
            required: "<span>Please upload vehicle images </span>",
        },
        state: {
            required: "<span>Please select state </span>",
        },
        district: {
            required: "<span>Please select city </span>",
        },
        submitcheckbox: {
            required: "<span>Please accept terms and condition </span>",
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($("#insersellmachine")[0]);
        $.blockUI({
            css: {
                border: "none",
                padding: "15px",
                backgroundColor: "#000",
                "-webkit-border-radius": "10px",
                "-moz-border-radius": "10px",
                opacity: 0.5,
                color: "#fff",
            },
        });
        $.ajax({
            type: "POST",
            url: BASE_URL + "add_new_machine_cell",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#submit_product").addClass("sanding").attr("disabled", true);
                $("#submit_product").html(
                    '<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>'
                );
            },
            success: function(data) {
                obj = JSON.parse(data);
                setTimeout($.unblockUI, 1000);
                if (obj.code == 400) {
                    $("#error_message_register").show();
                    $("#error_message_register").html(obj.message);
                    $("#submit_product").prop("disabled", false);
                    $("#submit_product").html("Add Product");
                    $("#submit_product").addClass("sanding").attr("disabled", false);
                    setTimeout(function() {
                        $("#error_message_register").hide();
                    }, 10000);
                    return false;
                } else {
                    $("#success_message_register").show();
                    $("#success_message_register").html(obj.message);
                    window.location = "sellBuyMachine";
                }
            },
        });
    },
});

$("#addNewDriversForm").validate({
    ignore: ":hidden",
    rules: {
        full_name: {
            required: true,
            minlength: 3,
            maxlength: 100,
        },

        mobile_number: {
            required: true,
            minlength: 10,
            maxlength: 10,
            number: true,
        },
        age: {
            required: true,
            number: true,
        },
        machine_location: {
            required: true,
            minlength: 3,
            maxlength: 500,
        },
        machine_description: {
            required: true,
            minlength: 3,
            maxlength: 500,
        },
        operator_type: {
            required: true,
        },
        state: {
            required: true,
        },
        district: {
            required: true,
        },
        license: {
            required: true,
        },
        your_experience: {
            required: true,
        },
        submitcheckbox: {
            required: true,
        },
    },
    messages: {
        full_name: {
            required: "<span>Please enter full name </span>",
            maxlength: "<span>Please enter  full name min 3 or 100 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        age: {
            required: "<span>Please enter your age </span>",
            number: "<span>Please enter only digit </span>",
        },
        machine_location: {
            required: "<span>Please enter machine location </span>",
            maxlength: "<span>Please enter machine location min 3 or 500 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        mobile_number: {
            required: "<span>Please enter your mobile number </span>",
            maxlength: "<span>Please enter mobile no  10 digit </span>",
            minlength: "<span>Please enter mobile no  10 digit </span>",
            number: "<span>Please enter only digit value </span>",
        },
        operator_type: {
            required: "<span>Select driver type </span>",
        },
        state: {
            required: "<span>Select state </span>",
        },
        district: {
            required: "<span>Select district </span>",
        },
        license: {
            required: "<span>Select license with you </span>",
        },
        your_experience: {
            required: "<span>Please enter your experience </span>",
        },
        submitcheckbox: {
            required: "<span>Please accept terms and condition </span>",
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($("#addNewDriversForm")[0]);
        $.blockUI({
            css: {
                border: "none",
                padding: "15px",
                backgroundColor: "#000",
                "-webkit-border-radius": "10px",
                "-moz-border-radius": "10px",
                opacity: 0.5,
                color: "#fff",
            },
        });
        $.ajax({
            type: "POST",
            url: BASE_URL + "add_new_drivers",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#submit_product").addClass("sanding").attr("disabled", true);
                $("#submit_product").html(
                    '<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>'
                );
            },
            success: function(data) {
                obj = JSON.parse(data);
                setTimeout($.unblockUI, 1000);
                if (obj.code == 400) {
                    $("#error_message_register").show();
                    $("#error_message_register").html(obj.message);
                    $("#submit_product").prop("disabled", false);
                    $("#submit_product").html("Submit Driver");
                    $("#submit_product").addClass("sanding").attr("disabled", false);
                    setTimeout(function() {
                        $("#error_message_register").hide();
                    }, 10000);
                    return false;
                } else {
                    $("#success_message_register").show();
                    $("#success_message_register").html(obj.message);
                    window.location = "drivers";
                }
            },
        });
    },
});

$("#addNewOwnerForm").validate({
    ignore: ":hidden",
    rules: {
        mobile_no: {
            required: true,
            minlength: 10,
            maxlength: 10,
            number: true,
        },
        age: {
            required: true,
            number: true,
        },
        address: {
            required: true,
            minlength: 3,
            maxlength: 500,
        },
        machine_description: {
            required: true,
            minlength: 3,
            maxlength: 500,
        },
        owner_farm: {
            required: true,
        },
        state: {
            required: true,
        },
        district: {
            required: true,
        },
        machine_name: {
            required: true,
        },
        submitcheckbox: {
            required: true
        }
    },
    messages: {
        owner_full_name: {
            required: "<span>Please enter full name </span>",
            maxlength: "<span>Please enter  full name min 3 or 100 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        age: {
            required: "<span>Please enter your age </span>",
            number: "<span>Please enter only digit </span>",
        },
        address: {
            required: "<span>Please enter  address </span>",
            maxlength: "<span>Please enter address min 3 or 500 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        mobile_no: {
            required: "<span>Please enter your mobile number </span>",
            maxlength: "<span>Please enter mobile no  10 digit </span>",
            minlength: "<span>Please enter mobile no  10 digit </span>",
            number: "<span>Please enter only digit value </span>",
        },
        owner_farm: {
            required: "<span>Please enter owner farm name </span>",
        },
        state: {
            required: "<span>Select state </span>",
        },
        district: {
            required: "<span>Select district </span>",
        },
        machine_name: {
            required: "<span>Please enter machine name </span>",
        },
        submitcheckbox: {
            required: "<span>Please accept terms and condition </span>",
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($("#addNewOwnerForm")[0]);
        $.blockUI({
            css: {
                border: "none",
                padding: "15px",
                backgroundColor: "#000",
                "-webkit-border-radius": "10px",
                "-moz-border-radius": "10px",
                opacity: 0.5,
                color: "#fff",
            },
        });
        $.ajax({
            type: "POST",
            url: BASE_URL + "add_new_owners",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#submit_product").addClass("sanding").attr("disabled", true);
                $("#submit_product").html(
                    '<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>'
                );
            },
            success: function(data) {
                obj = JSON.parse(data);
                setTimeout($.unblockUI, 1000);
                if (obj.code == 400) {
                    $("#error_message_register").show();
                    $("#error_message_register").html(obj.message);
                    $("#submit_product").prop("disabled", false);
                    $("#submit_product").html("Submit Owner");
                    $("#submit_product").addClass("sanding").attr("disabled", false);
                    setTimeout(function() {
                        $("#error_message_register").hide();
                    }, 10000);
                    return false;
                } else {
                    $("#success_message_register").show();
                    $("#success_message_register").html(obj.message);
                    window.location = "owner";
                }
            },
        });
    },
});

$("#addNewMechanics").validate({
    ignore: ":hidden",
    rules: {
        full_name: {
            required: true,
            minlength: 3,
            maxlength: 100,
        },

        mobile_no: {
            required: true,
            minlength: 10,
            maxlength: 10,
            number: true,
        },
        address: {
            required: true,
            minlength: 3,
            maxlength: 500,
        },
        state: {
            required: true,
        },
        district: {
            required: true,
        },
        submitcheckbox: {
            required: true
        }
    },
    messages: {
        full_name: {
            required: "<span>Please enter full name </span>",
            maxlength: "<span>Please enter  full name min 3 or 100 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        address: {
            required: "<span>Please enter  address </span>",
            maxlength: "<span>Please enter address min 3 or 500 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        mobile_no: {
            required: "<span>Please enter your mobile number </span>",
            maxlength: "<span>Please enter mobile no  10 digit </span>",
            minlength: "<span>Please enter mobile no  10 digit </span>",
            number: "<span>Please enter only digit value </span>",
        },
        state: {
            required: "<span>Select state </span>",
        },
        district: {
            required: "<span>Select district </span>",
        },
        submitcheckbox: {
            required: "<span> Please accept terms and condition </span>",
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($("#addNewMechanics")[0]);
        $.blockUI({
            css: {
                border: "none",
                padding: "15px",
                backgroundColor: "#000",
                "-webkit-border-radius": "10px",
                "-moz-border-radius": "10px",
                opacity: 0.5,
                color: "#fff",
            },
        });
        $.ajax({
            type: "POST",
            url: BASE_URL + "add_new_mechanics",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#submit_product").addClass("sanding").attr("disabled", true);
                $("#submit_product").html(
                    '<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>'
                );
            },
            success: function(data) {
                obj = JSON.parse(data);
                setTimeout($.unblockUI, 1000);
                if (obj.code == 400) {
                    $("#error_message_register").show();
                    $("#error_message_register").html(obj.message);
                    $("#submit_product").prop("disabled", false);
                    $("#submit_product").html("Submit Mechanics");
                    $("#submit_product").addClass("sanding").attr("disabled", false);
                    setTimeout(function() {
                        $("#error_message_register").hide();
                    }, 10000);
                    return false;
                } else {
                    $("#success_message_register").show();
                    $("#success_message_register").html(obj.message);
                    window.location = "mechanics";
                }
            },
        });
    },
});

$("#addNewShopForm").validate({
    ignore: ":hidden",
    rules: {
        full_name: {
            required: true,
            minlength: 3,
            maxlength: 100,
        },

        mobile_no: {
            required: true,
            minlength: 10,
            maxlength: 10,
            number: true,
        },
        shop_address: {
            required: true,
            minlength: 3,
            maxlength: 500,
        },
        state: {
            required: true,
        },
        district: {
            required: true,
        },
        profile_image: {
            required: true,
        },
        submitcheckbox: {
            required: true,
        }
    },
    messages: {
        full_name: {
            required: "<span>Please enter full name </span>",
            maxlength: "<span>Please enter  full name min 3 or 100 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        shop_address: {
            required: "<span>Please enter  shop_address </span>",
            maxlength: "<span>Please enter shop_address min 3 or 500 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },

        mobile_no: {
            required: "<span>Please enter your mobile number </span>",
            maxlength: "<span>Please enter mobile no  10 digit </span>",
            minlength: "<span>Please enter mobile no  10 digit </span>",
            number: "<span>Please enter only digit value </span>",
        },
        state: {
            required: "<span>Select state </span>",
        },
        district: {
            required: "<span>Select district </span>",
        },
        profile_image: {
            required: "<span>Please upload profile image </span>",
        },
        submitcheckbox: {
            required: "<span>Please accept terms and condition </span>",
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($("#addNewShopForm")[0]);
        $.blockUI({
            css: {
                border: "none",
                padding: "15px",
                backgroundColor: "#000",
                "-webkit-border-radius": "10px",
                "-moz-border-radius": "10px",
                opacity: 0.5,
                color: "#fff",
            },
        });
        $.ajax({
            type: "POST",
            url: BASE_URL + "add_new_shop",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#submit_product").addClass("sanding").attr("disabled", true);
                $("#submit_product").html(
                    '<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>'
                );
            },
            success: function(data) {
                obj = JSON.parse(data);
                setTimeout($.unblockUI, 1000);
                if (obj.code == 400) {
                    $("#error_message_register").show();
                    $("#error_message_register").html(obj.message);
                    $("#submit_product").prop("disabled", false);
                    $("#submit_product").html("Submit Spare");
                    $("#submit_product").addClass("sanding").attr("disabled", false);
                    setTimeout(function() {
                        $("#error_message_register").hide();
                    }, 10000);
                    return false;
                } else {
                    $("#success_message_register").show();
                    $("#success_message_register").html(obj.message);
                    window.location = "sparePart";
                }
            },
        });
    },
});

$("#addNewCivilForms").validate({
    ignore: ":hidden",
    rules: {
        full_name: {
            required: true,
            minlength: 3,
            maxlength: 100,
        },

        mobile_no: {
            required: true,
            minlength: 10,
            maxlength: 10,
            number: true,
        },
        age: {
            required: true,
            number: true,
        },
        address: {
            required: true,
            minlength: 3,
            maxlength: 500,
        },
        qualification: {
            required: true,
            minlength: 3,
            maxlength: 500,
        },

        state: {
            required: true,
        },
        district: {
            required: true,
        },
        machine_name: {
            required: true,
        },
        submitcheckbox: {
            required: true
        }
    },
    messages: {
        full_name: {
            required: "<span>Please enter full name </span>",
            maxlength: "<span>Please enter  full name min 3 or 100 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        age: {
            required: "<span>Please enter your age </span>",
            number: "<span>Please enter only digit </span>",
        },
        address: {
            required: "<span>Please enter  address </span>",
            maxlength: "<span>Please enter address min 3 or 500 character </span>",
            minlength: "<span>please enter min 3 digit character</span>",
        },
        mobile_no: {
            required: "<span>Please enter your mobile number </span>",
            maxlength: "<span>Please enter mobile no  10 digit </span>",
            minlength: "<span>Please enter mobile no  10 digit </span>",
            number: "<span>Please enter only digit value </span>",
        },
        state: {
            required: "<span>Select state </span>",
        },
        district: {
            required: "<span>Select district </span>",
        },
        qualification: {
            required: "<span>Please enter qualification </span>",
        },
        submitcheckbox: {
            required: "<span>Please accept terms and condition </span>",
        },
    },
    submitHandler: function(form) {
        var formData = new FormData($("#addNewCivilForms")[0]);
        $.blockUI({
            css: {
                border: "none",
                padding: "15px",
                backgroundColor: "#000",
                "-webkit-border-radius": "10px",
                "-moz-border-radius": "10px",
                opacity: 0.5,
                color: "#fff",
            },
        });
        $.ajax({
            type: "POST",
            url: BASE_URL + "add_new_engineer",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#submit_product").addClass("sanding").attr("disabled", true);
                $("#submit_product").html(
                    '<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>'
                );
            },
            success: function(data) {
                obj = JSON.parse(data);
                setTimeout($.unblockUI, 1000);
                if (obj.code == 400) {
                    $("#error_message_register").show();
                    $("#error_message_register").html(obj.message);
                    $("#submit_product").prop("disabled", false);
                    $("#submit_product").html("Submit Engineer");
                    $("#submit_product").addClass("sanding").attr("disabled", false);
                    setTimeout(function() {
                        $("#error_message_register").hide();
                    }, 10000);
                    return false;
                } else {
                    $("#success_message_register").show();
                    $("#success_message_register").html(obj.message);
                    window.location = "engineerOrSupervisor";
                }
            },
        });
    },
});

function imageExtensionValidate(i) {
    var validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];
    // var fileInput = document.getElementsById("file-input");
    var fileVal = i.value;
    if (fileVal.length > 0) {
        var blnValid = false;
        for (var j = 0; j < validFileExtensions.length; j++) {
            var sCurExtension = validFileExtensions[j];
            if (
                fileVal
                .substr(fileVal.length - sCurExtension.length, sCurExtension.length)
                .toLowerCase() == sCurExtension.toLowerCase()
            ) {
                blnValid = true;
                break;
            }
        }

        if (!blnValid) {
            alert(
                "Sorry, " +
                fileVal +
                " is invalid, allowed extensions are: " +
                validFileExtensions.join(", ")
            );
            var imageId = "#" + i.name;
            $(imageId).val("");
            return false;
        }
    }
}