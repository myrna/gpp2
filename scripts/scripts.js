//tablesorter
$(document).ready(function()
            { $("#display").tablesorter( {
               
              textExtraction: {
                0: function(node) {
                return $(node).find('span:not(.crossgenus)').text().replace(/\'/g,'');
                }
},
               sortList: [[0,0]]
                } );
            } );

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

$(document).ready(function() {
    var possibilities = []
    function set_possibilities(data, text) {
        possibilities = data;
    }
    
    $.ajax({
        url: '/plantlists/autocomplete_set',
        success: set_possibilities,
        dataType: 'json'
    });
    var field_sep = new RegExp("\s+")
    function search_cb(request, result_cb) {
        var matcher = new RegExp( "^" + request.term, "i");
        var f = [];
        $(possibilities).each(function(index, item) {
            var found = false;
            var a = item.split(field_sep);
            $(a).each(function(idx, itm) {
                var re = $.ui.autocomplete.escapeRegex(itm);
                if (matcher.test(re)) {
                    f.push(item);
                    found = true;
                }
            });
            if (!found) {    
                if (matcher.test(item)) {
                    f.push(item);
                }
            }
        });
        result_cb(f);
    }
    
    $( '#searchterms' ).autocomplete({
        position: { my : "right top", at: "right bottom" },
        source: search_cb
    });
});
