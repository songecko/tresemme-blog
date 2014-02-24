
	<div id="nav">
		<?=anchor('blog/moda/0','&nbsp;','class="'.$moda_class.' link"')?>
		<?=anchor('blog/belleza/0','&nbsp;','class="'.$belleza_class.' link"')?>
		<?=anchor('blog/findesemana/0','&nbsp;','class="'.$findesemana_class.' link"')?>
	</div>
	<div id="content">
		<div id="inicio"><?=anchor('blog','Inicio','')?></div>
		<h1><?=$header?></h1>
		<div class="post">
		<h2><?=$content->post_title?></h2>
		<small><?
			$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			
			$d = date("d",strtotime($content->post_dt));
			$m = $mes[date("n",strtotime($content->post_dt))];
			$Y = date("Y",strtotime($content->post_dt));
			
			echo "$d $m $Y"; ?></small>
		<div style="margin-top: 10px;">
		<?=$content->post_content?>
		</div>
		<div id="share">
			comparte esta entrada<br>
			<?=anchor('#',img(array('src'=>'public/img/blog/facebook2.png','alt'=>'')),'class="fb_share" data-picture="http://webappcloud.net'.get_image($content->post_content).'" data-caption="'.$content->post_title.'" data-description="'.substr(strip_tags($content->post_content),0,200).'..."')?>
			<?=anchor('https://twitter.com/intent/tweet?text='.$twitter,img(array('src'=>'public/img/blog/twitter2.png','alt'=>'')),'target="_blank"')?>
		</div>
	</div>
		<div class="archivo">
			<h3>Archivo</h3>
			<?php foreach($archivo as $a) { ?>
				<?=anchor('/blog/'.$link.'/'.$a->id,$a->post_title,'class="link"')?><br><br>
			<?php } ?>
		</div>
