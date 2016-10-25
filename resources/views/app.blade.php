<!DOCTYPE html>
<html>
<head>
	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<title></title>
</head>
<body>
<div class="container-fluid">
	@yield('content')
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


	<script type="text/javascript">
		// edit ''
		$(document).on('click', '.edit-modal', function() {
			/* body... */
			$('#footer_action_button').text('Update');
			$('#footer_action_button').addClass('glyphicon-check');
			$('#footer_action_button').removeClass('glyphicon-trash');
			$('.actionBtn').addClass('btn-success');
			$('.actionBtn').removeClass('btn-danger');
			$('.actionBtn').addClass('edit');
			$('.modal-title').text('Edit');
			$('.deleteContent').hide();
			$('.form-horizontal').show();
			$('#fid').val($(this).data('id'));
			$('#t').val($(this).data('title'));
			$('#d').val($(this).data('description'));
			$('#myModal').modal('show');
		});
		$('.modal-footer').on('click', '.edit', function() {
			
			$.ajax({
				url: '/editItem',
				type: 'post',
				data: {
					'_token' : $('input[name=_token]').val(),
					'id' : $('#fid').val(),
					'title' : $('#t').val(),
					'description' : $('#d').val(),

				},
				success: function(data){
					$('.item' + data.id).replaceWith(
						"<tr class='.item'" + data.id + "><td>" + data.id +"</td><td>"+ data.title + "</td><td>"+data.description+ "</td><td><button type='button' class='edit-modal btn btn-primary' data-id='"+data.id+"' data-title='" + data.title + "' data-description='"+data.description+ "' >									<span class='glyphicon glyphicon-edit'></span>Edit</button><button type='button' class='delete-modal btn btn-danger' data-id='"+data.id+"' data-title='" + data.title + "' data-description='" + data.description + "' ><span class='glyphicon glyphicon-trash'></span>Delete</button>	</td></tr>"
						);
				}
			});
			
			
		});


	</script>
</body>
</html>