<?php
	/**
	 * Created by PhpStorm.
	 * User: ozzy
	 * Date: 8/19/15
	 * Time: 12:59 PM
	 */

	namespace App\Skippaz\Helpers;


	use Illuminate\Pagination\BootstrapThreePresenter;


	class NewsPagination extends BootstrapThreePresenter {


		/**
		 * Convert the URL window into Bootstrap HTML.
		 *
		 * @return string
		 */
		public function render()
		{
			if ($this->hasPages())
			{
				return sprintf(
					'<ul class="pagination">%s %s %s</ul>',
					$this->getPreviousButton(),
					$this->getLinks(),
					$this->getNextButton()
				);
			}

			return '';
		}


		public function getPreviousButton($text = '<span>« Newer Posts</span>')
		{
			if ($this->paginator->currentPage() <= 1)
			{
				return $this->getDisabledTextWrapper('<li><a class="disabled prev-page">' . $text . '</a></li>');
			}

			$url = $this->paginator->url(
				$this->paginator->currentPage() - 1
			);

			return $this->getPageLinkWrapper($url, $text, 'prev');
		}


		public function getNextButton($text = '<span>Older Posts »</span>')
		{
			if (!$this->paginator->hasMorePages())
			{
				return $this->getDisabledTextWrapper('<li><a class="disabled next-page">' . $text . '</a></li>');
			}

			$url = $this->paginator->url($this->paginator->currentPage() + 1);

			return $this->getPageLinkWrapper($url, $text, 'next');
		}


		protected function getDisabledTextWrapper($text)
		{
			return $text;
		}


		protected function getAvailablePageWrapper($url, $page, $rel = NULL)
		{
			$rel = is_null($rel) ? '' : ' rel="' . $rel . '"';

			return '<li><a href="' . htmlentities($url) . '"' . $rel . '>' . $page . '</a></li>';

		}


		protected function getActivePageWrapper($text)
		{
			return '<li><a class="current">' . $text . '</a></li>';
		}
	}
