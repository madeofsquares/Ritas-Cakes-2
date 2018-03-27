<?php $adminemail = get_option ( 'admin_email' ); ?>

<footer role="contentinfo">
    <p>&copy; <?php echo date( "Y" ); ?> Retia Lambert</p>
    <p>Contact: <a href="mailto:<?php echo $adminemail; ?>"><?php echo $adminemail; ?></a></p>
</footer>

<?php wp_footer(); ?>

</body>
</html>