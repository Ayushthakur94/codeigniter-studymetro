$(document).ready(function () {

    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        loadingInner: '', // e.g '<img src="loading.svg" />'
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: ['animation-duration', '-webkit-animation-duration'],
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'body',
        transition: function (url) { window.location.href = url; }
    });

    $('.select_box').click(function (e) {
        $('.indicator').not(this).removeClass('rotate');
        $(this).stop(true, true).toggleClass("rotate");
    });

    $("#video_slider").owlCarousel({
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        items: 1,
        dots: true,
        loop: true,
        autoplay: true,
        singleItem: true
    });

    $('[data-toggle="tooltip"]').tooltip();

    $("#testimonial_slider").owlCarousel({
        navigation: true,
        slideSpeed: 200,
        paginationSpeed: 800,
        items: 1,
        dots: false,
        loop: true,
        autoplay: true,
        autoHeight:true,
        singleItem: true
    });

    $('body').on('change', '.select_country', function () {
        var country = $(this).val();
        getUniversities(country, true, '');
    }); 

    $('.BSSorting').bootstrapSwitch('state', false);

    $('#CheckBoxValue').text($("#TheCheckBox").bootstrapSwitch('state'));

    $('#TheCheckBox').on('switchChange.bootstrapSwitch', function () {
        $("#CheckBoxValue").text($('#TheCheckBox').bootstrapSwitch('state'));
    });

    $('.probeProbe').bootstrapSwitch('state', true);

    $('.probeProbe').on('switchChange.bootstrapSwitch', function (event, state) {

        alert(this);
        alert(event);
        alert(state);
    });

    $('#toggleSwitches ').click(function () {
        $('.BSSorting').bootstrapSwitch('toggleDisabled');
        if ($('.BSSorting').attr('disabled')) {
            $(this).text('Enable All Switches ');
        } else {
            $(this).text('Disable All Switches ');
        }
    });

    $('.BSswitch').bootstrapSwitch('state', false);

    $('.toggler').on('click', function (event) {
        event.preventDefault();
        var target = $(this).data('target');
            relatedtarget = $(this).data('relatedtarget');
        toggler(target, relatedtarget);
    });

    $('#CheckBoxValue').text($("#TheCheckBox").bootstrapSwitch('state'));

    $('#TheCheckBox').on('switchChange.bootstrapSwitch', function () {
        $("#CheckBoxValue").text($('#TheCheckBox').bootstrapSwitch('state'));
    });

    $('.probeProbe').bootstrapSwitch('state', true);

    $('.probeProbe').on('switchChange.bootstrapSwitch', function (event, state) {
        alert(this);
        alert(event);
        alert(state);
    });

    $('#toggleSwitches ').click(function () {
        $('.BSswitch ').bootstrapSwitch('toggleDisabled');
        if ($('.BSswitch ').attr('disabled')) {
            $(this).text('Enable All Switches ');
        } else {
            $(this).text('Disable All Switches ');
        }
    });
    
    $('#accordion').on('hidden.bs.collapse', toggleIcon);

    $('#accordion').on('shown.bs.collapse', toggleIcon);

    $('.datepicker').datepicker({
        autoclose: true,
        format: 'dd-MM-yyyy'
    });

    $(".toggle-ftr").click(function(){
        $(".navbar-ftr").toggleClass('open');
    });

    $("#home_video").owlCarousel({
        autoPlay: 3000,
        navigation: true,
        items: 4,
        dots: true,
        loop: true,
        autoplay: true,
         responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        },
        navigationText: [
            "<i class='icon-chevron-left icon-white'></i>",
            "<i class='icon-chevron-right icon-white'></i>"
        ]
    });

    $("#events_slider").owlCarousel({
        autoPlay: 3000,
        navigation: true,
        items: 1,
        singleItem: true,
        dots: true,
        loop: true,
        autoplay: true,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [979, 1],
        navigationText: [
            "<i class='icon-chevron-left icon-white'></i>",
            "<i class='icon-chevron-right icon-white'></i>"
        ]
    });

    $("#my-gallery-container").owlCarousel({
        autoPlay: 3000,
        navigation: true,
        items: 4,
        dots: true,
        loop: true,
        autoplay: true,
         responsive:{
            0:{
                items:1
            },
             480:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        },
        navigationText: [
            "<i class='icon-chevron-left icon-white'></i>",
            "<i class='icon-chevron-right icon-white'></i>"
        ]
    });

    $('body').on('click','.frt_toggle', function (e) {
        $(".sidefrt_menu_list").toggleClass("show_sidemenu");
    });

    $('.main_container').on('click', function (e) {
       $(".sidefrt_menu_list").removeClass("show_sidemenu");
    });

    $('body').on('click','.frt_toggle1', function (e) {
      $(".ftr_menu_list").toggleClass("show_sidemenu1");
    });

    $('.main_container').on('click', function (e) {
       $(".ftr_menu_list").removeClass("show_sidemenu1");
    });

    $(".contact_list li a").click(function(){
      $( this ).prev(".contact_list li").toggleClass("open");
    });

    $('.bs-datepicker').datepicker({
        autoclose : true,
        format : 'yyyy-mm-dd'
    });

    $("#my-gallery-container").mpmansory({
        childrenClass: 'item', 
        columnClasses: 'padding',
        breakpoints:{
            lg: 3, 
            md: 4, 
            sm: 6,
            xs: 12
        },
        distributeBy: { order: false, height: false, attr: 'data-order', attrOrder: 'asc' }, //default distribute by order, options => order: true/false, height: true/false, attr => 'data-order', attrOrder=> 'asc'/'desc'
        onload: function (items) {
            //make somthing with items
        } 
    });

    $('.gallery').featherlightGallery({
        gallery: {
           fadeIn : 300,
           fadeOut: 300
        },
        openSpeed : 300,
        closeSpeed: 300
    });

    $('.no-counter').counterUp({
       delay: 10,
       time: 1000
    });

    $("#thechoices").change(function(){
        $("#" + this.value).show().siblings().hide();
    });

    $("#thechoices").change();

    // $('#rootwizard').bootstrapWizard();

    window.prettyPrint && prettyPrint();

});

