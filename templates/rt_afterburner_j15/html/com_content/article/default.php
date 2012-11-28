<?php // @version $Id: default.php 11917 2009-05-29 19:37:05Z ian $
defined('_JEXEC') or die('Restricted access');
include_once(dirname(__FILE__).DS.'..'.DS.'icon.php');
?>

<article id="page">

<?php if (($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) && !($this->print)) : ?>
<div class="contentpaneopen_edit<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo JHTML::_('icon.edit', $this->article, $this->params, $this->access); ?>
</div>
<?php endif; ?>


<?php if ($this->params->get('show_title')) : ?>
<div id="header_box">
    <h1><?php echo $this->escape($this->item->title); ?>
        <?php if ($this->params->get('link_titles') && $this->article->readmore_link != '') : ?>
        <a href="<?php echo $this->article->readmore_link; ?>" class="contentpagetitle<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
            <?php echo $this->escape($this->article->title); ?></a>
        <?php else :
            echo $this->escape($this->article->title);
        endif; ?>
    </h1>
</div>
<?php endif; ?>

<?php if ((intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) || ($this->params->get('show_author') && ($this->article->author != "")) || ($this->params->get('show_create_date'))) : ?>
<p class="articleinfo">
	<?php if (intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) : ?>
	<span class="modifydate">
		<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC2'))); ?>
	</span>
	<?php endif; ?>

	<?php if (($this->params->get('show_author')) && ($this->article->author != "")) : ?>
	<span class="createdby">
		<?php JText::printf('Written by', ($this->article->created_by_alias ? $this->escape($this->article->created_by_alias) : $this->escape($this->article->author))); ?>
	</span>
	<?php endif; ?>

	<?php if ($this->params->get('show_create_date')) : ?>
	<span class="createdate">
		<?php echo JHTML::_('date', $this->article->created, JText::_('DATE_FORMAT_LC2')); ?>
	</span>
	<?php endif; ?>
</p>
<?php endif; ?>

<?php if (!$this->params->get('show_intro')) :
	echo $this->article->event->afterDisplayTitle;
endif; ?>

<p class="buttonheading">
	<?php if ($this->print) :
		echo RokIcon::print_screen($this->article, $this->params, $this->access);
	elseif ($this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon')) : ?>
	<?php if ($this->params->get('show_pdf_icon')) :
		echo RokIcon::pdf($this->article, $this->params, $this->access);
	endif;
	if ($this->params->get('show_print_icon')) :
		echo RokIcon::print_popup($this->article, $this->params, $this->access);
	endif;
	if ($this->params->get('show_email_icon')) :
		echo RokIcon::email($this->article, $this->params, $this->access);
	endif;
	endif; ?>
</p>

<?php if (($this->params->get('show_section') && $this->article->sectionid) || ($this->params->get('show_category') && $this->article->catid)) : ?>
<p class="iteminfo">
	<?php if ($this->params->get('show_section') && $this->article->sectionid) : ?>
	<span>
		<?php if ($this->params->get('link_section')) : ?>
			<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->article->sectionid)).'">'; ?>
		<?php endif; ?>
		<?php echo $this->escape($this->article->section); ?>
		<?php if ($this->params->get('link_section')) : ?>
			<?php echo '</a>'; ?>
		<?php endif; ?>
		<?php if ($this->params->get('show_category')) : ?>
			<?php echo ' - '; ?>
		<?php endif; ?>
	</span>
	<?php endif; ?>
	<?php if ($this->params->get('show_category') && $this->article->catid) : ?>
	<span>
		<?php if ($this->params->get('link_category')) : ?>
			<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->article->catslug, $this->article->sectionid)).'">'; ?>
		<?php endif; ?>
		<?php echo $this->escape($this->article->category); ?>
		<?php if ($this->params->get('link_category')) : ?>
			<?php echo '</a>'; ?>
		<?php endif; ?>
	</span>
	<?php endif; ?>
</p>
<?php endif; ?>

<?php echo $this->article->event->beforeDisplayContent; ?>

<?php if ($this->params->get('show_url') && $this->article->urls) : ?>
<span class="small">
	<a href="<?php echo $this->escape($this->article->urls); ?>" target="_blank">
		<?php echo $this->escape($this->article->urls); ?></a>
</span>
<?php endif; ?>

<?php if (isset ($this->article->toc)) :
	echo $this->article->toc;
endif; ?>
<div id="article_body">
<?php echo $this->item->text; ?>
</div>
<?php echo $this->article->event->afterDisplayContent; ?>

</article>
