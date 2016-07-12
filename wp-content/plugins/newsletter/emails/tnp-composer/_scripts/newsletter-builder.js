$.fn.hover_edit = function () {

    this.hover(
            function () {
                $(this).append('<div class="tnpc-row-edit-hover"><i class="fa fa-pencil" style="line-height:30px;"></i></div>');
                $(".tnpc-row-edit-hover").click(function (e) {
                    e.preventDefault()
                });
                $(".tnpc-row-edit-hover i").click(function (e) {
                    e.preventDefault();
                    target = $(this).parent().parent();

                    //edit image
                    if (target.attr("data-type") == 'image') {
                        $("#tnpc-edit-image .image").val(target.find('img').attr("src"));
                        $("#tnpc-edit-image .url").val(target.find('a').attr("href"));
                        $("#tnpc-edit-image").fadeIn(500);
                        $("#tnpc-edit-image .tnpc-edit-box").slideDown(500);
                        $("#tnpc-edit-image .tnpc-edit-box-buttons-save").click(function () {
                            $(this).parent().parent().parent().fadeOut(500)
                            $(this).parent().parent().slideUp(500)
                            target.find('img').attr("src", $("#tnpc-edit-image .image").val());
                            target.find('a').attr("href", $("#tnpc-edit-image .url").val());
                        });
                    }

                    //edit link
                    if (target.attr("data-type") == 'link') {
                        $("#tnpc-edit-link .title").val(target.text());
                        $("#tnpc-edit-link .url").val(target.attr("href"));
                        $("#tnpc-edit-link").fadeIn(500);
                        $("#tnpc-edit-link .tnpc-edit-box").slideDown(500);
                        $("#tnpc-edit-link .tnpc-edit-box-buttons-save").click(function () {
                            $(this).parent().parent().parent().fadeOut(500)
                            $(this).parent().parent().slideUp(500)
                            target.text($("#tnpc-edit-link .title").val());
                            target.attr("href", $("#tnpc-edit-link .url").val());
                        });
                    }

                    //edit button
                    if (target.attr("data-type") == 'button') {
                        $("#tnpc-edit-button .title").val(target.text());
                        $("#tnpc-edit-button .url").val(target.attr("href"));
                        $('.bgcolor, .fgcolor').wpColorPicker({
                            //                change: function (event, ui) {
                            //                    $('.bgcolor').iris('hide');
                            //                },
                        });
                        $('.bgcolor').wpColorPicker().iris('color', target.css("background-color"));
                        $('.fgcolor').wpColorPicker().iris('color', target.css("color"));
                        $("#tnpc-edit-button").fadeIn(500);
                        $("#tnpc-edit-button .tnpc-edit-box").slideDown(500);
                        $("#tnpc-edit-button .tnpc-edit-box-buttons-save").click(function () {
                            $(this).parent().parent().parent().fadeOut(500)
                            $(this).parent().parent().slideUp(500)
                            target.text($("#tnpc-edit-button .title").val());
                            target.attr("href", $("#tnpc-edit-button .url").val());
                            target.css("color", $("#tnpc-edit-button .fgcolor").val());
                            target.css("background-color", $("#tnpc-edit-button .bgcolor").val());
                            target.css("border-color", $("#tnpc-edit-button .bgcolor").val());
                        });
                    }

                    //edit title
                    if (target.attr("data-type") == 'title') {
                        $("#tnpc-edit-title .title").val(target.text());
                        $("#tnpc-edit-title .color").val(target.css("color"));
                        $("#tnpc-edit-title .color").wpColorPicker({
                            //                change: function (event, ui) {
                            //                    $('.bgcolor').iris('hide');
                            //                },
                        });
                        $("#tnpc-edit-title .color").wpColorPicker().iris('color', target.css("color"));
                        $("#tnpc-edit-title").fadeIn(500);
                        $("#tnpc-edit-title .tnpc-edit-box").slideDown(500);
                        $("#tnpc-edit-title .tnpc-edit-box-buttons-save").click(function () {
                            $(this).parent().parent().parent().fadeOut(500)
                            $(this).parent().parent().slideUp(500)
                            target.text($("#tnpc-edit-title .title").val());
                            target.css("color", $("#tnpc-edit-title .color").val());
                        });
                    }

                    //edit text
                    if (target.attr("data-type") == 'text') {
                        $("#tnpc-edit-text .text").val(target.text());
                        tinymce.init({
                            selector: '#tnpc-edit-text .text',
                            menubar: false,
                            toolbar: [
                                'fontselect fontsizeselect forecolor | bold italic underline | link | bullist numlist | emoticons | alignleft aligncenter alignright alignjustify tnp'
                            ],
                            plugins: "textcolor,link,emoticons",
                            init_instance_callback: function (editor) {
                                editor.setContent(target.html());
                            },
                            elementpath: false,
                            statusbar: false,
                            forced_root_block: false,
                            font_formats: "Arial=arial,helvetica,sans-serif" +
                                    "Arial Black=arial black,avant garde;" +
                                    "Tahoma=tahoma,arial,helvetica,sans-serif;" +
                                    "Trebuchet MS=trebuchet ms,geneva;" +
                                    "Verdana=verdana,geneva;" +
                                    "Georgia=georgia,palatino;" +
                                    "Times=times,times new roman;" +
                                    "Times New Roman=times new roman,times;" +
                                    "Courier=courier,courier new;" +
                                    "Courier New=courier new,courier",
                            setup: function (editor) {
                                editor.addButton('tnp', {
                                    type: 'menubutton',
                                    image: tinymce.baseURL + '/skins/tnp.png',
                                    menu: [
                                        {text: '{blog_url}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{blog_url}&nbsp;');}},
                                        {text: '{blog_title}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{blog_title}&nbsp;');}},
                                        {text: '{blog_description}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{blog_description}&nbsp;');}},
                                        {text: '{date}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{date}&nbsp;');}},
                                        {text: '{date_NNN}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{date_NNN}&nbsp;');}},
                                        {text: '{email_url}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{email_url}&nbsp;');}},
                                        {text: '{name}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{name}&nbsp;');}},
                                        {text: '{surname}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{surname}&nbsp;');}},
                                        {text: '{title}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{title}&nbsp;');}},
                                        {text: '{email}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{email}&nbsp;');}},
                                        {text: '{profile_N}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{profile_N}&nbsp;');}},
                                        {text: '{ip}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{ip}&nbsp;');}},
                                        {text: '{subscription_confirm_url}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{subscription_confirm_url}&nbsp;');}},
                                        {text: '{unsubscription_confirm_url}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{unsubscription_confirm_url}&nbsp;');}},
                                        {text: '{profile_url}', onclick: function () {console.log(this.text); editor.insertContent('&nbsp;{profile_url}&nbsp;');}},
                                    ],
                                });
                            },
                        });
                        if (tinymce.activeEditor != null)
                            tinymce.activeEditor.setContent(target.html());
                        $("#tnpc-edit-text").fadeIn(500);
                        $("#tnpc-edit-text .tnpc-edit-box").slideDown(500);
                        $("#tnpc-edit-text .tnpc-edit-box-buttons-save").click(function () {
                            $(this).parent().parent().parent().fadeOut(500)
                            $(this).parent().parent().slideUp(500)
                            target.html(tinymce.activeEditor.getContent());
                        });
                    }

                    //edit icon
                    if (target.attr("data-type") == 'icon') {
                        $("#tnpc-edit-icon").fadeIn(500);
                        $("#tnpc-edit-icon .tnpc-edit-box").slideDown(500);
                        $("#tnpc-edit-icon i").click(function () {
                            $(this).parent().parent().parent().parent().fadeOut(500)
                            $(this).parent().parent().parent().slideUp(500)
                            target.children('i').attr('class', $(this).attr('class'));
                        });
                    }//

                });
            }, function () {
        $(this).children(".tnpc-row-edit-hover").remove();
    }
    );
}

