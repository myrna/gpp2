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

