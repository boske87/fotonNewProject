<?php

namespace App\Skippaz\Helpers;

use Illuminate\Pagination\BootstrapThreePresenter;

class BlogsPagination extends BootstrapThreePresenter


{
	/**
	 * Convert the URL window into Bootstrap HTML.
	 *
	 * @return string
	 */
	public function render()
	{
		if ($this->hasPages()) {
			return sprintf(
				'%s %s',
				$this->getPreviousButton(),
				$this->getNextButton()
			);
		}

		return '';
	}





	public function getPreviousButton($text = '<span class="arrows"></span><span class="text">Older Posts</span>')
	{

		// If the current page is less than or equal to one, it means we can't go any
		// further back in the pages, so we will render a disabled previous button
		// when that is the case. Otherwise, we will give it an active "status".
		if (!$this->paginator->hasMorePages()) {

			return $this->getDisabledTextWrapper('<a class="next-page disabled">' .$text. '</a>');
		}

		$url = $this->paginator->url($this->paginator->currentPage() + 1);


		return $this->getPageLinkWrapper($url, $text, 'next');
	}



	public function getNextButton($text = '<span class="text">Newer Posts</span><span class="arrows"></span>')
	{
		// If the current page is greater than or equal to the last page, it means we
		// can't go any further into the pages, as we're already on this last page
		// that is available, so we will make it the "next" link style disabled.
		if ($this->paginator->currentPage() <= 1) {
			return $this->getDisabledTextWrapper('<a class="prev-page disabled">' .$text. '</a>');

		}

		$url = $this->paginator->url(
			$this->paginator->currentPage() - 1
		);


		return $this->getPageLinkWrapper($url, $text, 'prev');
	}



	protected function getDisabledTextWrapper($text)
	{
		return $text;
	}



	protected function getAvailablePageWrapper($url, $page, $rel = null)
	{
		$rel = is_null($rel) ? '' : ' rel="'.$rel.'"';

		if($rel == ' rel="next"') return '<a class="next-page" href="' . htmlentities($url) . '"' . $rel . '>' . $page . '</a>';

		else return '<a class="prev-page" href="' . htmlentities($url) . '"' . $rel . '>' . $page . '</a>';

	}



	protected function getActivePageWrapper($text)
	{
		return '<li class="current"><a>'.$text.'</a></li>';
	}



}
