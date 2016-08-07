<div id="calendar"></div>
<script>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			editable: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			events: {
				type: "post",
				url: "/responsive/tasks/calendar",
				error: function() {
					alert('there was an error while fetching events!');
				}
			}
		});
	});
</script>