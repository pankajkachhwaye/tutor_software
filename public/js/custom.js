$(function () {

    if(status == 101){
        $.notify({
                message: message
            },
            {
                allow_dismiss: true,
                newest_on_top: true,
                timer: 1000,
                placement:{
                    from: 'top',
                    align: 'right'
                },
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                }
            });
    };


    function split( val ) {
        return val.split( /,\s*/ );
    }
    function extractLast( term ) {
        return split( term ).pop();
    }
    $( ".userssuggest" )
    // don't navigate away from the field on tab when selecting an item
        .on( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            minLength: 0,
            source: function( request, response ) {
                // delegate back to autocomplete, but extract the last term
                response( $.ui.autocomplete.filter(
                    users, extractLast( request.term ) ) );
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
                var terms = split( this.value );
                // remove the current input
                terms.pop();
                // add the selected item
                terms.push( ui.item.value );
                // add placeholder to get the comma-and-space at the end
                terms.push( "" );
                this.value = terms.join( ", " );
                return false;
            }
        });

    $( ".branchsuggest" )
    // don't navigate away from the field on tab when selecting an item
        .on( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            minLength: 0,
            source: function( request, response ) {
                // delegate back to autocomplete, but extract the last term
                response( $.ui.autocomplete.filter(
                    branchjson, extractLast( request.term ) ) );
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },

        });
    $( ".subjectsuggest" )
    // don't navigate away from the field on tab when selecting an item
        .on( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            minLength: 0,
            source: function( request, response ) {
                // delegate back to autocomplete, but extract the last term
                response( $.ui.autocomplete.filter(
                    subjectjson, extractLast( request.term ) ) );
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },

        });
    $('.datatable').DataTable();
    $('.datepicker').datepicker({
        autoclose: true,
    });
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    $(document).on('click','#editWeek',function () {
        var id = $(this).attr('data-react-id');
        $.ajax({
            type: "GET",
            url: APP_URL + '/edit-week/' + id,
            data: id,
            success: function(data) {
                $('#week_name').val(data.week_name);
                $('#start_date').val(data.start_date);
                $('#end_date').val(data.end_date);
                $('#week_id').val(data.id);
                $('#weekedit').modal('show')
            }
        });

    });

    $(document).on('click','#editdailywork',function () {
        var id = $(this).attr('data-react-id');

        $.ajax({
            type: "GET",
            url: APP_URL + '/daily-work-entry/edit-daily-work/' + id,
            data: id,
            success: function(data) {
                console.log(data);
                $('#dstudent_name').val(data.student_name);
                $('#dcreated_at').val(data.created_at);
                $('#did').val(data.id);
                $('#dbranch_name').val(data.branch_name);
                $('#dcomment').val((data.comment == null ? '' : data.comment));
                $('#ddue_time').val(data.due_time);
                $('#dmobile').val((data.mobile == null ? '' : data.mobile));
                $('#don_off_line').val(data.on_off_line);
                $('#dpaid').val((data.paid == null ? '' : data.paid));
                $('#dpassword').val((data.password == null ? '' : data.password));
                $('#dprice').val((data.price == null ? '' : data.price));
                $('#dremaining').val((data.remaining == null ? '' : data.remaining));
                $('#dstudent_contact_no').val((data.student_contact_no == null ? '' : data.student_contact_no));
                $('#duser_id').val((data.user_id == null ? '' : data.user_id));
                $('#dwebsite_link').val((data.website_link == null ? '' : data.website_link));
                $('#dstatus').val(data.status);
                $('#dsubject_name').val(data.subject_name);
                $('#dtutor_name').val(data.tutor_name);
                $('#dtutor_price').val(data.tutor_price);
                $('#dtype').val(data.type);

                $('#dailyworkedit').modal('show')
            }
        });
    })

    $(document).on('click','#editcourse',function () {
        var id = $(this).attr('data-react-id');

        $.ajax({
            type: "GET",
            url: APP_URL + '/daily-work-entry/edit-course/' + id,
            data: id,
            success: function(data) {
                console.log(data);
                $('#cstudent_name').val(data.student_name);
                $('#ccreated_at').val(data.created_at);
                $('#cgrades').val(data.grades);
                $('#cid').val(data.id);
                $('#cbranch_name').val(data.branch_name);
                $('#dcomment').val((data.comment == null ? '' : data.comment));
                $('#cnext_due_date').val(data.next_due_date);
                $('#dmobile').val((data.mobile == null ? '' : data.mobile));
                $('#con_off_line').val(data.on_off_line);
                $('#cpaid').val((data.paid == null ? '' : data.paid));
                $('#cpassword').val((data.password == null ? '' : data.password));
                $('#cprice').val((data.price == null ? '' : data.price));
                $('#cremaining').val((data.remaining == null ? '' : data.remaining));
                $('#cstudent_contact_no').val((data.student_contact_no == null ? '' : data.student_contact_no));
                $('#cuser_id').val((data.user_id == null ? '' : data.user_id));
                $('#cwebsite_link').val((data.website_link == null ? '' : data.website_link));
                $('#csubject_name').val(data.subject_name);
                $('#ctutor_name').val(data.tutor_name);
                $('#ctutor_price').val(data.tutor_price);
                $('#ctype').val(data.type);
                $('#courseedit').modal('show')
            }
        });
    })



    $("a[href^='#demo']").click(function (evt) {
        evt.preventDefault();
        var scroll_to = $($(this).attr("href")).offset().top;
        $("html,body").animate({scrollTop: scroll_to - 80}, 600);
    });
    $("a[href^='#bg']").click(function (evt) {
        evt.preventDefault();
        $("body").removeClass("light").removeClass("dark").addClass($(this).data("class")).css("background-image", "url('bgs/" + $(this).data("file") + "')");
        console.log($(this).data("file"));


    });
    $("a[href^='#color']").click(function (evt) {
        evt.preventDefault();
        var elm = $(".tabbable");
        elm.removeClass("grey").removeClass("dark").removeClass("dark-input").addClass($(this).data("class"));
        if (elm.hasClass("dark dark-input")) {
            $(".btn", elm).addClass("btn-inverse");
        }
        else {
            $(".btn", elm).removeClass("btn-inverse");

        }

    });
    $(".color-swatch div").each(function () {
        $(this).css("background-color", $(this).data("color"));
    });
    $(".color-swatch div").click(function (evt) {
        evt.stopPropagation();
        $("body").removeClass("light").removeClass("dark").addClass($(this).data("class")).css("background-color", $(this).data("color"));
    });
    $("#texture-check").mouseup(function (evt) {
        evt.preventDefault();

        if (!$(this).hasClass("active")) {
            $("body").css("background-image", "url(bgs/n1.png)");
        }
        else {
            $("body").css("background-image", "none");
        }
    });

    $("a[href='#']").click(function (evt) {
        evt.preventDefault();

    });

    $("a[data-toggle='popover']").popover({
        trigger: "hover", html: true, placement: "top"
    });
});