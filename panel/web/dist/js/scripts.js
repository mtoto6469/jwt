(function ($) {
    "use strict";
    $(document).ready(function () {

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var taget_id = $(e.target).attr('href');
            var input = $(taget_id).find('input[type="radio"], input[type="checkbox"]');
            if(input.length){
                input.prop('checked', true);
            }
        })

        $(document).ready(function () {
            sum_payment_checked()
        });
        $('[data-sum-change-value]').change(function () {
            sum_payment_checked()
        });
        function sum_payment_checked() {
            var sum;
            var checked_value;
            sum = 0;
            $('[data-sum-change-value]:checked').each(function () {
                checked_value = parseInt($(this).attr('data-sum-change-value'));
                sum = sum + checked_value;
            });
            sum = sum.formatMoney();
            $('.sum_value').text(sum + ' تومان');
        }

        Number.prototype.formatMoney = function (c = 0, d = '.', t = ',') {
            var n = this,
                c = isNaN(c = Math.abs(c)) ? 2 : c,
                d = d == undefined ? "," : d,
                t = t == undefined ? "." : t,
                s = n < 0 ? "-" : "",
                i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
                j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
        };

        if ($('#ckeditor-article').length) {
            CKEDITOR.replace('ckeditor', {
                customConfig: 'config.js',
            });
        }

        $('[data-ajax]').click(function () {
            var dataarea = $(this).attr('data-ajax');
            dataarea = $(dataarea).find('.ajax-data-area');
            var url = $(this).attr('data-url');

            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function (xhr) {
                    $(dataarea).addClass('loading');
                }
            })
                .done(function (data) {
                    var content = $('<div>').append(data).find('#page-content').html();
                    $(dataarea).html(content);
                })
                .fail(function () {
                    alert("error on request");
                })
                .always(function () {
                    $(dataarea).removeClass('loading');
                    if ($('#content').length) {
                        window.setTimeout(
                            function () {
                                CKEDITOR.replace('content');
                            },
                            500
                        );
                    }
                })
        });


        // click on calendar
        // if($('.calendar').length){
        //
        // }

        // Bootstrap
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();
        // automaxheight();
        $(".js-scroll").mCustomScrollbar({
            theme: "dark",
            // scrollbarPosition: "outside"
        });

        $('a.tasklist-item').on('shown.bs.tab', function (e) {
            $(".js-scroll").mCustomScrollbar({
                theme: "dark",
            });
        })

        $('.radio-select').click(function () {
            $(this).parents('.radio-select-group').find('.radio-select').removeClass('active');
            $(this).addClass('active');
            $(this).find('input[type="radio"]').prop('checked', true);
        });

        /*
        ticket file add file input
         */
        $('#addticket_file').click(function () {
            var len = $('#ticket_file_area input').length;
            var html = $('#fileinput-template').clone();
            html.find('input[name="attachment-temp[]"]').attr('name', 'attachment[]');
            if (len < 5) {
                $('#ticket_file_area').append(html.html());
            }
        });

        $('.slick-today-downloads').slick({
            rtl: true,
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 2,
            centerMode: true,
            responsive: [
                {
                    breakpoint: 1600,
                    settings: {
                        slidesToShow: 8,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        // $('.set-websitetask-status').click(function (e) {
        //     var href = $(this).attr('href');
        //     var parenttask = $(this).attr('data-parent-task');
        //
        //     singlerequest(href);
        //
        //     if($(this).hasClass('done')){
        //         href = href.replace('/done/','/undone/');
        //         $(this).find('.undone').removeClass('d-none');
        //         $(this).find('.done').addClass('d-none');
        //         $(this).removeClass('done');
        //         $(this).addClass('undone');
        //         $(this).removeClass('btn-outline-warning');
        //         $(this).addClass('btn-outline-dark');
        //         $(parenttask).removeClass('undone');
        //         $(parenttask).addClass('done');
        //     }else{
        //         href = href.replace('/undone/','/done/');
        //         $(this).find('.done').removeClass('d-none');
        //         $(this).find('.undone').addClass('d-none');
        //         $(this).removeClass('undone');
        //         $(this).addClass('done');
        //         $(this).removeClass('btn-outline-dark');
        //         $(this).addClass('btn-outline-warning');
        //         $(parenttask).removeClass('done');
        //         $(parenttask).addClass('undone');
        //     }
        //     $(this).attr('href', href);
        //
        //     e.preventDefault();
        //     e.stopPropagation();
        // });
    });

})(jQuery);

/*
chart global settings
 */

// Chart.defaults.global.defaultFontColor = "#fff";
Chart.defaults.global.animation.duration = 1500;
Chart.defaults.global.defaultFontFamily = "IRANSansFaNum"
Chart.defaults.global.legend.labels.fontFamily = "IRANSansFaNum"
Chart.defaults.global.legend.labels.boxWidth = 10
// Chart.defaults.global.legend.labels.generateLabels.lineWidth = 0
Chart.defaults.global.tooltips.backgroundColor = 'rgba(0, 0, 0, 0.6)';
Chart.defaults.global.tooltips.xPadding = 10;
Chart.defaults.global.tooltips.yPadding = 10;
// Chart.defaults.line.spanGaps = true;


var chart_global_options = {
    scaleOverride : true,
    scaleSteps : 10,
    scaleStepWidth : 50,
    scaleStartValue : 0,
    maintainAspectRatio: false,
    showDatapoints: true,
    legend: {
        position: 'bottom',
        labels: {
            fontColor: '#eeeeee'
        }
    },
    title: {
        display: false,
    },
    layout: {
        padding: {
            left: 10,
            right: 0,
            top: 0,
            bottom: 0
        }
    },
    scales: {
        xAxes: [{
            position: 'right',
            gridLines: {
                drawBorder: false,
                display: false
            },
            ticks: {
                display: false //this will remove only the label
            }
        }],
        yAxes: [{
            position: 'right', //<-- set this
            gridLines: {
                drawBorder: false,
                display: false
            },
            ticks: {
                max: 99999991,
                display: false //this will remove only the label
            }
        }]
    }
}


function automaxheight() {
    var element = $('[data-maxheight]');

    for (i = 0; i <= $(element).length; i++) {
        if ($(element[i]).attr('data-autoheight-device') == 'xs' && $(window).width() > 768) return;
        parentelement = $(element[i]).attr('data-maxheight');
        $(element[i]).css('max-height', $(parentelement).height());
    }
}

function insertimgtoeditor(filearea, ckeditor = 'ckeditor-article', src = '', modalid = '') {

    var html;
    var file = $('#' + filearea).find('.filepond--file-wrapper').find('input[type="hidden"]');

    if (!$(file).length) {
        alert('فایل انتخاب نشده است');
        return;
    }
    file = $(file).val();

    if (file == '') {
        alert('فایل آپلود نشده');
    } else {
        var html = '<img src="' + src + "/" + file + '" class="ckeditorimg taskitem-img img-responsive img-fluid" width="600" />'
        CKEDITOR.instances[ckeditor].insertHtml(html);
        ckeditorpond.removeFiles();
        $(modalid).modal('hide');
    }
}

function load_calendar(url) {
    $.ajax({
        url: url,
        type: 'GET',
        beforeSend: function (xhr) {
            $('#website-tasks-area').addClass('loading');
        }
    })
        .done(function (data) {
            var content = $('<div>').append(data).find('#website-tasks-area').html();
            $('#website-tasks-area').html(content);
        })
        .fail(function () {
            alert("error on request");
        })
        .always(function () {
            $('#website-tasks-area').removeClass('loading');
        })
}

function singlerequest(url) {
    $.ajax({
        url: url,
    })
        .done(function (data) {
        })
        .fail(function () {
            alert("error on request");
        })
}

function set_task_status(element) {
    var href = $(element).attr('href');
    var parenttask = $(element).attr('data-parent-task');

    singlerequest(href);

    if ($(element).hasClass('done')) {
        href = href.replace('/done/', '/undone/');
        $(element).find('.undone').removeClass('d-none');
        $(element).find('.done').addClass('d-none');
        $(element).removeClass('done');
        $(element).addClass('undone');
        $(element).removeClass('btn-outline-warning');
        $(element).addClass('btn-outline-dark');
        $(parenttask).removeClass('undone');
        $(parenttask).addClass('done');
    } else {
        href = href.replace('/undone/', '/done/');
        $(element).find('.done').removeClass('d-none');
        $(element).find('.undone').addClass('d-none');
        $(element).removeClass('undone');
        $(element).addClass('done');
        $(element).removeClass('btn-outline-dark');
        $(element).addClass('btn-outline-warning');
        $(parenttask).removeClass('done');
        $(parenttask).addClass('undone');
    }

    return href;
}

function set_waiting_for_browse(media_item_id) {
    $('.media-browser').attr('data-wait-for-file', false)
    $('#' + media_item_id).attr('data-wait-for-file', true);
}

function set_media_browse_input_value() {
    var selected_media_id;
    selected_media_id = $(".modal-media-browser iframe").contents().find(".media-browse-list").find('.media-item.active').attr('data-fileid');
    selected_media_name = $(".modal-media-browser iframe").contents().find(".media-browse-list").find('.media-item.active').attr('data-file-name');
    selected_media_url = $(".modal-media-browser iframe").contents().find(".media-browse-list").find('.media-item.active').attr('data-file-url');
    selected_media_thumbnail = $(".modal-media-browser iframe").contents().find(".media-browse-list").find('.media-item.active').attr('data-img-thumbnail');

    // if(selected_media_thumbnail != ''){
    //     $('.media-browser[data-wait-for-file="true"]').find('.img-holder').html('<img src="'+selected_media_thumbnail+'" class="img-fluid img-thumbnail mb-2" />');
    // }else{
    //     $('.media-browser[data-wait-for-file="true"]').find('.img-holder').html('');
    // }

    $('.media-browser[data-wait-for-file="true"]').find('.txt-holder').html(selected_media_name);
    $('.media-browser[data-wait-for-file="true"]').find('.txt-id').val(selected_media_id);
    $('.media-browser[data-wait-for-file="true"]').find('.txt-filename').val(selected_media_name);

    $('#media-panel').modal('hide');
    return true;
}

function count_down_timer(element_id, time, now, day_title ='روز', hours_title='ساعت', minute_title = 'دقیقه', seconds_title = 'ثانیه') {
    time = new Date();
    time = time.setDate(time)
    now = new Date();
    now = now.setDate(now);
    var difference = time.getTime() - now.getTime();

    if (difference <= 0) {
        // Timer done
        clearInterval(timer);
    } else {

        var seconds = Math.floor(difference / 1000);
        var minutes = Math.floor(seconds / 60);
        var hours = Math.floor(minutes / 60);
        var days = Math.floor(hours / 24);

        hours %= 24;
        minutes %= 60;
        seconds %= 60;

        output = '';

        if(days) output += days + " " + day_title + " ";
        if(hours) output += hours + " " + hours_title + " ";
        if(minutes) output += minutes + " " + minute_title + " ";
        if(seconds) output += seconds + " " + seconds_title + " ";

        $(element_id).text(output);
    }
}

var timer;

var compareDate = new Date();
compareDate.setDate(compareDate.getDate() + 3); //just for this demo today + 7 days

timer = setInterval(function() {
    timeBetweenDates(compareDate);
}, 1000);

function timeBetweenDates(toDate) {
    var dateEntered = toDate;
    var now = new Date();
    var difference = dateEntered.getTime() - now.getTime();

    if (difference <= 0) {

        // Timer done
        clearInterval(timer);

    } else {

        var seconds = Math.floor(difference / 1000);
        var minutes = Math.floor(seconds / 60);
        var hours = Math.floor(minutes / 60);
        var days = Math.floor(hours / 24);

        hours %= 24;
        minutes %= 60;
        seconds %= 60;

        $("#days").text(days);
        $("#hours").text(hours);
        $("#minutes").text(minutes);
        $("#seconds").text(seconds);
    }
}