﻿
$(document).ready(function () {


    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg != value;
    }, "Value must not equal arg.");

    $(document).on('change','#on_off_line',function() {
            var opt = $('#on_off_line option:selected').val();
        if(opt == 'Both' || opt == 'Online'){
            $('.dependent-form').show();
        }
        else{
            $('.dependent-form').hide();
        }
    });

    // configure your validation
    $("#add_attribute").validate({
        rules: {
            category_name: { valueNotEquals: "default" }
        },
        messages: {
            category_name: { valueNotEquals: "Please select an item!" }
        },highlight: function (input) {
            console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        }

    });

    $(document).on('click','#submit_pro' ,function () {
        $('#add_attribute').valid();
    })
    // $('#submit_pro').click(function () {
    //
    // });

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

    $('#btnAdd').click(function() {
        var num = $('.clonedInput').length, // Checks to see how many "duplicatable" input fields we currently have
            newNum = new Number(num + 1), // The numeric ID of the new input field being added, increasing by 1 each time
            newElem = $('#entry' + num).clone().attr('id', 'entry' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value
            newElem.find('.input_value').attr('id', 'value' + newNum).attr('name', 'tutor_name[]').val('');
         newElem.find(':not([data-upgraded=""])').attr('data-upgraded', '');
        newElem.find('input[type=text]').attr('disabled',false);
        //Update the counter
        $('#counter').val(newNum);




        // Insert the new element after the last "duplicatable" input field
        $('#entry' + num).after(newElem);
        $('#ID' + newNum + '_title').focus();

        // Enable the "remove" button. This only shows once you have a duplicated section.
        $('#btnDel').attr('disabled', false);
        $('#btnDelEdit').attr('disabled', false);

    });

    $('#btnDel').click(function() {
        // Confirmation dialog box. Works on all desktop browsers and iPhone.
        // if (confirm("Are you sure you wish to remove this section? This cannot be undone."))
        //     {
        var num = $('.clonedInput').length;
        // how many "duplicatable" input fields we currently have
        $('#entry' + num).slideUp('slow', function() {
            $(this).remove();

            $('#counter').val(num - 1);

            // if only one element remains, disable the "remove" button
            if (num - 1 === 1)
                $('#btnDel').attr('disabled', true);
            // enable the "add" button
            $('#btnAdd').attr('disabled', false).prop('value', "add section");
        });
        //    }
        return false; // Removes the last section you added
    });

    $('#btnDelEdit').click(function() {
        // Confirmation dialog box. Works on all desktop browsers and iPhone.
        // if (confirm("Are you sure you wish to remove this section? This cannot be undone."))
        //     {
        var num = $('.clonedInput').length;
        // how many "duplicatable" input fields we currently have
        $('#entry' + num).slideUp('slow', function() {
            $(this).remove();

            $('#counter').val(num - 1);

            // if only one element remains, disable the "remove" button
            if (num - 1 === parseInt($('#initial_counter').val()))
                $('#btnDelEdit').attr('disabled', true);
            // enable the "add" button
            $('#btnAdd').attr('disabled', false).prop('value', "add section");
        });
        //    }
        return false; // Removes the last section you added
    });

    // Enable the "add" button
    $('#btnAdd').attr('disabled', false);
    // Disable the "remove" button
    $('#btnDel').attr('disabled', true);
    $('#btnDelEdit').attr('disabled', true);


$('#categor_product').change(function () {
    $('#add_attribute').valid();
   var id = $('#categor_product option:selected').val();
    $('.response').empty();
    $.ajax({
        type: "GET",
        url: APP_URL + '/product/get-category-attr/' + id,
        dataType: 'json',
        data: id,
        success: function(data) {
           console.log(data);
             $.each(data,function (index,value) {
                    var tempalte = "<div class='row clearfix'>"
                            tempalte +="<div class='col-sm-4'>"
                            tempalte += "<label class='form-label'>Variant Name</label>"
                                tempalte += "<div class='form-group form-float'>"
                                     tempalte += "<div class='form-line'>"
                                        tempalte += "<input type='text' readonly='readonly' name='attribute_name[]' value='"+value.attribute_name+"' class='form-control'>"
                                        tempalte += "<input type='hidden' name='attribute_id[]' value='"+value.id+"' class='form-control'>"
                                     tempalte += "</div>"
                                 tempalte += "</div>"
                             tempalte += "</div>"
                        tempalte +="<div class='col-sm-4'>"
                            tempalte += "<label class='form-label'>Item Price As Per This Variant</label>"
                                tempalte += "<div class='form-group form-float'>"
                                  tempalte += "<div class='form-line'>"
                                     tempalte += "<input type='text' required name='procuctpriceattr[]' class='form-control'>"
                                  tempalte += "</div>"
                               tempalte += "</div>"
                           tempalte += "</div>"
                     tempalte +="<div class='col-sm-4'>"
                        tempalte += "<label class='form-label'>Item Description</label>"
                             tempalte += "<div class='form-group form-float'>"
                                 tempalte += "<div class='form-line'>"
                                     tempalte += "<textarea rows='0' required class='form-control no-resize' name='procuctdescription[]'></textarea>"
                                tempalte += "</div>"
                             tempalte += "</div>"
                    tempalte += "</div>"
                 tempalte += "</div>"

            $('.response').append(tempalte);

            })

        }
    });

});

$('#without_Variant_cate').change(function () {
    $('.attribut-form').next('.add-new-row').remove();
    if($(this).prop('checked') == true){
        $('.attribut-form').hide();
    var template =  "<div class='row clearfix add-new-row'>"
        template+= "<div class='col-md-12'>"
        template += "<input type='hidden'  name='bucket_item_cate' value=''>"
        template+= "<input type='checkbox' id='bucket_cate' name='bucket_cate' class='filled-in'>"
        template+= "<label for='bucket_cate'>The Category You Entered is belongs to Bucket Category</label>"
        template+=  "</div>"
        template+=  "</div>"
        $('.attribut-form').after(template);

    }
    else{
        $('.attribut-form').show();
    }
})

    $(document).on('click','#bucket_cate',function () {
        if($(this).prop('checked') == true){
            $(this).prev().val(1);
        }
        else {
            $(this).prev().val('');
        }

    });

$('#without_attribute').change(function () {

    if($(this).prop('checked') == true){
          $('.response').empty();
        $('#categor_product').attr('disabled', true);
        var cat_id = $('#categor_product option:selected').val();
        var tempalte = "<div class='row clearfix'>"
                tempalte +="<div class='col-sm-6'>"
                              tempalte += "<label class='form-label'>Item Price</label>"
                        tempalte += "<div class='form-group form-float'>"
                             tempalte += "<div class='form-line'>"
                                tempalte += "<input type='text' required name='procuctprice' class='form-control'>"
                                tempalte += "<input type='hidden'  name='category_name' value='"+cat_id+"' class='form-control'>"
                             tempalte += "</div>"
                        tempalte += "</div>"
                    tempalte += "</div>"
        tempalte +="<div class='col-sm-4'>"
        tempalte += "<label class='form-label'>Item Description</label>"
        tempalte += "<div class='form-group form-float'>"
        tempalte += "<div class='form-line'>"
        tempalte += "<textarea rows='0' required class='form-control no-resize'  name='procuctdescription'></textarea>"
        tempalte += "</div>"
        tempalte += "</div>"
        tempalte += "</div>"
        tempalte += "</div>"
        $('.response').append(tempalte);
    }
    else {
        $('#categor_product').attr('disabled', false);
        if($('#categor_product option:selected').val() !=''){
            var id = $('#categor_product option:selected').val();
            $('.response').empty();
            $.ajax({
                type: "GET",
                url: APP_URL + '/product/get-category-attr/' + id,
                dataType: 'json',
                data: id,
                success: function(data) {
                    console.log(data);
                    $.each(data,function (index,value) {
                        var tempalte = "<div class='row clearfix'>"
                        tempalte +="<div class='col-sm-4'>"
                        tempalte += "<label class='form-label'>Variant Name</label>"
                        tempalte += "<div class='form-group form-float'>"
                        tempalte += "<div class='form-line'>"
                        tempalte += "<input type='text' readonly='readonly' name='attribute_name[]' value='"+value.attribute_name+"' class='form-control'>"
                        tempalte += "<input type='hidden' name='attribute_id[]' value='"+value.id+"' class='form-control'>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte +="<div class='col-sm-4'>"
                        tempalte += "<label class='form-label'>Item Price As Per This Variant</label>"
                        tempalte += "<div class='form-group form-float'>"
                        tempalte += "<div class='form-line'>"
                        tempalte += "<input type='text' required name='procuctpriceattr[]' class='form-control'>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte +="<div class='col-sm-4'>"
                        tempalte += "<label class='form-label'>Item Description</label>"
                        tempalte += "<div class='form-group form-float'>"
                        tempalte += "<div class='form-line'>"
                        tempalte += "<textarea rows='0' required class='form-control no-resize' name='procuctdescription[]'></textarea>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte += "</div>"

                        $('.response').append(tempalte);

                    })

                }
            });

        }
        else {
            $('.response').empty();
        }
    }
});


            $(document).on('click','#add_optional_item',function () {
                var that = $(this);
                var hiddencounter = that.prev().val();
                var elementToClone = that.parent().prev();
                var clone = elementToClone.clone();
                clone.find('.set_empty').val('');
                clone.addClass('removeable')
                elementToClone.after(clone);
                that.prev().val(parseInt(++hiddencounter));
            });

    $(document).on('click','#edit_add_optional_item',function () {
        var that = $(this);
        var hiddencounter = that.prev().val();
        var elementToClone = that.parent().prev();
        var clone = elementToClone.clone();
        clone.find('.optional_itm_delete').remove();
        clone.find('.set_empty').val('');
        clone.find('.make_fillable').val('0.00');
        clone.addClass('removeable')
        elementToClone.after(clone);
        that.prev().val(parseInt(++hiddencounter));
    });


    $(document).on('click','#remove_optional_item',function () {
        var that = $(this);
        var hiddencounter = that.prev().prev().val();
        if(parseInt(hiddencounter) == 1){
            return false;
        }
        else {
            var elementToRemove = that.parent().prev();

            elementToRemove.remove();

            var hiddencounter = that.prev().prev().val();
            that.prev().prev().val(parseInt(--hiddencounter));
        }
    });

    $(document).on('click','#add_extra_item',function () {
        var that = $(this);
        var hiddencounter = that.prev().val();
        var elementToClone = that.parent().prev();
        var clone = elementToClone.clone();
        clone.find('.extra_itm_delete').remove();
        clone.find('input[type=text]').val('');
        clone.addClass('removeable')
        elementToClone.after(clone);
        that.prev().val(parseInt(++hiddencounter));
    });

    $(document).on('click','#remove_extra_item',function () {
        var that = $(this);
        var hiddencounter = that.prev().prev().val();
        var trace = $(this).closest('div.row');
        var trace_counter = parseInt(trace.attr('data-trace'));

        if(parseInt(hiddencounter) == 1 || parseInt(hiddencounter) == trace_counter){
            return false;
        }
        else {
            var elementToRemove = that.parent().prev();

            elementToRemove.remove();

            var hiddencounter = that.prev().prev().val();
            that.prev().prev().val(parseInt(--hiddencounter));
        }
    });

        function replacestring(string) {
            var start = string.indexOf('_') + 1;
            var x = parseInt(string.charAt(start)) + 1;
            var stringval = string.substring(0, start);
            return stringval+x;
        }

        function replacefromhash(str) {
            var string = str.trim();
            var start = string.indexOf('#') + 1;
            var x = parseInt(string.charAt(start)) + 1;
            var stringval = string.substring(0, start);
            return stringval+x;
        }

        function replacefrombraces(str){
            var start = str.indexOf('[') + 1;
            var x = parseInt(str.charAt(start)) + 1;
            var string = str.substring(0, start);
            var returnstring = string + x + ']';
            return returnstring
        }

    function replacefromdoublebraces(str){
        var start = str.indexOf('[') + 1;
        var x = parseInt(str.charAt(start)) + 1;
        var string = str.substring(0, start);
        var returnstring = string + x + '][]';
        return returnstring
    }

    $(document).on('click','#add_bucket_item',function () {
        var that = $(this);
        var elementToClone = that.parent().prev();
        var clone = elementToClone.clone();
        var cloneID = clone.attr('id');
         clone.attr('id', replacestring(cloneID));
         var link_parnet = clone.find('.link-parent').attr('data-parent');
        clone.find('.link-parent').attr('data-parent',replacestring(link_parnet));
        var link_parnet = clone.find('.link-parent').attr('href');
        clone.find('.link-parent').attr('href',replacestring(link_parnet));
        var cloneitm_text = clone.find('.link-parent').text();
        clone.find('.link-parent').text(replacefromhash(cloneitm_text));
        var bind_panel = clone.find('.bindpanel').attr('id');
        clone.find('.bindpanel').attr('id',replacestring(bind_panel));
        clone.find('.set_empty').val('');
        clone.find('input[type=hidden]').val(1);
        clone.find('.removeable').remove();
        var input_text = clone.find('.single-index').each(function () {
            var item = $(this).attr('name');
            $(this).attr('name',replacefrombraces(item))
        });

        var input_number = clone.find('.double-index').each(function () {
            var item_num = $(this).attr('name');
            $(this).attr('name',replacefromdoublebraces(item_num))
        });
        var hiddencounter_bucket = that.prev().val();
        that.prev().val(parseInt(++hiddencounter_bucket));
         elementToClone.after(clone);
    });


    $(document).on('click','#edit_add_bucket_item',function () {
        var total_itm = parseInt($('.total_bucket_item').text());
        if(total_itm == 0){

        console.log('test');
            //Template start
        var  template =  '<div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">'
            template +=  '<div class="panel panel-col-cyan">'
            template +=  '<div class="panel-heading" role="tab" id="headingOne_1">'
            template +=  '<h4 class="panel-title">'
            template +=   '<a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="false" aria-controls="collapseOne_1" class="collapsed link-parent">'
            template +=  'Bucket Item #1'
            template +=  '</a> </h4></div>'
            template +=  '<div id="collapseOne_1" class="panel-collapse collapse bindpanel" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="false" style="height: 0px;">'
            template +=  '<div class="panel-body">'
            template +=  '<div class="row clearfix">'
            template +=  '<div class="col-sm-6 ">'
            template +=  '<label class="form-label">Bucket Item Name</label>'
            template +=  '<div class="form-group form-float">'
            template +=  '<div class="form-line">'
            template +=  '<input type="text"  name="item_name[0]" required class="set_empty form-control single-index">'
            template +=  '</div></div></div>'
            template +=  '<div class="col-sm-6 ">'
            template +=  '<label class="form-label">Bucket Item Quantity</label>'
            template +=  '<div class="form-group form-float">'
            template +=  '<div class="form-line">'
            template +=  '<input type="number" min="0" max="50" name="item_qty[0]" required class="set_empty form-control single-index">'
            template +=  '</div></div></div></div>'
            template +=  '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
            template +=  '<div class="card">'
            template +=  '<div class="header bg-blue-grey">'
            template +=  '<h2>Optionable Items<small>Define Option Item for user to select Above Mention Quantity for Bucket Item </small></h2>'
            template +=  '</div>'
            template +=  '<div class="body remove_optional">'
            template +=  '<div class="row clearfix">'
            template +=  '<div class="col-sm-6 ">'
            template +=  '<label class="form-label">Optional Item Name</label>'
            template +=  '<div class="form-group form-float">'
            template +=  '<div class="form-line">'
            template +=  '<input type="text"  name="optional_item_name[0][]" class="set_empty form-control double-index">'
            template +=  '</div></div></div>'
            template +=  '<div class="col-sm-6 ">'
            template +=  '<label class="form-label">Optional Item Price</label>'
            template +=  '<div class="form-group form-float">'
            template +=  '<div class="form-line">'
            template +=  '<input type="text"  name="optional_item_price[0][]" class="make_fillable form-control double-index">'
            template +=  '</div></div></div></div>'
            template +=  '<div class="row clearfix icon-button-demo text-right">'
            template +=  '<input type="hidden"  name="counter_optional" value="1" >'
            template +=  '<button type="button" id="add_optional_item" class="btn bg-grey btn-circle waves-effect waves-circle waves-float">'
            template +=      '<i class="material-icons">add</i>'
            template +=  '<button type="button" id="remove_optional_item" class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float">'
            template +=  '<i class="material-icons">remove</i>'
            template +=  '</button></div></div></div></div></div></div></div></div>'
                    //Template End
            var that = $(this);
            var elementToClone = that.parent().prev();
            $('.add-empty-hook').after(template);
            $('.total_bucket_item').text(total_itm + 1)




        }
        else {
            var total_itm = parseInt($('.total_bucket_item').text());
            $('.total_bucket_item').text(total_itm + 1);

            var that = $(this);
            var elementToClone = that.parent().prev();
            var clone = elementToClone.clone();
            var cloneID = clone.attr('id');
            clone.attr('id', replacestring(cloneID));
            var link_parnet = clone.find('.link-parent').attr('data-parent');
            clone.find('.link-parent').attr('data-parent',replacestring(link_parnet));
            var link_parnet = clone.find('.link-parent').attr('href');
            clone.find('.link-parent').attr('href',replacestring(link_parnet));
            var cloneitm_text = clone.find('.link-parent').text();
            clone.find('.link-parent').text(replacefromhash(cloneitm_text));
            var bind_panel = clone.find('.bindpanel').attr('id');
            clone.find('.bindpanel').attr('id',replacestring(bind_panel));
            clone.find('.set_empty').val('');
            clone.find('.make_fillable').val('0.00');
            clone.find('input[type=hidden]').val(1);
            clone.find('.removeable').remove();
            clone.find('.buk_itm_delete').remove();
            !clone.find('.remove_optional div.row').not('div.row:first').not('div.row:last').remove();
            var input_text = clone.find('.single-index').each(function () {
                var item = $(this).attr('name');
                $(this).attr('name',replacefrombraces(item))
            });

            var input_number = clone.find('.double-index').each(function () {
                var item_num = $(this).attr('name');
                $(this).attr('name',replacefromdoublebraces(item_num))
            });

            clone.find('.optional_itm_delete').each(function () {
                $(this).remove();
            });
            var hiddencounter_bucket = that.prev().val();
            that.prev().val(parseInt(++hiddencounter_bucket));
            elementToClone.after(clone);

        }
    });

        $(document).on('click','#remove_bucket_item' ,function () {
            var that = $(this);
            var hiddencounter = that.prev().prev().val();
            if(parseInt(hiddencounter) == 1){
                return false;
            }
            else {
                var elementToRemove = that.parent().prev();
                elementToRemove.remove();
                var hiddencounter = that.prev().prev().val();
                that.prev().prev().val(parseInt(--hiddencounter));
            }
        });

        $(document).on('click','#edit_remove_bucket_item' , function () {
            var that = $(this);
            var hiddencounter = that.prev().prev().val();
            if(parseInt(hiddencounter) == 1){
                return false;
            }
            else {
                var elementToRemove = that.parent().prev();
                elementToRemove.remove();
                var hiddencounter = that.prev().prev().val();
                that.prev().prev().val(parseInt(--hiddencounter));
            }
        });

    $(document).on('click','#editdelivery',function () {
        var post_code = $(this).parent().
        $('#editdeliveryModal').modal('show');
    });

    $(document).on('click','.order-details' ,function () {
        $('.content').css('opacity','0');
        $('.loading-custom').show();
        var id = $(this).attr('data-react');
       $('#userOrder').empty();

        $.ajax({
            type: "GET",
            url: APP_URL + '/get-order/' + id,
            data: id,
            success: function(data) {


                $('#orderId').val(data.id);
                $('#userName').text(data.full_name);
                $('#contact_no').text(data.phone_no);
                $('#userEmail').text(data.email);
                $('#deliveryPost').text((data.delivery_post_code == null ? '' : data.delivery_post_code));
                $('#address1').text(data.address_line1);
                $('#delivery').text((data.delivery == 1 ? 'Yes' : 'No'));
                $('#collection').text((data.collection == 1 ? 'Yes' : 'No'));
                $('#reqDelevTime').text((data.request_delivery_time == null ? '' : data.request_delivery_time));
                $('#instruction').text((data.intruction == null ? '' : data.intruction));
                $('#discountCode').text((data.discount_code == null ? '' : data.discount_code));
                $('#orderTiming').text(data.created_at);
                $('#status').text(data.status);
                $('#transcation_id').text(data.transcation_id);
                $('#your_customer_key').text((data.your_customer_key == null ? '' : data.your_customer_key));
                $('#name_of_card').text((data.name_of_card == null ? '' : data.name_of_card));
                $('#billing_post_code').text((data.billing_post_code == null ? '' : data.billing_post_code));
                $('#billing_address').text((data.billing_address == null ? '' : data.billing_address));
                 if(data.cod != null && data.cod == 'true'){
                     data.cod = 'Paid by cash';
                 }
                if(data.cod != null && data.cod == 'false'){
                    data.cod = 'Paid by card';
                }
                if(data.cod == null){
                    data.cod = '';
                }

                $('#cod').text(data.cod);
                $('#delayed_this_order').text((data.delayed_this_order == null ? '' : data.delayed_this_order));

                data.product_detail.forEach(function (value,index) {
                   var tamplate = "<li class='list-group-item'>"+value.itm_name+"<span style='float: right'>"+currency+ ' ' +value.itm_price+"</span></li>"
                    $('#userOrder').prepend(tamplate);
                });
                var delvrycharge = "<li class='list-group-item'>Delivery Charge<span style='float: right'>"+currency+ ' ' + data.delivery_charge+"</span></li>"
                $('#userOrder').append(delvrycharge);
                var fee = "<li class='list-group-item'>Transcation Fee<span style='float: right'>"+ currency+ ' ' + data.transacation_fee+"</span></li>"
                $('#userOrder').append(fee);
                var dsct= "<li class='list-group-item'>Discount<span style='float: right'>"+(data.discount == null ? '0%' : data.discount +'%')+"</span></li>"
                $('#userOrder').append(dsct);
                var ttl = "<li class='list-group-item'>Total<span style='float: right'>"+ currency+ ' ' + data.total+"</span></li>"
                $('#userOrder').append(ttl);

                $('.content').css('opacity','1');
                $('.loading-custom').hide();
                $('#order-Modal').modal('show');



            }
        });

    });

    $(document).on('click','#printOrder',function () {
        $('#orderDetails').printThis();
    });

    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    $(document).on('click','#confirmOrder',function () {

        $(this).css("opacity","0.5")
        var id = $('#orderId').val();
        swal({
                title: "Do you need extra time to prepare the order?",
                text: "Note: You can confirm the order without choosing extra time.",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Estimated Order Time",
                confirmButtonText: "Confirm",
                showLoaderOnConfirm: true,
            },
            function(inputValue){
                if (inputValue === false) return false;

                    $.ajax({
                        type: "POST",
                        url: APP_URL + '/order/confirm-order' ,
                        data: {'id':id,'_token':token,'any_delayed':inputValue},
                        success: function (data) {
                            $(this).css("opacity","1")
                            if(data.status == true){
                                window.location.href = APP_URL + '/dashboard';
                            }

                        }
                    });



              //  swal("Nice!", "You wrote: " + inputValue, "success");
            });


    });

    $(document).on('click','#rejectOrder',function () {
        var id = $('#orderId').val();
        swal({
                title: "Would you like to reject this order?",
                text: "Please give reason below",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Reason",
                showLoaderOnConfirm: true,
            },
            function(inputValue){
                if (inputValue === false) return false;

                if (inputValue === "") {
                    swal.showInputError("Please write reason for reject this order");
                    return false
                }

                $.ajax({
                    type: "POST",
                    url: APP_URL + '/order/reject-order' ,
                    data: {'id':id,'_token':token,'reason':inputValue},
                    success: function (data) {
                        $(this).css("opacity","1")
                        if(data.status == true){
                            window.location.href = APP_URL + '/dashboard';
                        }

                    }
                });


            });

    });

        $(document).on('click','.buk_itm_delete',function () {
            var itm = $(this).closest('div.panel-group');
            var total_itm = parseInt($('.total_bucket_item').text());
            $('.total_bucket_item').text(total_itm-1);
            $(this).css("opacity","0.5");
            $(this).closest('.panel-group').css("opacity","0.5");
            var itm_id = $(this).attr('data-react')
            $.ajax({
                type: "GET",
                url: APP_URL + '/product/delete-bucket-item/' + itm_id ,
                data: {'itm_id':itm_id},
                success: function (data) {
                    var total_itm = parseInt($('.total_bucket_item').text());
                    if(data.status == true){
                         itm.remove();
                       $.notify({
                            message: data.message
                        });
                        if(total_itm == 0){

                            console.log('test');
                            //Template start
                            var  template =  '<div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">'
                            template +=  '<div class="panel panel-col-cyan">'
                            template +=  '<div class="panel-heading" role="tab" id="headingOne_1">'
                            template +=  '<h4 class="panel-title">'
                            template +=   '<a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="false" aria-controls="collapseOne_1" class="collapsed link-parent">'
                            template +=  'Bucket Item #1'
                            template +=  '</a> </h4></div>'
                            template +=  '<div id="collapseOne_1" class="panel-collapse collapse bindpanel" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="false" style="height: 0px;">'
                            template +=  '<div class="panel-body">'
                            template +=  '<div class="row clearfix">'
                            template +=  '<div class="col-sm-6 ">'
                            template +=  '<label class="form-label">Bucket Item Name</label>'
                            template +=  '<div class="form-group form-float">'
                            template +=  '<div class="form-line">'
                            template +=  '<input type="text"  name="item_name[0]" required class="set_empty form-control single-index">'
                            template +=  '</div></div></div>'
                            template +=  '<div class="col-sm-6 ">'
                            template +=  '<label class="form-label">Bucket Item Quantity</label>'
                            template +=  '<div class="form-group form-float">'
                            template +=  '<div class="form-line">'
                            template +=  '<input type="number" min="0" max="50" name="item_qty[0]" required class="set_empty form-control single-index">'
                            template +=  '</div></div></div></div>'
                            template +=  '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
                            template +=  '<div class="card">'
                            template +=  '<div class="header bg-blue-grey">'
                            template +=  '<h2>Optionable Items<small>Define Option Item for user to select Above Mention Quantity for Bucket Item </small></h2>'
                            template +=  '</div>'
                            template +=  '<div class="body remove_optional">'
                            template +=  '<div class="row clearfix">'
                            template +=  '<div class="col-sm-6 ">'
                            template +=  '<label class="form-label">Optional Item Name</label>'
                            template +=  '<div class="form-group form-float">'
                            template +=  '<div class="form-line">'
                            template +=  '<input type="text"  name="optional_item_name[0][]" class="set_empty form-control double-index">'
                            template +=  '</div></div></div>'
                            template +=  '<div class="col-sm-6 ">'
                            template +=  '<label class="form-label">Optional Item Price</label>'
                            template +=  '<div class="form-group form-float">'
                            template +=  '<div class="form-line">'
                            template +=  '<input type="text"  name="optional_item_price[0][]" class="set_empty form-control double-index">'
                            template +=  '</div></div></div></div>'
                            template +=  '<div class="row clearfix icon-button-demo text-right">'
                            template +=  '<input type="hidden"  name="counter_optional" value="1" >'
                            template +=  '<button type="button" id="add_optional_item" class="btn bg-grey btn-circle waves-effect waves-circle waves-float">'
                            template +=      '<i class="material-icons">add</i>'
                            template +=  '<button type="button" id="remove_optional_item" class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float">'
                            template +=  '<i class="material-icons">remove</i>'
                            template +=  '</button></div></div></div></div></div></div></div></div>'
                            //Template End
                            var that = $(this);
                            var elementToClone = that.parent().prev();
                            $('.add-empty-hook').after(template);




                        }
                    }

                }
            });
        });

        $(document).on('click','.optional_itm_delete',function () {
            var temp_sle = $(this).closest('.remove_optional');
            var count = temp_sle.children('div.row').length
            if(count - 1 == 1){
                swal("Can not delete optional item At least one item must on bucket item");
                return false;
            }
            var opt_itm = $(this).closest('div.row')
            opt_itm.css("opacity","0.3");
            var related_id= opt_itm.attr('data-react');
            $.ajax({
                type: "GET",
                url: APP_URL + '/product/delete-bucket-related-item/' + related_id,
                data: {'related_itm_id':related_id},
                success: function (data){
                    var total_itm = parseInt($('.total_bucket_item').text());
                    if(data.status == true) {
                        opt_itm.remove();
                        $.notify({
                            message: data.message
                        });
                    }
                }
            });
        });

        $(document).on('click','.extra_itm_delete' ,function () {
            var extra_itm = $(this).closest('div.row')
            extra_itm.css("opacity","0.3");
            var extra_itm_id= extra_itm.attr('data-react');
            $('#item_counter').val(parseInt($('#item_counter').val()) - 1);

            $.ajax({
                type: "GET",
                url: APP_URL + '/product/delete-product-extra-item/' + extra_itm_id,
                data: {'extra_itm_id':extra_itm_id},
                success: function (data){
                     if(data.status == true) {
                         var trace = $('#extra_controls');
                         var trace_counter = parseInt(trace.attr('data-trace') - 1);
                         trace.attr('data-trace',trace_counter);

                         extra_itm.remove();
                        var count = parseInt($('#item_counter').val());
                         if(count == 0){
                         var template = '<div class="row clearfix">'
                             template +=  '<div class="col-sm-5"><label class="form-label">Extra Item'
                             template +=  'Name</label>'
                             template +=  '<div class="form-group form-float">'
                             template +=  '<div class="form-line focused">'
                             template +=  '<input type="text" name="extra_item_name[]" class="form-control double-index">'
                             template +=  '</div></div></div><div class="col-sm-5"><label class="form-label">Extra Item Price</label>'
                             template +=  '<div class="form-group form-float">'
                             template +=  '<div class="form-line focused">'
                             template +=      '<input type="text" name="extra_item_price[]" class="form-control double-index">'
                             template +=  '</div></div></div>'
                             template +=  '<div class="col-sm-2">'
                             template +=  '</div></div>'

                            $('.remove_optional').prepend(template);
                         }

                         $.notify({
                            message: data.message
                        });
                    }
                }
            });
        });

        $(document).on('click','#add_extra' ,function () {
            var check = $(this).prev().val();
            if(check == 0){
                $(this).prev().val(++check);
              var template1 =  '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 removablehook">'
                template1 +=   '<div class="card">'
                template1 +=   '<div class="header bg-blue-grey">'
                template1 +=   '<h2>Extra Items<small>Define Extra item related to Above Item</small></h2>'
                template1 +=   '</div>'
                template1 +=    '<div class="body remove_optional">'
                template1 +=   '<div class="row clearfix">'
                template1 +=   '<div class="col-sm-6">'
                template1 +=   '<label class="form-label">Extra Item Name</label>'
                template1 +=   '<div class="form-group form-float">'
                template1 +=   '<div class="form-line">'
                template1 +=  '<input type="text"  name="extra_item_name[]" class="form-control double-index">'
                template1 += '</div></div></div>'
                template1 +=   '<div class="col-sm-6 ">'
                template1 +=   '<label class="form-label">Extra Item Price</label>'
                template1 +=   '<div class="form-group form-float">'
                template1 +=   '<div class="form-line">'
                template1 +=   '<input type="text"  name="extra_item_price[]" class="form-control double-index">'
                template1 +='</div></div></div></div>'
                template1 +=   '<div class="row clearfix icon-button-demo text-right">'
                template1 +=   '<input type="hidden"  name="counter_optional" value="1" >'
                template1 +=   '<button type="button" id="add_optional_item" class="btn bg-grey btn-circle waves-effect waves-circle waves-float">'
                template1 +=   '<i class="material-icons">add</i>'
                template1 +=   '<button type="button" id="remove_optional_item" class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float">'
                template1 +=   '<i class="material-icons">remove</i>'
                template1 +=   '</button></div></div></div>'

                $('.extra_add_form').append(template1);
                
            }
        });

    $(document).on('click','#remove_extra' ,function () {
        var check = $(this).prev().prev().val();
        if(check > 0){
            $(this).prev().prev().val(--check);
            $('.removablehook').remove();
        }
    })

    $(document).on('click','.delete_product',function () {
        var pro_id = $(this).attr('data-pro-id');
        swal({
                title: "Are you sure?",
                text: "The item you choose to delete will delete all of your item variant to and their extras You will not be able to recover this Item!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: true,
                showLoaderOnConfirm: true,
            },
            function(isConfirm){
                if (isConfirm) {

                    $.ajax({
                        type: "GET",
                        url: APP_URL + '/product/delete-item/' + pro_id,
                        data: {'pro_id':pro_id},
                        success: function (data){
                            if(data.status == true) {
                                window.location.href = APP_URL + '/product/view-all-product';
                            }
                            if(data.status == true){
                                swal("Cancelled",data.message , "error");
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your Item file is safe :)", "error");
                }
            });


    });

        $(document).on('click' ,'.delete_bucket_product',function () {
            var pro_id = $(this).attr('data-pro-id');
            swal({
                    title: "Are you sure?",
                    text: "The item you choose to delete will delete your Bucket their Items and Related Items You will not be able to recover this Whole Bucket!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: true,
                    showLoaderOnConfirm: true,
                },
                function(isConfirm){
                    if (isConfirm) {

                        $.ajax({
                            type: "GET",
                            url: APP_URL + '/product/delete-bucket/' + pro_id,
                            data: {'pro_id':pro_id},
                            success: function (data){
                                if(data.status == true) {
                                    window.location.href = APP_URL + '/product/view-bucket-product';
                                }
                                if(data.status == true){
                                    swal("Cancelled",data.message , "error");
                                }
                            }
                        });
                    } else {
                        swal("Cancelled", "Your Item file is safe :)", "error");
                    }
                });

        })



    $(document).on('click' ,'.delete_delivery_info',function () {
        var deli_id = $(this).attr('data-react-id');
        swal({
                title: "Are you sure?",
                text: "You want to delete these Delivery Detail You will not be able to recover this Later!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: true,
                showLoaderOnConfirm: true,
            },
            function(isConfirm){
                if (isConfirm) {

                    $.ajax({
                        type: "GET",
                        url: APP_URL + '/delete-delivery-detail/' + deli_id,
                        data: {'deli_id':deli_id},
                        success: function (data){
                            if(data.status == true) {
                                window.location.href = APP_URL + '/about-us';
                            }
                            if(data.status == true){
                                swal("Cancelled",data.message , "error");
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your Item file is safe :)", "error");
                }
            });

    })


    $(document).on('click' ,'.delete_coupon',function () {
        var coupon_id = $(this).attr('data-react-id');
        swal({
                title: "Are you sure?",
                text: "You want to delete these Coupon You will not be able to recover this Later!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: true,
                showLoaderOnConfirm: true,
            },
            function(isConfirm){
                if (isConfirm) {

                    $.ajax({
                        type: "GET",
                        url: APP_URL + '/delete-coupon/' + coupon_id,
                        data: {'coupon_id':coupon_id},
                        success: function (data){
                            if(data.status == true) {
                                window.location.href = APP_URL + '/add-coupon';
                            }
                            if(data.status == true){
                                swal("Cancelled",data.message , "error");
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your Coupon is safe :)", "error");
                }
            });

    })


    $(document).on('click' ,'.change_coupon_status',function () {
        var coupon_id = $(this).attr('data-react-id');
        var coupon_status = $(this).attr('data-status');
        swal({
                title: "Are you sure?",
                text: "You want to change Coupon Status",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, change it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: true,
                showLoaderOnConfirm: true,
            },
            function(isConfirm){
                if (isConfirm) {

                    $.ajax({
                        type: "GET",
                        url: APP_URL + '/change-coupon-status/' + coupon_id +'/'+ coupon_status,
                        data: {'coupon_id':coupon_id,'coupon_status':coupon_status},
                        success: function (data){
                            if(data.status == true) {
                                window.location.href = APP_URL + '/add-coupon';
                            }
                            else{
                                swal("Cancelled",data.message , "error");
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your status is not Change :)", "error");
                }
            });

    })




});