function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".indicator")
        .toggleClass('glyphicon-plus glyphicon-minus');
}

function ajaxindicatorstart() {
    if (jQuery('body').find('#resultLoading').attr('id') != 'resultLoading') {
        jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="' + base_url() + 'assets/img/ajax-loader.gif"><div>Loading...</div></div><div class="bg"></div></div>');
    }

    jQuery('#resultLoading').css({
        'width': '100%',
        'height': '100%',
        'position': 'fixed',
        'z-index': '10000000',
        'top': '0',
        'left': '0',
        'right': '0',
        'bottom': '0',
        'margin': 'auto'
    });

    jQuery('#resultLoading .bg').css({
        'background': '#000000',
        'opacity': '0.7',
        'width': '100%',
        'height': '100%',
        'position': 'absolute',
        'top': '0'
    });

    jQuery('#resultLoading>div:first').css({
        'width': '250px',
        'height': '75px',
        'text-align': 'center',
        'position': 'fixed',
        'top': '0',
        'left': '0',
        'right': '0',
        'bottom': '0',
        'margin': 'auto',
        'font-size': '16px',
        'z-index': '10',
        'color': '#ffffff'

    });

    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeIn(300);
    jQuery('body').css('cursor', 'wait');
}

function ajaxindicatorstop() {
    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeOut(300);
    jQuery('body').css('cursor', 'default');
}

function readURL(input, ext, size) {
    var file_name = input.value;
    var split_extension = file_name.split(".").pop();
    var extArr = ext.split("|");
    if ($.inArray(split_extension.toLowerCase(), extArr) == -1) {
        $(input).val("");
        showToaster('error', 'You Can Upload Only .' + extArr.join(", ") + ' files !');
        return false;
    }
}

