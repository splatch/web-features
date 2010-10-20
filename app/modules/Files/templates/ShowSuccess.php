<h2><?php echo $t['file']->getFilename(); ?></h2>
<?php if ($t['repositories']): ?>
<table>
	<th>No.</th>
	<th>Repository</th>
<?php 
$i=0;
foreach ($t['repositories'] AS $repository): 
$i++;
?>
	<tr>
		<td class="lp"><?php echo $i; ?></td>
		<td><?php echo $repository->getRepository(); ?></td>
	</tr>
<?php endforeach; ?>
</table>
<?php endif;?>

<?php if ($t['file']->isParsed() && $t['features']): ?>

<table>
	<th>No.</th>
	<th>Feature</th>
	<th>Version</th>
	<th>Bundles</th>
<?php 
$i=0;
foreach ($t['features'] AS $feature): 
$i++;
?>
	<tr>
		<td class="lp"><?php echo $i; ?></td>
		<td><?php echo $feature->getName(); ?></td>
		<td class="operations"><?php echo $feature->getVersion(); ?></td>
		<td class="operations"><a href="/features/show/<?php echo $feature->getId(); ?>">Show</a></td>
	</tr>
<?php endforeach;?>
</table>

<?php endif;?>

<table>
	<th>Source file</th>
	<tr>
		<td>
		
			<p>
				<?php echo nl2br(htmlspecialchars($t['source'])); ?>
			</p>
		
		</td>
	</tr>
</table>