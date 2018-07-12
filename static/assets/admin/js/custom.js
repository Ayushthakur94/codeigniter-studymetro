/**
* Custom jQuery function
* Author: Siddharth Pandey
* Author Email: sid@mobiwetech.com
* version: 1.0
*/

function displayattr(formId) {
	$('div#'+formId+' input[name="keyword"]').click(function(){
		if($('div#'+formId+' input[name="keyword"]').val().length > 0) {
			$('div#'+formId+' i.closeValue').fadeIn();
		} else {
			$('div#'+formId+' i.closeValue').hide();
		}
	});

	$('div#'+formId+' input[name="keyword"]').keyup(function(){
		if($('div#'+formId+' input[name="keyword"]').val().length > 0) {
			$('div#'+formId+' i.closeValue').fadeIn();
		} else {
			$('div#'+formId+' i.closeValue').hide();
		}
	});
}

function removeItem(formId) {
	$('div#'+formId+' input[name="keyword"]').val('');
	$('div#'+formId+' i.closeValue').hide();
	$('div#'+formId+' input[name="keyword"]').focus();
}

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

function searchData(divId, appId) {
	delay(function(){
		$('div#'+divId+' .refreshSpin').fadeIn();
		$('div#'+divId+' input[name="keyword"]').prop('disabled', true);

      	var keyword = $('div#'+divId+' input[name="keyword"]').val();
		var search_type = $('div#'+divId+' input[name="search_type"]').val();
		var base_url = $('input[name="base_url"]').val();

		delay(function(){
			$.ajax({
				type: 'POST',
				url: base_url,
				data: 'keyword='+keyword+'&search_type='+search_type,
				success:function(response) {
					$('div#'+divId+' .refreshSpin').hide();
					$('div#'+divId+' input[name="keyword"]').prop('disabled', false);
					$('div#'+divId+' input[name="keyword"]').val('');
					$('div#'+appId).html('');
					$('div#'+appId).html(response).fadeIn();
				}
			});
		}, 1000 ); 
    }, 500 );
}

$(document).ready(function(){
	$(document).on('click','#groupsAppend .pagination a' ,function(e){
        e.preventDefault();
        $('#groupsAppend .menuRefreshSpin').fadeIn();
        var url = (jQuery(this).attr('href'));
        var offset = url.substring(url.lastIndexOf('/') + 1);

        $.ajax({
			type: 'POST',
			url: url,
			data: 'offset='+offset+'&search_type=groups',
			success:function(response) {
				delay(function(){
					$('#groupsAppend .menuRefreshSpin').hide();
					$('#groupsAppend #tab_1').html('');
					$('#groupsAppend #tab_1').html(response);
				}, 500 );
			}
		});
    });

    $(document).on('click','#groupsItemAppend .pagination a' ,function(e){
        e.preventDefault();
        $('#groupsItemAppend .menuRefreshSpin').fadeIn();
        var url = (jQuery(this).attr('href'));
        var offset = url.substring(url.lastIndexOf('/') + 1);

        $.ajax({
			type: 'POST',
			url: url,
			data: 'offset='+offset+'&search_type=group_types',
			success:function(response) {
				delay(function(){
					$('#groupsItemAppend .menuRefreshSpin').hide();
					$('#groupsItemAppend #tab_3').html('');
					$('#groupsItemAppend #tab_3').html(response);
				}, 500 );
			}
		});
    });

    $(document).on('click','#pagesAppend .pagination a' ,function(e){
        e.preventDefault();
        $('#pagesAppend .menuRefreshSpin').fadeIn();
        var url = (jQuery(this).attr('href'));
        var offset = url.substring(url.lastIndexOf('/') + 1);

        $.ajax({
			type: 'POST',
			url: url,
			data: 'offset='+offset+'&search_type=pages',
			success:function(response) {
				delay(function(){
					$('#pagesAppend .menuRefreshSpin').hide();
					$('#pagesAppend #tab_5').html('');
					$('#pagesAppend #tab_5').html(response);
				}, 500 );
			}
		});
    });

    $('#menuAttrModal').on('hidden.bs.modal', function () {
	    $('#menuAttrModal input[name="selected_fav_icon"]').val('');
	    $('#menuAttrModal input[name="item_id"]').val('');
		$('#menuAttrModal input[name="item_name"]').val('');
		$('#menuAttrModal input[name="item_type"]').val('');
		$('#menuAttrModal input[name="extra_class"]').val('');
		$('#menuAttrModal input[name="in_new_tab"]').prop('checked', false);
		$('.liatAllFavIcons a').removeClass('activeFavIcon');
		$('div.liatAllFavIcons a i').removeClass('activeFav');

		$('#menuAttrModal .liatAllFavIcons a').each(function(){
			$(this).removeAttr('data-icon');
		});
	})

	$('#groupAttrModal').on('hidden.bs.modal', function(){
		$('#groupAttrModal .liatAllFavIcons a').each(function(){
			$(this).removeAttr('data-icon');
		});
		$('.liatAllFavIcons a i').removeClass('activeFav');
	});
});

