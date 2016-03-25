
<?php echo shell_exec('git fetch origin master');  ?>
<?php echo shell_exec('git reset --hard origin/master');  ?>
<?php echo shell_exec('git pull origin master');  ?>