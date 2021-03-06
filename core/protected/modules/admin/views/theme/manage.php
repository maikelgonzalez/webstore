<div class="span9">
	<div class="hero-unit nobottom">

		<h3><?php echo Yii::t('admin','Manage My Themes'); ?></h3>
		<div class="editinstructions">
			<?php echo Yii::t('admin','Choose the theme you wish to use. Change {color} options for the theme below the image. Click Set to switch to this theme. Your currently active theme is always listed first.',array('{color}'=>_xls_regionalize('color'))); ?>
		</div>
		<div class="clearfix spaceafter"></div>
		<div id="thememanage">
			<?php echo CHtml::beginForm('manage', 'post'); ?>


			<?php


				foreach($arrThemes as $key=>$objTheme):
					echo '<div class="span4 theme"><div class="themetitle">'.$objTheme['name'].'</div><div class="themeversion"> v'.$objTheme['version'].'</div><div class="clearfix"></div><div class="themeselect" >';
					echo CHtml::radioButton('theme',
						($key == Yii::app()->theme->name ?  true : false),
						array('id'=>$key,'value'=>$key));
					echo '</div>';
					echo CHtml::tag('div',array(
							'class'=>'themeicon '.($key == Yii::app()->theme->name ?  "selected" : ""),
							'id'=>'img'.$key,
							'onClick'=>'js:
									$("#"+picked).attr("checked", false);
									$("#img"+picked).removeClass("selected");
									$("#'.$key.'").attr("checked", true);
									picked = "'.$key.'";
									$("#img"+picked).addClass("selected")'),
						$objTheme['img']);
					echo CHtml::tag('div',array(
							'class'=>'themeoptions',),
						$objTheme['options']);
					echo '</div>';
				endforeach;
			?>
		</div>
		<div class="clearfix spaceafter"></div>


		<div class="clearfix spaceafter"></div>
	</div>


		<p class="pull-right">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'label'=>'Make Active',
				'type'=>'primary',
				'size'=>'large',
				'htmlOptions'=>array('id'=>'btnSet','value'=>'btnSet'),
			)); ?>
		</p>

	<p>
		<div>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'label'=>'Copy selected theme for customization',
				'type'=>'inverse',
				'size'=>'mini',
				'htmlOptions'=>array('id'=>'btnCopy','value'=>'btnCopy'),
			)); ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'label'=>'Remove unchanged files from selected theme',
				'type'=>'inverse',
				'size'=>'mini',
				'htmlOptions'=>array('id'=>'btnClean','value'=>'btnClean'),
			)); ?>
		</div>
	</p>

		<?php echo CHtml::endForm(); ?>


</div>
</div>