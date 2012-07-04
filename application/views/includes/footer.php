	</div><!--wrapper-->
</div><!--content-->
<footer class="footer container">
	<p>Versión Beta julio 2012. Desarrollado por <a href="http://www.albertofortes.com" title="Freelance Front End developer">Alberto Fortes</a>.</p>
	<p>Vamos al Super es Copyleft y puedes descargarlo libremente y mejor aún, contribuir a su mejora.</p>
	<p><strong>Vamos al super</strong> usa <a href="http://codeigniter.com/">CodeIgniter 2</a>, <a href="http://benedmunds.com/ion_auth/">Ion Auth</a>, <a href="http://twitter.github.com/bootstrap">Bootstrap from Twitter</a>, <a href="http://gentleface.com/free_icon_set.html">Gentleface icons</a></p>
</footer>
<script>
	// menu select en smartphone:
	$("#smartphone-nav select").change(function() {
  		window.location = $(this).find("option:selected").val();
	});
	$('.dropdown-toggle').dropdown()
</script>
</body>
</html>