<?php

class ZurbPresenter extends Illuminate\Pagination\Presenter {

    public function getActivePageWrapper($text)
    {
        return '<li class="current"><span class="num active">'.$text.'</span></li>';
    }

    public function getDisabledTextWrapper($text)
    {
        return '<li class="unavailable"><span>'.$text.'</span></li>';
    }

    public function getPageLinkWrapper($url, $page, $rel = null)
    {
        return '<li><a class="num" href="'.$url.'">'.$page.'</a></li>';
    }

    public function getNext($text = '&raquo;')
    {
        $text = '<img src="/images/icon/icon-arrow-right.png" alt="icon-right" width="28" height="28" />';
        
        if ($this->currentPage >= $this->lastPage)
        {
            return $this->getDisabledTextWrapper($text);
        }

        $url = $this->paginator->getUrl($this->currentPage + 1);

        return $this->getPageLinkWrapper($url, $text, 'next');
    }

    public function getPrevious($text = '&laquo;')
    {
        $text = '<img src="/images/icon/icon-arrow-left.png" alt="icon-left" width="28" height="28" />';

        if ($this->currentPage <= 1)
        {
            return $this->getDisabledTextWrapper($text);
        }

        $url = $this->paginator->getUrl($this->currentPage - 1);

        return $this->getPageLinkWrapper($url, $text, 'prev');
    }

    public function toPage()
    {
        $text = '<div class="right to-page">'.
                    '<p>'.
                        '跳转到第 <input class="to-page-input" type="text" > 页'.
                        '<input type="button" class="to-page-btn btn" value="确定">'.
                    '</p>'.
                '</div>';

        // echo $this->$lastPage;

        return $text;
    }

    public function render()
    {
        // The hard-coded thirteen represents the minimum number of pages we need to
        // be able to create a sliding page window. If we have less than that, we
        // will just render a simple range of page links insteadof the sliding.
        if ($this->lastPage < 13)
        {
            $content = $this->getPageRange(1, $this->lastPage);
        }
        else
        {
            $content = $this->getPageSlider();
        }

        return $this->getPrevious().$content.$this->getNext();
    }
}