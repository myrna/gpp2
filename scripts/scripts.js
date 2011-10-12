//tablesorter
$(document).ready(function()
            { $("#display").tablesorter( {sortList: [[0,0]]} ); } );

// unclick radio buttons
$(document).ready(function() {
  $("input[type=radio]").mouseup(function() {
    this.__chk = this.checked;
  }).click(function() {
    if (this.__chk) this.checked = false;
  });
});

// swap image on single plant view page
$(document).ready(function() {
        $("#imageview li img").click(function(){
		$('#main-img').attr('src',$(this).attr('src').replace('thumbs/', ''));
	});
	var imgSwap = [];
	 $("#imageview li img").each(function(){
		imgUrl = this.src.replace('thumbs/', '');
		imgSwap.push(imgUrl);
	});
	$(imgSwap).preload();
});
$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src = this;
    });
}

// stylesheet switcher

$(document).ready(function() {
    $('#printview').styleSwitcher();
});

// search form on focus remove text

$(document).ready(function(){
    $('form input:text, form textarea').each(function(){
        $.data(this, 'default', this.value);
    }).focus(function(){
        if ($.data(this, 'default') == this.value) {
            this.value = '';
        }
    }).blur(function(){
        if (this.value == '') {
            this.value = $.data(this, 'default');
        }
    });
});

