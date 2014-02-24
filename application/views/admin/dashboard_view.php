<div class="row">
	<div class="span3">
		<table>
				<tr>
				<td align="right">
					<span class="badge"><?=$participants?></span> &nbsp;
				</td>
				<td>
					<?=anchor("admin/participants","Participants")?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<span class="badge"><?=$pages?></span> &nbsp;
				</td>
				<td>
					<?=anchor("admin/pages","Pages")?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<span class="badge"><?=$posts?></span> &nbsp;
				</td>
				<td>
					<?=anchor("admin/posts","Posts")?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<span class="badge"><?=$users?></span> &nbsp;
				</td>
				<td>
					<?=anchor("admin/users","Users")?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<span class="badge"><?=$categories?></span> &nbsp;
				</td>
				<td>
					<?=anchor("admin/categories","Categories")?>
				</td>
			</tr>
			<tr>
				<td align="right">
					<span class="badge"><?=$products?></span> &nbsp;
				</td>
				<td>
					<?=anchor("admin/products","Products")?>
				</td>
			</tr>
		</table>
	</div>
	<div class="span6">
		<table>
			<tr>
				<td align="right" style="font-size: 24px;">
					<i class="ico-download-alt ico-large">&nbsp;</i> 
				</td>
				<td>
					<?php if (isset($author)) { ?>
					Lastest backup made by <?=$author?> <?=mini_time($dt)?>.
					<?php } else { ?>
					No backup has been made.
					<?php } ?>
				</td>
			</tr>
		</table>
	</div>
</div>