$.fn.add_delete = function () {
    this.append('<div class="tnpc-row-delete"><i class="fa fa-times" ></i></div>');
    this.find('.tnpc-row-delete').perform_delete();
}

$.fn.perform_delete = function () {
    this.click(function () {
        $(this).parent().remove();
    });
}

$.fn.add_block_edit = function () {
    this.append('<div class="tnpc-row-edit-block"><i class="fa fa-pencil" ></i></div>');
    this.find('.tnpc-row-edit-block i').perform_block_edit();
}

$.fn.perform_block_edit = function () {

    $(".tnpc-row-edit-block").click(function (e) {
        e.preventDefault()
    });

    this.click(function (e) {

        e.preventDefault();

        target = $(this).parent().parent().find('.edit-block');

        $("#tnpc-edit-block .bgcolor").val(target.css("background-color"));
        $("#tnpc-edit-block .font").val(target.css("font-family"));

        $('.bgcolor').wpColorPicker({
//                change: function (event, ui) {
//                    $('.bgcolor').iris('hide');
//                },
        });
        $('.bgcolor').wpColorPicker().iris('color', target.css("background-color"));

        // posts block
        if ($(this).parent().parent().hasClass('tnpc-row-posts')) {

            $("#tnpc-edit-posts").fadeIn(500);
            $("#tnpc-edit-posts .tnpc-edit-box").slideDown(500);

        } else {

            $("#tnpc-edit-block").fadeIn(500);
            $("#tnpc-edit-block .tnpc-edit-box").slideDown(500);

        }

        $("#tnpc-edit-block .tnpc-edit-box-buttons-save").click(function () {
            $(this).parent().parent().parent().fadeOut(500)
            $(this).parent().parent().slideUp(500)

            target.css("background-color", $("#tnpc-edit-block .bgcolor").val());
            target.css("font-family", $("#tnpc-edit-block .font").val());

        });

        $("#tnpc-edit-posts .tnpc-edit-box-buttons-save").click(function () {

            $(this).parent().parent().parent().fadeOut(500)
            $(this).parent().parent().slideUp(500)
            var categories = [];
            $('#tnpc-edit-posts input[name="options[theme_categories][]"]:checked').each(function ()
            {
                categories.push($(this).val());
            });
            var data = {
                'action': 'tnpc_render',
                'b': target.parent().parent().parent().data('block'),
                'num': $("#tnpc-edit-posts .number").val(),
                'tags': $("#tnpc-edit-posts .tags").val(),
                'categories': categories
            };
            $.post(ajaxurl, data, function (response) {
                new_row = $(response);
                target.parent().before(new_row).remove();
                new_row.add_delete();
                new_row.add_block_edit();
                new_row.find(".tnpc-row-edit").hover_edit();
            });
        });

    });

}

