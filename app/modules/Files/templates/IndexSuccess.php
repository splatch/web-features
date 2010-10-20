<?php 
$user = $this->getContext()->getUser();
?>
<h2>Files list</h2>
<table>
	<th>No.</th>
	<th>File name</th>
	<th>Parsed</th>
	<?php if ($user->isAuthenticated()): ?>
	<th>Operations</th>
	<tr>
		<td class="lp"></td>
		<td><a href="/files/add" style="font-weight:bold;">Add new file</a></td>
		<td></td>
		<td></td>
	</tr>
	<?php endif; ?>
	<?php 
	if  ($t['files']):
		$i=0;
		foreach ($t['files'] as $file): 
		$i++;
	?>
		<tr>
			<td class="lp"><?php echo $i;?></td>
			<td><a href="/files/show/<?php echo $file->getId(); ?>"><?php echo htmlspecialchars($file->getFilename()); ?></a></td>
			<td class="parse"><?php echo ($file->isParsed()) ? "Yes" : "No";?></td>
			<?php if ($user->isAuthenticated()): ?>
			<td class="operations">
			<?php if (!$file->isParsed()): ?>
				<a href="/files/parse/<?php echo $file->getId(); ?>">Parse</a>
			<?php endif; ?>
				<a href="/files/delete/<?php echo $file->getId(); ?>">Delete</a>
			</td>
			<?php endif; ?>
		</tr>
	<?php 
		endforeach; 
	endif;
	?>
</table>