var time = Date.now || function() {
  return +new Date;
};

/* Nestable Menu */
var updateOutput = function(e){
    var list   = e.length ? e : $(e.target),
        output = list.data('output');
    if (window.JSON) {
        output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
    } else {
        output.val('JSON browser support required for this demo.');
    }
};

$('#nestable').nestable({
    group: 1
})
.on('change', updateOutput);

// output initial serialised data
updateOutput($('#nestable').data('output', $('#nestable-output')));

/* Add Menu items */
function addMenuitems(Id) {
	if($('#'+Id+' input[type="checkbox"]').is(':checked')) {
		$('#'+Id+' input[name="submit"]').prop('disabled', false);
	} else {
		$('#'+Id+' input[name="submit"]').prop('disabled', true);
	}
}

function addMenuItemInStructure(Id, Type) {
	var ItemId = $('#'+Id+' input[type="checkbox"]:checked').val();
	var ItemName = $('#'+Id+' input[type="checkbox"]:checked').attr('data-name');
	var ItemTime = time();

	$('#nestable ol.dd-list').append('<li class="dd-item item-'+ItemTime+'" id="'+Type+ItemTime+'" data-itemid="'+Type+ItemTime+'" data-id="'+ItemId+'" data-name="'+ItemName+'" data-type="'+Type+'" data-target="_self" data-icon="null" data-class="null"><div class="dd-handle">'+ItemName+'</div><a class="menuNestEdit" title="Edit" id="'+ItemTime+'" href="javascript:void(0);" data-name="'+ItemName+'" data-type="'+Type+'" onclick="openMenuAttrModal(this);"><i class="fa fa-pencil"></i></a><a class="removeMenuItem" title="Remove" id="'+ItemTime+'" href="javascript:void(0);" data-name="'+ItemName+'" data-type="'+Type+'" data-time="'+ItemTime+'" onclick="removeMenuItem(this);"><i class="fa fa-close"></i></a></li>');
	$('div.nestableMenu').append('<input type="hidden" name="extra_attributes['+Type+ItemTime+']" id="extra-'+Type+ItemTime+'" value="'+ItemId+'||_self||||"/>');
	updateOutput($('#nestable').data('output', $('#nestable-output')));
	$('#'+Id+' input[type="checkbox"]').prop('checked', false);
	$('#'+Id+' input[name="submit"]').prop('disabled', true);
}

function addCustomLinkInStructure(Id, Type) {
	var ItemId = time();
	var ItemName = $('#'+Id+' input[name="link_text"]').val();
	if(ItemName == '') {
		alert('Please enter link text.');
		$('#'+Id+' input[name="link_text"]').focus();
		return false;
	}

	var ItemUrl = $('#'+Id+' input[name="link_url"]').val();
	if(ItemUrl == '') {
		alert('Please enter link url.');
		$('#'+Id+' input[name="link_url"]').focus();
		return false;
	}

	if(ItemName != '' && ItemUrl != '') {
		$('#nestable ol.dd-list').append('<li class="dd-item item-'+ItemId+'" id="'+Type+ItemId+'" data-itemid="'+Type+ItemId+'" data-id="'+ItemId+'" data-name="'+ItemName+'" data-type="'+Type+'" data-link="'+ItemUrl+'" data-target="_self" data-icon="null" data-class="null"><div class="dd-handle">'+ItemName+'</div><a class="menuNestEdit" title="Edit" id="'+ItemId+'" href="javascript:void(0);" data-name="'+ItemName+'" data-type="'+Type+'" data-link="'+ItemUrl+'" onclick="openCusMenuAttrModal(this);"><i class="fa fa-pencil"></i></a><a class="removeMenuItem" title="Remove" id="'+ItemId+'" href="javascript:void(0);" data-name="'+ItemName+'" data-type="'+Type+'" data-time="'+ItemId+'" onclick="removeMenuItem(this);"><i class="fa fa-close"></i></a></li>');
		$('div.nestableMenu').append('<input type="hidden" name="extra_attributes['+Type+ItemId+']" id="extra-'+Type+ItemId+'" value="'+ItemId+'||_self||||"/>');
		updateOutput($('#nestable').data('output', $('#nestable-output')));
		$('#'+Id+' input[name="link_text"]').val('');
		$('#'+Id+' input[name="link_url"]').val('');
	}
}

