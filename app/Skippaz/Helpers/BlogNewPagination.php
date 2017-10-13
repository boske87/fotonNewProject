<?php

	namespace App\Skippaz\Helpers;

	use Illuminate\Pagination\BootstrapThreePresenter;

	class BlogNewPagination extends BootstrapThreePresenter


	{

		public function render()
		{
			if ($this->hasPages()) {
				return sprintf(
					'<ul class="pagination">%s %s %s</ul>',
					$this->getPreviousButton(),
					$this->getLinks(),
					$this->getNextButton()
				);
			}

			return '';
		}


		protected function getLinks()
		{
			$html = '';

			if (is_array($this->window['first'])) {
				$html .= $this->getUrlLinks($this->window['first']);
			}

			if (is_array($this->window['slider'])) {
				$html .= $this->getDots();
				$html .= $this->getUrlLinks($this->window['slider']);
			}

			if (is_array($this->window['last'])) {
				$html .= $this->getDots();
				$html .= $this->getUrlLinks($this->window['last']);
			}

			return $html;
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



		protected function getAvailablePageWrapper($url, $page, $rel = null)
		{
			$rel = is_null($rel) ? '' : ' rel="'.$rel.'"';

			return '<li><a href="' . htmlentities($url) . '"' . $rel . '>' . $page . '</a></li>';

		}



		protected function getActivePageWrapper($text)
		{
			return '<li><a  class="current">'.$text.'</a></li>';
		}



	}
