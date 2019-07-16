(function(){
	fetch_data();

	function fetch_data() {
		$.ajax({
			url: "models/fetch.php",
			success: function(data) {
				$('tbody').html(data);
			}
		})
	}

	$('#addButton').click(function(){
		$('#action').val('insert');
		$('#buttonAction').val('Submit');
		$('.modal-title').text('Add Person');
        $('#apicrudModal').modal('show');
        $('#entryForm')[0].reset();
	});

	$('#entryForm').on('submit', function(event) {
		event.preventDefault();
		var form_data = $(this).serialize();
		$.ajax({
			url: "models/actions.php",
			method: "POST",
			data: form_data,
			success: function(data) {
                fetch_data();
                $('#entryForm')[0].reset();
                $('#apicrudModal').modal('hide');

				if (data == 'insert') {
                    alert("Data Inserted.");
                } else if (data == 'update') {
                    alert("Data Updated.");
                } else {
                    alert("API error.");
                }
			}
		});
	});

	$(document).on('click', '.edit', function() {
		var id = $(this).attr('id');
		var action = 'fetch';
		$.ajax({
			url: "models/actions.php",
			method: "POST",
			data: {id: id, action: action},
			dataType: "json",
			success: function(data) {
				$('#hiddenId').val(id);
				$('#firstname').val(data.firstname);
				$('#lastname').val(data.lastname);
                $('#email').val(data.email);
                if (data.gender === 'female') {
                    $('input:radio[name=gender]')[1].checked = true;
                } else {
                    $('input:radio[name=gender]')[0].checked = true;
                }
				$('#age').val(data.age);
				$('#action').val('update');
				$('#buttonAction').val('Update');
				$('.modal-title').text('Edit Person Data');
                $('#apicrudModal').modal('show');
			}
		})
	});

	$(document).on('click', '.delete', function() {
		var id = $(this).attr("id");
		var action = 'delete';
		if (confirm("Are you sure you want to remove this data?")) {
			$.ajax({
				url: "models/actions.php",
				method: "POST",
				data: {id: id, action: action},
				success: function(data) {
					fetch_data();
					alert("Data deleted.");
				}
			});
		}
	});
})();