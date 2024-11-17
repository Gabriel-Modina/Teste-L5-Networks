<?php

namespace Api\Models;

class FilmModel
{
    /** @var string */
    public $title;
    /** @var int */
    public $episode_id;
    /** @var string */
    public $opening_crawl;
    /** @var string */
    public $director;
    /** @var string */
    public $producer;
    /** @var array */
    public $characters;
    /** @var string */
    public $url;

    /** @var \DateTime */
    public $release_date ;
}
