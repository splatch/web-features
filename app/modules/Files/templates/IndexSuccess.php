<h2>Lista plików</h2>
<table>
	<th>Lp</th>
	<th>Nazwa pliku</th>
	<th>Operacje</th>
	<tr>
		<td class="lp"></td>
		<td><a href="/files/add" style="font-weight:bold;">Dodaj nowy plik</a></td>
		<td></td>
	</tr>
	<?php 
	if  ($t['files']):
		$i=0;
		foreach ($t['files'] as $file): 
		$i++;
	?>
		<tr>
			<td class="lp"><?php echo $i;?></td>
			<td><a href="/files/show/<?php echo $file->getId(); ?>"><?php echo htmlspecialchars($file->getFilename()); ?></a></td>
			<td class="operations"><a href="/files/delete?id=<?php echo $file->getId(); ?>">Usuń</a></td>
		</tr>
	<?php 
		endforeach; 
	endif;
	?>
</table>