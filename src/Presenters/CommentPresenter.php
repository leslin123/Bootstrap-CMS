<?php

/**
 * This file is part of Bootstrap CMS by Graham Campbell.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 */

namespace GrahamCampbell\BootstrapCMS\Presenters;

use GrahamCampbell\BootstrapCMS\Models\Comment;
use GrahamCampbell\Credentials\Presenters\AuthorPresenterTrait;
use McCool\LaravelAutoPresenter\BasePresenter;

/**
 * This is the comment presenter class.
 *
 * @package    Bootstrap-CMS
 * @author     Graham Campbell
 * @copyright  Copyright (C) 2013-2014  Graham Campbell
 * @license    https://github.com/GrahamCampbell/Bootstrap-CMS/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Bootstrap-CMS
 */
class CommentPresenter extends BasePresenter
{
    use AuthorPresenterTrait;

    /**
     * Create a new instance.
     *
     * @param  \GrahamCampbell\BootstrapCMS\Models\Comment  $comment
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->resource = $comment;
    }
}
