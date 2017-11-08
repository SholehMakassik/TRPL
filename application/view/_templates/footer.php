<div class="footer">

</div>

<!--    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo URL; ?>js/jquery-3.2.1.min.js"></script>
<script>
    var url = "<?php echo URL; ?>";
</script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo URL; ?>js/bootstrap.min.js"></script>
<?php if (in_array("datepicker", $needJS)) { ?>
<script src="<?php echo URL; ?>js/commentAJAX.js"></script>
<?php } ?>
<?php if (in_array("datepicker", $needJS)) { ?>
    <script src="<?php echo URL; ?>js/bootstrap-datepicker.js"></script>
<?php } ?>
<?php if (in_array("ekko-lightbox", $needJS)) { ?>
    <script src="<?php echo URL; ?>js/ekko-lightbox.min.js"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
<?php } ?>
<?php if (in_array("chosen", $needJS)) { ?>
    <script src="<?php echo URL; ?>js/chosen.jquery.min.js"></script>
    <script>
        $('.chosen').chosen();
    </script>
<?php } ?>

</body>
</html>
