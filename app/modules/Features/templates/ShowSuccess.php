<h2><?php echo $t['feature']->getName() . ' '. $t['feature']->getVersion(); ?></h2>
<?php if ($t['bundles']): ?>
<table>
	<th>No.</th>
	<th>Bundle</th>
<?php 
$i=0;
foreach ($t['bundles'] AS $bundle): 
$i++;
?>
	<tr>
		<td class="lp"><?php echo $i; ?></td>
		<td><?php echo $bundle->getBundle(); ?></td>
	</tr>
<?php endforeach; ?>
</table>
<?php endif;?>

<?php if ($t['references']): ?>

<table>
	<th>No.</th>
	<th>Reference</th>
	<th>Version</th>
<?php 
$i=0;
foreach ($t['references'] AS $reference): 
$i++;
?>
	<tr>
		<td class="lp"><?php echo $i; ?></td>
		<td><?php echo $reference->getName(); ?></td>
		<td class="operations"><?php echo $reference->getVersion(); ?></td>
	</tr>
<?php endforeach;?>
</table>

<?php endif;?>