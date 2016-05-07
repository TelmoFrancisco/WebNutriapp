function test() {
  alert("11");
  var info = 'PK=' + a;
  var html = $.ajax({
    type: "POST",
    url: "select_anthropometric_data.php",
    data: info,
    async: false
    }).responseText;
}

$('#viewProfileModel').on('shown.bs.modal', function () {

  var id = $('#viewProfileModel').data('id');
  var tit = $('[data-id='+id+']').data('title');

  $('#viewProfileModel .modal-title').html("Cliente Actual " + '<b>' + tit +'</b>');
  $.ajax({
          type:"POST",
          url:"select_client.php",
          data:{PK:id},
          success:function(data){
              $("#viewProfileModel .modal-body p").html(data);
          }
      });
  var id = $(this).data('id'),
  removeBtn = $(this).find('.danger');
});

$('.view-profile').on('click' , function(e) {
    e.preventDefault();
    $("#viewProfileModel").find(".modal-header").css("color", "#ffffff");
    $("#viewProfileModel").find(".modal-header").css("background", "#007aff");
    $("#viewProfileModel").find(".modal-header").css("border-color", "#007aff");
    $("#viewProfileModel").find(".modal-header").css("font-family", "sans-serif");

    var id = $(this).data('id');
    $('#viewProfileModel').data('id', id).modal('show');
});

$('.btnYesProfile').click(function()  {
    // handle deletion here
    alert('success');
    var id = $('#viewProfileModel').data('id');
    var info = 'PK=' + id;
    alert(info);
    var html = $.ajax({
      type: "POST",
      url: "general.php",
      data: info,
      async: false
      }).responseText;
      if(html == "success")
      {
          alert('success');
          $('#viewProfileModel').modal('hide');
          return true;
      }
      else
      {
          alert("*ERRO* - Cliente não eliminado.");
          return false;
      }
      //window.location.href = 'http://nutriapp.comli.com/NUTRIAPP/NUTRIAPP/general.php';
      //  if(html == "success")
      //  {
          //  $('[data-id='+id+']').parents('tr').remove();


      //      return true;
      //  }
      //  else
      //  {
      //      alert("*ERRO* - Cliente não eliminado.");
      //      return false;
      //  }
});

$('.btnProfile').click(function()  {
    // handle deletion here
    var id = $('#viewProfileModel').data('id');
    var info = 'PK=' + id;
    $('#viewProfileModel').modal('hide');
    var html = $.ajax({
      type: "POST",
      url: "select_profile_data.php",
      data: info,
      async: false
      }).responseText;
    if(html == "success")
    {
        var form = document.createElement("form");
        input = document.createElement("input");
          form.action = "general.php";
          form.method = "post"
          input.name = "PK";
          input.value = id;
          form.appendChild(input);

          document.body.appendChild(form);
          form.submit();
        return true;
    }
    else
    {
        alert("*ERRO* - Cliente não eliminado.");
        return false;
    }
});

$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});