function cancelAction() {
    window.history.back();
}

function showToaster(type, text) {
    swal({
        html: true,
        title: (type == "error") ? "Error !" : "Success",
        text: text,
        timer: 20000
    });
}

function currentDate() {
    var today = new Date();
    var dd = (today.getDate() >= 10) ? today.getDate() : "0" + today.getDate();
    var mm = (today.getMonth() + 1 >= 10) ? today.getMonth() + 1 : "0" + (today.getMonth() + 1);
    var yyyy = today.getFullYear();
    var date = yyyy + '-' + mm + '-' + dd;
    return date;
}

function validateNumbers(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode == 46) {
        return false;
    }
    if (event.keyCode == 9 || event.keyCode == 8 || event.keyCode == 46) {
        return true;
    }
    else if (key < 48 || key > 57) {
        return false;
    }
    else return true;
}

function toggler(target, relatedtarget) {
    $(target).toggleClass('hidden');
    $(relatedtarget).addClass('hidden');
}

var autocomplete;
function initMap() {
    var check_class = $('input').hasClass('google_autocomplete');
    if (check_class == true) {
        document.write("\<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCz7Bo_xQIywAxLvk5BRR5xz70VY2VhLPk&libraries=places&callback=initMap' type='text/javascript'>\<\/script>");
        autocomplete = new google.maps.places.Autocomplete(
              /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
            { types: ['geocode'] });
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
        });
    }
}

window.onload = function () {
    initMap();
    initEditor();
};

function getQueryStringValue(key)
{  
  return unescape(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + escape(key).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));  
}

function initEditor() 
{
  var class_exist = $('textarea').hasClass('mceEditor');
  if (class_exist == true) {
      document.write("\<script src='//cdn.tinymce.com/4/tinymce.min.js' type='text/javascript'>\<\/script>");
      tinymce.init({
          mode: "textareas",
          editor_selector: "mceEditor",
          theme: "modern",
          font_size_classes: "fontSize1, fontSize2, fontSize3, fontSize4, fontSize5, fontSize6",
          plugins: [
              "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
              "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
              "save table contextmenu directionality emoticons template paste textcolor"
          ],

          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | sizeselect | fontselect | fontsize | fontsizeselect",
          style_formats: [{
              title: 'Bold text',
              inline: 'b'
          }, {
              title: 'Red text',
              inline: 'span',
              styles: {
                  color: '#ff0000'
              }
          }, {
              title: 'Red header',
              block: 'h1',
              styles: {
                  color: '#ff0000'
              }
          }, {
              title: 'Example 1',
              inline: 'span',
              classes: 'example1'
          }, {
              title: 'Example 2',
              inline: 'span',
              classes: 'example2'
          }, {
              title: 'Table styles'
          }, {
              title: 'Table row 1',
              selector: 'tr',
              classes: 'tablerow1'
          }]
      });
  }
}

function getUniversities(country, indecator, selectedValue) {
    if (typeof(selectedValue)==='undefined') selectedValue = '';
    var appendHTML = '<option value="">Choose a university</option>';
    if (country == '') {
        $('.select_university').html(appendHTML);
        return false;
    } else {
        $.ajax({
            url: base_url() + "front/home/getCountryUniversities",
            type: "POST",
            data: { country: country },
            dataType: "JSON",
            beforeSend: function () {
                if(indecator == true) {
                    ajaxindicatorstart();
                }
            },
            success: function (resp) {
                if (resp != '') {
                    for (var i = 0; i < resp.length; i++) {
                        if(selectedValue != '' && resp[i]['id'] == selectedValue) {
                            var selected = 'selected="selected"';
                        } else {
                            var selected = '';
                        }
                        appendHTML += '<option value="' + resp[i]['id'] + '" '+selected+'>' + resp[i]['name'] + '</option>';
                    }
                }
                $('.select_university').html(appendHTML);
                ajaxindicatorstop();
            },
            error: function (error) {
                ajaxindicatorstop();
            }
        });
    }
}