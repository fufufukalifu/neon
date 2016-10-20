<!-- ini START Template Footer -->



<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/jquery.min.js'); ?>"></script>

<!--/ END Template Footer -->

<!--<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/jquery-migrate.min.js'); ?>"></script>-->

<script type="text/javascript" src="<?= base_url('assets/library/bootstrap/js/bootstrap.min.js'); ?>"></script>

<script type="text/javascript" src="<?= base_url('assets/library/core/js/core.min.js'); ?>"></script>

<!--/ Library script -->



<!-- App and page level script -->

<!-- ini footer -->
<script src="<?php echo base_url(); ?>assets/js/paginga.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/soal_to.js"></script>

<script>
    function disableF5(e) {
        if ((e.which || e.keyCode) == 116)
            e.preventDefault();
    }
    ;
    $(document).on("keydown", disableF5);

    function countdown(minutes, stat) {
        var seconds = 60;
        var mins = minutes;

        if (getCookie("minutes") && getCookie("seconds") && stat)
        {
            var seconds = getCookie("seconds");
            var mins = getCookie("minutes");
        }

        function tick() {

            var counter = document.getElementById("timer");
            setCookie("minutes", mins, 10)
            setCookie("seconds", seconds, 10)
            var current_minutes = mins - 1
            seconds--;
            counter.innerHTML =
                    current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
            //save the time in cookie
            if (seconds > 0) {
                setTimeout(tick, 1000);
            } else {
                if (mins > 1) {
                    // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
                    setTimeout(function () {
                        countdown(parseInt(mins) - 1, false);
                    }, 1000);
                } else {
                    alert('Waktu Habis!');
//                    document.getElementById("hasil").submit();
                    deleteAllCookies('seconds', 'minutes');
                }

            }
        }
        tick();
    }

   
//    deleteAllCookies();
    deleteAllCookies('seconds', 'minutes');
    countdown(<?php foreach ($paket as $row) { echo $row['durasi'];} ?>, true);
    
    function deleteAllCookies(seconds, mins) {
        document.cookie = seconds + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
        document.cookie = mins + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
        document.cookie = mins + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
    }
</script>
<script type="text/javascript">
    window.onbeforeunload = function () {
        return "Data yang dimasukan akan hilang, yakin keluar dari halaman?";
    };

    function deleteAllCookies() {
        setCookie('minutes', '', -1);
        setCookie('seconds', '', -1);
    }
</script>

<script>
    function statusPengisian(status) {
        var id = status;
        var x = document.getElementById(id);
        x.classList.remove("btn-danger");
        x.className += " bg-primary";
    }
</script>

<script type="text/javascript" src="<?= base_url('assets/plugins/owl/js/owl.carousel.min.js'); ?>"></script>

<script type="text/javascript" src="<?= base_url('assets/javascript/pages/frontend/home.js'); ?>"></script>

</body>