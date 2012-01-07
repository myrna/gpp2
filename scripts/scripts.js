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
    var field_sep = new RegExp("\\s+");
    function search_cb(request, result_cb) {
        var found = [];
        var terms = request.term.split(/\s+/);
        //console.debug(terms + " : " + terms.length);
        $(possibilities).each(function(pindex,possibility) {
            var found_count = 0;
            $(terms).each(function(idx, term) {
                var matcher = new RegExp("\\b" + term, "i");
                //console.debug("  " + matcher + " : " + possibility)
                if (matcher.test(possibility)) {
                    found_count++;
                }
            });
            if (found_count == terms.length) {
                found.push(possibility);
            }
        });
        //console.debug(found);
        result_cb(found);
    }
    
    $( '#searchterms' ).autocomplete({
        position: { my : "right top", at: "right bottom" },
        source: search_cb
    });
});