function checkMenuform() {
	if($('input[name="menu_name"]').val() == '') {
		alert('Please enter menu name');
		$('input[name="menu_name"]').focus();
		return false;
	} else {
		return true;
	}
}

function openMenuAttrModal(ele) {
	var Id = $(ele).attr('id');
	var Name = $(ele).attr('data-name');
	var Type = $(ele).attr('data-type');
	var Target = $('li#'+Type+Id).attr('data-target');
	var extraClass = $('li#'+Type+Id).attr('data-class');
	var Icon = $('li#'+Type+Id).attr('data-icon');

	$('#menuAttrModal input[name="item_id"]').val(Id);
	$('#menuAttrModal input[name="item_name"]').val(Name);
	$('#menuAttrModal input[name="item_type"]').val(Type);
	$('#menuAttrModal h4.modal-title').text(Name);

	$('#menuAttrModal .liatAllFavIcons a').each(function(){
		$(this).attr('data-icon', $(this).text());
	});

	if(Target == '_blank') {
		$('input[name="in_new_tab"]').prop('checked', true);
	}
	if(extraClass != 'null') {
		$('input[name="extra_class"]').val(extraClass);
	}
	if(Icon != 'null') {
		var IconClass = Icon.split(' ');
		$('div.liatAllFavIcons a i.'+IconClass[2]).addClass('activeFav');
	}

	$('#menuAttrModal').modal();
}

function openCusMenuAttrModal(ele) {
	var Id = $(ele).attr('id');
	var Name = $(ele).attr('data-name');
	var Type = $(ele).attr('data-type');
	var Url = $(ele).attr('data-link');
	var Target = $('li#'+Type+Id).attr('data-target');
	var extraClass = $('li#'+Type+Id).attr('data-class');
	var Icon = $('li#'+Type+Id).attr('data-icon');

	$('#menuAttrModal input[name="item_id"]').val(Id);
	$('#menuAttrModal input[name="item_name"]').val(Name);
	$('#menuAttrModal input[name="item_type"]').val(Type);
	$('#menuAttrModal h4.modal-title').text(Name);

	$('#menuAttrModal .liatAllFavIcons a').each(function(){
		$(this).attr('data-icon', $(this).text());
	});

	if(Target == '_blank') {
		$('input[name="in_new_tab"]').prop('checked', true);
	}
	if(extraClass != 'null') {
		$('input[name="extra_class"]').val(extraClass);
	}
	if(Icon != 'null') {
		var IconClass = Icon.split(' ');
		$('div.liatAllFavIcons a i.'+IconClass[2]).addClass('activeFav');
	}

	$('#menuAttrModal').modal();
}

function setFavicon(ele) {
	var Attr = $(ele).attr('data-icon');
	var faClass = $('a[data-icon="'+Attr+'"] i.fa').attr('class');
	$('.liatAllFavIcons a').removeClass('activeFavIcon');
	$(ele).addClass('activeFavIcon');
	$('#menuAttrModal input[name="selected_fav_icon"]').val(faClass);
}

function appendMenuAttributes() {
	var favIcon = $('#menuAttrModal input[name="selected_fav_icon"]').val();
    var ItemId = $('#menuAttrModal input[name="item_id"]').val();
	var ItemName = $('#menuAttrModal input[name="item_name"]').val();
	var Type = $('#menuAttrModal input[name="item_type"]').val();
	var extraClass = $('#menuAttrModal input[name="extra_class"]').val();

	if($('#menuAttrModal input[name="in_new_tab"]').is(':checked')) {
		var isChecked = '_blank';
	} else {
		var isChecked = '_self';
	}

	$('.dd-list li#'+Type+ItemId).attr('data-target', isChecked);
	if(extraClass != '') {
		$('.dd-list li#'+Type+ItemId).attr('data-class', extraClass);
	}
	if(favIcon != '') {
		$('.dd-list li#'+Type+ItemId).attr('data-icon', favIcon);
	}

	var appendVal = ItemId+'||'+isChecked+'||'+extraClass+'||'+favIcon;
	$('input#extra-'+Type+ItemId).val(appendVal);
	
	/* Update serialize string */
	updateOutput($('#nestable').data('output', $('#nestable-output')));

	/* Hide modal */
	$('#menuAttrModal').modal('hide');
}

