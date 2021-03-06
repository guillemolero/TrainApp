    <script>
            window.onload = function() { document.body.className = ''; };
            window.ontouchmove = function() { return false; };
            window.onorientationchange = function() { document.body.scrollTop = 0; };
    </script>
<!-- jQuery Version 1.11.1 -->
    <script src="calendar/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="calendar/js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='calendar/js/moment.min.js'></script>
	<script src='calendar/js/fullcalendar.min.js'></script>
        <script src='calendar/locale/es.js'></script>
        <script type="text/javascript">
            function checkForm(form){
                form.addGuardar.disabled=true;
                return true;
            }
        </script>
	<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
                        lang: 'es',
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD'));
				$('#ModalAdd').modal('show');
                                
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si cambia de posicion

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si se alarga

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'functions/editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						console.log('Ejercicio modificado.');
					}else{
						alert('No ha podido ser modificado.'); 
					}
				}
			});
		}
                
//                function add(event){
//                    console.log("funsion");
//                    start = event.start.format('YYYY-MM-DD HH:mm:ss');
//			if(event.end){
//				end = event.end.format('YYYY-MM-DD HH:mm:ss');
//			}else{
//				end = start;
//			}
//			
//			id =  event.id;
//			
//			Event = [];
//			Event[0] = id;
//			Event[1] = title;
//			Event[2] = start;
//                        Event[3] = end;
//                        
//                        $.ajax({
//			 url: 'functions/addEvent.php',
//			 type: "POST",
//			 data: {Event:Event},
//			 success: function(rep) {
//					if(rep == 'OK'){
//						console.log('Ejercicio modificado.');
//					}else{
//						alert('No ha podido ser modificado.'); 
//					}
//				}
//			});
//                }
//                
//                $('#botonAdd').on('click',add(event));
		
	});

</script>