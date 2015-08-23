// main and serious
$(document).ready(function() {
  $('.warning').css('visibility','hidden');

  $('#id_number').keyup(function() {
    var textbox = $(this);
    var value = textbox.val();
    var min = textbox.attr('min'); // automatically changes based on the 'min' and 'max'
    var max = textbox.attr('max'); // attribute value of <input name="id_number">
    var length = value.toString().length

    if(length >= 5 && length <= 6 && value <= max) {
      $.ajax({
        method: 'GET',
        url: 'retriever.php',
        data: { id: value },
        dataType: 'json',
        success: function(student) {
          $('#full_name').val(student.stu_full_name);
	  $('#course').val(student.stu_course);
	  $('#year').val(student.stu_year);
        }
      });
    } else {
      $('#full_name').val("");
      $('#course').val("");
      $('#year').val("");
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

    var try_nickname = $("#nickname").val();
    if (try_nickname.length === 0 || try_nickname === "") {
      var c = false;
      $('#nickname_warning').css('visibility','visible');
    }
    else {
      var c = true;
      $('#nickname_warning').css('visibility','hidden');
    }

    var try_course = $("#course").val();
    if (try_course.length === 0 || try_course === "") {
      var d = false;
      $('#course_warning').css('visibility','visible');
    }
    else {
      var d = true;
      $('#course_warning').css('visibility','hidden');
    }

    var try_email = $("#email").val();
    if (try_email.length === 0 || try_email === "") {
      var e = false;
      $('#email_warning').css('visibility','visible');
    }
    else {
      var e = true;
      $('#email_warning').css('visibility','hidden');
    }

    var try_cell = parseInt($("#cellphone_number").val(), 10);
    if (try_cell > 9000000000 && try_cell < 100000000000) {
      var f = true;
      $('#cell_warning').css('visibility','hidden');
    }
    else {
      var f = false;
      $('#cell_warning').css('visibility','visible');
    }

    if ($('input[name=memStat]:checked').length > 0) {
      var g = true;
      $('#member_warning').css('visibility','hidden');
    }
    else {
      var g = false;
      $('#member_warning').css('visibility','visible');
    }

    if ($('input[name=paid]:checked').length > 0) {
      var h = true;
      $('#paid_warning').css('visibility','hidden');
    }
    else {
      var h = false;
      $('#paid_warning').css('visibility','visible');
    }

    if ((a) && (b) && (c) && (d) && (e) && (f) && (g) && (h)) {
      $.ajax({
        method: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        async: false,
        success: function(data) {
            $('#accepted').modal('toggle');
            $('#member_nickname').text(try_nickname);
	    $('#member_year').text($('#year').val() + " - " + try_course);
          }


      });
      evee.preventDefault();
    }
    evee.preventDefault();
  });

$('#accepted').on('hidden.bs.modal', function () {
 location.reload();
})
});