function removeMenuItem(element) {
	if(confirm('Are you sure want to delete this menu item??')) {
		var ItemId = $(element).attr('id');
		var Type = $(element).attr('data-type');
		var Time = $(element).attr('data-time');
		$('.dd-list li.item-'+ItemId).remove();
		$('input#extra-'+Type+ItemId).remove();
		updateOutput($('#nestable').data('output', $('#nestable-output')));
	}
}

function setGroupicon() {
	$('#groupAttrModal .liatAllFavIcons a').each(function(){
		$(this).attr('data-icon', $(this).text());
	});
	$('#groupAttrModal').modal();
}

function seteditGroupicon() {
	$('#groupAttrModal .liatAllFavIcons a').each(function(){
		$(this).attr('data-icon', $(this).text());
	});
	var Icon = $('input[name="group_icon"]').val();
	$('.liatAllFavIcons a i.'+Icon).addClass('activeFav');
	$('#groupAttrModal').modal();
}

function setGroupFavicon(ele) {
	var Attr = $(ele).attr('data-icon');
	var faClass = $('a[data-icon="'+Attr+'"] i.fa').attr('class');
	$('.liatAllFavIcons a i').removeClass('activeFav');
	$('.liatAllFavIcons a').removeClass('activeFavIcon');
	$(ele).addClass('activeFavIcon');
	$('input[name="group_icon"]').val(faClass);
}

function appendGroupAttributes() {
	$('#groupAttrModal').modal('hide');
}

function ajaxindicatorstart()
{
    if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
    jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="'+base_url()+'assets/img/ajax-loader.gif"><div>Loading...</div></div><div class="bg"></div></div>');
    }
    
    jQuery('#resultLoading').css({
        'width':'100%',
        'height':'100%',
        'position':'fixed',
        'z-index':'10000000',
        'top':'0',
        'left':'0',
        'right':'0',
        'bottom':'0',
        'margin':'auto'
    }); 
    
    jQuery('#resultLoading .bg').css({
        'background':'#000000',
        'opacity':'0.7',
        'width':'100%',
        'height':'100%',
        'position':'absolute',
        'top':'0'
    });
    
    jQuery('#resultLoading>div:first').css({
        'width': '250px',
        'height':'75px',
        'text-align': 'center',
        'position': 'fixed',
        'top':'0',
        'left':'0',
        'right':'0',
        'bottom':'0',
        'margin':'auto',
        'font-size':'16px',
        'z-index':'10',
        'color':'#ffffff'
        
    });

    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeIn(300);
    jQuery('body').css('cursor', 'wait');
}

function ajaxindicatorstop()
{
    jQuery('#resultLoading .bg').height('100%');
    jQuery('#resultLoading').fadeOut(300);
    jQuery('body').css('cursor', 'default');
}

function readURL(input,ext,size){
  var file_name = input.value;
  var split_extension = file_name.split(".").pop();
  var extArr = ext.split("|");
  if($.inArray(split_extension.toLowerCase(), extArr ) == -1)
  {
    $(input).val("");
    alert('You Can Upload Only .'+extArr.join(", ")+' files !');
    return false;
  }
  if(size != ""){
  	
  }
}

function cancelAction(){
  window.history.back();
}

function currentDate()
{
    var today = new Date();
    var dd = (today.getDate() >= 10) ? today.getDate() : "0"+today.getDate();
    var mm = (today.getMonth()+1 >= 10) ? today.getMonth()+1 : "0"+(today.getMonth()+1);
    var yyyy = today.getFullYear();
    var date = yyyy+'-'+mm+'-'+dd;
    return date;
}

function validateNumbers(event)
{
  var key = window.event ? event.keyCode : event.which;
  if (event.keyCode == 46){
    return false;
  }
  if (event.keyCode == 9 || event.keyCode == 8 || event.keyCode == 46) {
      return true;
  }
  else if ( key < 48 || key > 57 ) {
      return false;
  }
  else return true;
}

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
