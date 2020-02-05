<!-- JavaScript -->
<script src="../../assets/js/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../../assets/js/bootstrap/bootstrap.min.js"></script>
<script src="../../assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/js/datatables/dataTables.bootstrap.min.js"></script>

<script src="../../assets/js/jquery.maskedinput.min.js"></script>
<script src="../../assets/js/daterangepicker/moment.min.js"></script>
<script src="../../assets/js/daterangepicker/daterangepicker.js"></script>
<script src="../../assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="../../assets/js/app.min.js"></script>
<script src="../../assets/js/sparkline/jquery.sparkline.min.js"></script>
<script src="../../assets/js/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../../assets/js/chartjs/Chart.min.js"></script>
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>
<script src="../../plugins/select2/select2.full.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){
      $('#tmp_modal').DataTable();
  	});

	function confirm_delete(delete_url){
      $("#modal_delete").modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }

</script>

<footer class="main-footer">
    <div class="pull-right hidden-xs"></div>
    <strong>Copyright &copy; <?php echo date("Y") ?> Skripsi <a>Abdul Malik K.</a></strong>
</footer>   
</body>
</html>