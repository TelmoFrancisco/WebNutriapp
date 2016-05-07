$('#myModal').on('shown.bs.modal', function () {

  var id = $('#myModal').data('id');
  var tit = $('[data-id='+id+']').data('title');
  $('#myModal .modal-body p').html("Deseja eliminar o cliente " + '<b>' + tit +'</b>' + ' ?');
  var id = $(this).data('id'),
  removeBtn = $(this).find('.danger');
});

$('.confirm-delete').on('click' , function(e) {
    e.preventDefault();
    alert('bang');

    var id = $(this).data('id');
    $('#myModal').data('id', id).modal('show');
});

$('#btnYes').click(function()  {
    // handle deletion here
    var id = $('#myModal').data('id');
    var info = 'PK=' + id;
    var html = $.ajax({
       type: "POST",
       url: "remove_client.php",
       data: info,
       async: false
       }).responseText;
       if(html == "success")
       {
           $('[data-id='+id+']').parents('tr').remove();
           $('#myModal').modal('hide');
           return true;
       }
       else
       {
           alert("*ERRO* - Cliente não eliminado.");
           return false;
       }
});
