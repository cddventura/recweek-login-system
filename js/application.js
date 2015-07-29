//easter egg
function easter_egg(id_number) {
  if (parseInt(id_number) === 134383) {
    return "HRH ";
  } else {
    return "";
  }
}

// main and serious
$(document).ready(function() {
  $('.warning').css('visibility','hidden');

  $('#id_number').keyup(function() {
    var textbox = $(this);
    var value = textbox.val();
    var min = textbox.attr('min'); // automatically changes based on the 'min' and 'max'
    var max = textbox.attr('max'); // attribute value of <input name="id_number">
    var length = value.toString().length

    if(length === 6 && value >= min && value <= max) {
      $.ajax({
        method: 'GET',
        url: 'retriever.php',
        data: { id: value },
        dataType: 'json',
        success: function(student) {
          $('#full_name').val(easter_egg(value) + student.full_name);
          $('#cellphone_number').val(student.cellphone_number);
        }
      });
    } else {
      $('#full_name').val("");
      $('#cellphone_number').val("");
    }
  });
  
  $('#submit').click(function(evee) {
    var form = $('#form');

    var try_id = parseInt($("#id_number").val(), 10);
    if (try_id >= 100000 && try_id < 160000) {
      var a = true;
      $('#idnumber_warning').css('visibility','hidden');
    }
    else {
      var a = false;
      $('#idnumber_warning').css('visibility','visible');
    }

    var try_name = $("#full_name").val();
    if (try_name.length === 0 || try_name === "") {
      var b = false;
      $('#name_warning').css('visibility','visible');
    }
    else {
      var b = true;
      $('#name_warning').css('visibility','hidden');
    }

    var try_cell = parseInt($("#cellphone_number").val(), 10);
    if (try_cell > 9000000000 && try_cell < 100000000000) {
      var c = true;
      $('#cell_warning').css('visibility','hidden');
    }
    else {
      var c = false;
      $('#cell_warning').css('visibility','visible');
    }

    if ((a) && (b) && (c)) {
      $.ajax({
        method: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        async: false,
        success: function(data) {          
            alert("Challenge Accepted!");
            location.reload();            
          }
        

      });
      evee.preventDefault();
    }
    evee.preventDefault();
  });
});