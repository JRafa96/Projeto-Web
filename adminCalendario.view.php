<?php
include "includes/controllers/adminCalendario.controller.php";
include "includes/header.php";
include "includes/adminSidebar.php";
include "includes/navBar.php"; ?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php include "includes/footer.php";
include "includes/scripts.php" ?>

<?php

$tempEventos = "[";
$counter = 0;
foreach ($eventos as $evento) {
    $tUser = $tempU->findUserById($evento['userId']);
    $fromA = explode("/", $evento["from"]);
    $from = $fromA[2] . "-" . $fromA[1] . "-" . $fromA[0];
    $toA = explode("/", $evento["to"]);
    $to = $toA[2] . "-" . $toA[1] . "-" . ((int) $toA[0] + 1);
    $tempEventos .= '{"title": "' . $tUser['username'] . '", "start": "' . $from . '", "end": "' . $to . '", "backgroundColor": "#f56954", "borderColor": "#f56954", "allDay": true }';
    $counter++;
    if ($counter < sizeof($eventos)) {
        $tempEventos .= ",";
    }
}
$tempEventos .= "]";

?>


<!-- Page specific script -->
<script>
    $(function() {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
            ele.each(function() {

                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)

            })
        }

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var calendarEl = document.getElementById('calendar');


        var teste = JSON.parse('<?php echo $tempEventos; ?>');

        var calendar = new Calendar(calendarEl, {
            plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            //Random default events
            events: teste,
            editable: false,
            droppable: false, // this allows things to be dropped onto the calendar !!!
        });

        calendar.render();
        //$('#calendar').fullCalendar();

    })
</script>


</body>

</html>