$(function () {

    // collapse wp menu
    $('body').addClass('folded');

//Drag & Drop
    $("#newsletter-builder-area-center-frame-content").sortable({
        revert: false,
        stop: function (event, ui) {
            if (ui.item.hasClass("newsletter-sidebar-buttons-content-tab")) {
                loading_row = $('<div style="text-align: center; padding: 20px; background-color: #d4d5d6; color: #52BE7F;"><i class="fa fa-cog fa-2x fa-spin" /></div>');
                ui.item.before(loading_row);
                ui.item.remove();
                var data = {
                    'action': 'tnpc_render',
                    'b': ui.item.data("file")
                };
                $.post(ajaxurl, data, function (response) {
                    new_row = $(response);
//                    ui.item.before(new_row);
//                    ui.item.remove();
                    loading_row.before(new_row);
                    loading_row.remove();
                    new_row.add_delete();
                    new_row.add_block_edit();
                    new_row.find(".tnpc-row-edit").hover_edit();
                });
            }
        }
    });

    $(".tnpc-row").draggable({
        connectToSortable: "#newsletter-builder-area-center-frame-content",
        //helper: "clone",
        revert: false,
        handle: ".tnpc-row-move"
    });

    $(".newsletter-sidebar-buttons-content-tab").draggable({
        connectToSortable: "#newsletter-builder-area-center-frame-content",
        helper: "clone",
        revert: false,
        start: function () {
            if ($('.tnpc-row').length)
                $('.tnpc-row').append('<div class="tnpc-drop-here">Drag&Drop blocks here!</div>');
            else
                $('#newsletter-builder-area-center-frame-content').append('<div class="tnpc-drop-here">Drag&Drop blocks here!</div>');
        },
        stop: function () {
            $('.tnpc-drop-here').remove();
        }
    });

//close edit
    $(".tnpc-edit-box-buttons-cancel").click(function () {
        $(this).parent().parent().parent().fadeOut(500)
        $(this).parent().parent().slideUp(500)
    });

// initialize controls
    $(".tnpc-row").add_delete();
    $(".tnpc-row").add_block_edit();
    $(".tnpc-row-edit").hover_edit();

});

function create() {

    $("#newsletter-preloaded-export").html($("#newsletter-builder-area-center-frame-content").html());

    $("#newsletter-preloaded-export .tnpc-row-delete").remove();
    $("#newsletter-preloaded-export .tnpc-row-edit-block").remove();
    $("#newsletter-preloaded-export .tnpc-row").removeClass("ui-draggable");
//    $("#newsletter-preloaded-export .tnpc-row-edit").removeAttr("data-type");
//    $("#newsletter-preloaded-export .tnpc-row-edit").removeClass("tnpc-row-edit");
    preload_export_html = $("#newsletter-preloaded-export").html();

    if (preload_export_html.indexOf('<style type="text/css">') > -1) {
        export_content = preload_export_html;
        $("#tnpc-edit-export .text").val(export_content);
        $('#tnpc-form input[name="options[body]"]').attr('value', export_content);
        $("#tnpc-form").submit();
    } else {
        $.get(ajaxurl, {action: "tnpc_css"}, function (data) {
//        export_content = '<style>' + data + '</style><link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic" rel="stylesheet" type="text/css"><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"><div id="tnpc-wrapper"><div id="tnpc-wrapper-newsletter">' + preload_export_html + '</div></div>';
            export_content = '<!DOCTYPE html><html><head><title>Newsletter</title><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge" />';
            export_content += '<style type="text/css">' + data + '</style>';
            export_content += '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic" rel="stylesheet" type="text/css">';
            export_content += '<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">';
            export_content += '</head><body style="margin: 0; padding: 0;">';
            export_content += preload_export_html;
            export_content += '</body></html>';
            $("#tnpc-edit-export .text").val(export_content);
            $('#tnpc-form input[name="options[body]"]').attr('value', export_content);
            $("#tnpc-form").submit();
        });
    }

    $("#newsletter-preloaded-export").html(' ');

}

